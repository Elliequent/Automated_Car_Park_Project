if (process.env.NODE_ENV !== 'production') {
    require('dotenv').config()
  }
  
  const express = require('express')
  var cors = require('cors');
  const expressLayouts = require('express-ejs-layouts')
  const mongoose = require('mongoose')
  const morgan = require('morgan')
  const bodyParser = require('body-parser')
  const app = express()
  const bcrypt = require('bcrypt')
  const passport = require('passport')
  const flash = require('express-flash')
  const session = require('express-session')
  const methodOverride = require('method-override')
  const { authUser, authRole, authAdmin } = require('./basicAuth')
const users = []

  //Database
  app.use(express.urlencoded({ extended: false }));

  const path = require('path');
  const public = path.join(__dirname,'public');
  app.use(express.static(public));
  app.use(cors())
  
  app.use('/css', express.static(__dirname + '/node_modules/bootstrap/dist/css')); // redirect CSS bootstrap

  const initializePassport = require('./passport-config')
  const { ROLE } = require('./data')
  initializePassport(
    passport,
    username => users.find(user => user.username === username),
    id => users.find(user => user.id === id)
  )
  
  

//app.use(expressLayouts)
//app.set('layout', './layouts/full-width')

const mustache = require('mustache-express');
app.engine('mustache', mustache());
app.set('view engine', 'mustache');
  app.set('view-engine', 'ejs')
  app.use(express.urlencoded({ extended: false }))
  app.use(flash())
  app.use(session({
    secret: process.env.SESSION_SECRET,
    resave: false,
    saveUninitialized: false
  }))
  app.use(passport.initialize())
  app.use(passport.session())
  app.use(methodOverride('_method'))
  app.use(express.static(__dirname + '/views'));


  
  //HOME
  app.get('/', checkAuthenticated, (req, res) => {
    res.render('index.ejs', { name: req.user.name })
  })

  //DASHBOARD
  app.get('/dashboard', checkAuthenticated, (req, res) => {
    //res.send('Hello! Welcome to the guestbook application.');
    res.render('dashboard.ejs')
    })
    //ABOUT
    app.get('/about', (req, res) => {
      res.render('about.ejs')
    })
  
  //LOGIN
  app.get('/login', checkNotAuthenticated, (req, res) => {
    res.render('login.ejs')
  })
  
  app.post('/login', checkNotAuthenticated, passport.authenticate('local', {
    successRedirect: '/dashboard',
    failureRedirect: '/login',
    failureFlash: true
  }))
  
  //REGISTER
  app.get('/register', checkNotAuthenticated, (req, res) => {
    res.render('register.ejs')
  })
  
  app.post('/register', checkNotAuthenticated, async (req, res) => {
    try {
      const hashedPassword = await bcrypt.hash(req.body.password, 10)
      users.push({
        id: Date.now().toString(),
        name: req.body.name,
        username: req.body.username,
        address: req.body.address,
        phoneNumber: req.body.phoneNumber,
        email: req.body.email,
        password: hashedPassword,
        role: ROLE.BASIC
      })
      res.redirect('/login')
    } catch {
      res.redirect('/register')
    }
  })
  
  //LOGOUT
  app.delete('/logout', (req, res) => {
    req.logOut()
    res.redirect('/login')
  })
  
  function checkAuthenticated(req, res, next) {
    if (req.isAuthenticated()) {
      return next()
    }
  
    res.redirect('/login')
  }
  
  function checkNotAuthenticated(req, res, next) {
    if (req.isAuthenticated()) {
      return res.redirect('/')
    }
    next()
  }

  //ROUTERS
const Structurerouter = require('./routes/parkingStructure');
app.use('/structure', checkAuthenticated, Structurerouter); 
const SpaceRouter = require('./routes/parkingSpaces');
app.use('/parking', checkAuthenticated, SpaceRouter); 
const arrivalRouter = require('./routes/arrivalDeparture.js');
app.use('/departures', checkAuthenticated, arrivalRouter); 
const userRouter = require('./routes/user');
app.use('/users', checkAuthenticated, authAdmin, userRouter); 
const userVehicleRouter = require('./routes/userVehicle');
app.use('/uservehicle', checkAuthenticated, userVehicleRouter); 
const vehicleRouter= require('./routes/vehicle');
app.use('/vehicles', checkAuthenticated, vehicleRouter);
  
  app.listen(3000)



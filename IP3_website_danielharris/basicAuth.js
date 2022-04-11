function authUser(req, res, next) {
    if (req.user == null) {
      res.status(403)
      return res.send('You need to sign in')
    }
  
    next()
  }
  
  function authRole(role) {
    return (req, res, next) => {
      if (req.user.role !== role) {
        res.status(401)
        return res.send('Not allowed')
      }
  
      next()
    }
  }

  function authAdmin(role) {
    return (req, res, next) => {
      if (req.user.role !== 'ADMIN') {
        res.status(401)
        return res.send('Not allowed')
        //res.redirect('/login')
      }
  
      next()
    }
  }

  function checkBan(role) {
    return (req, res, next) => {
      if (req.user.role === 'BAN') {
        res.status(401)
        return res.send('Not allowed')
        //res.redirect('/login')
      }
  
      next()
    }
  }
  
  module.exports = {
    authUser,
    authRole,
    authAdmin,
    checkBan
  }
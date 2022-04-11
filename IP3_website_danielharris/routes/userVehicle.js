const express = require('express');
const userVehicleRouter = express.Router();
const controller = require('../controllers/userVehiclesController.js');
userVehicleRouter.get("/", controller.landing_page);
userVehicleRouter.get('/userVehicles', controller.entries_list);

userVehicleRouter.get('/new', controller.new_entries);
userVehicleRouter.post('/new', controller.post_new_entry);

userVehicleRouter.get('/peter', controller.peters_entries);
userVehicleRouter.use(function(req, res) {
    res.status(404);
    res.type('text/plain');
    res.send('404 Not found.');
})
userVehicleRouter.use(function(err, req, res, next) {
    res.status(500);
    res.type('text/plain');
    res.send('Internal Server Error.');
})
module.exports = userVehicleRouter;
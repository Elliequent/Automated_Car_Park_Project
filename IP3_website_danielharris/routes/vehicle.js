const express = require('express');
const vehicleRouter = express.Router();
const controller = require('../controllers/vehicleController.js');
vehicleRouter.get("/", controller.landing_page);
vehicleRouter.get('/vehicles', controller.entries_list);

vehicleRouter.get('/new', controller.new_entries);
vehicleRouter.post('/new', controller.post_new_entry);

vehicleRouter.get('/peter', controller.peters_entries);
vehicleRouter.use(function(req, res) {
    res.status(404);
    res.type('text/plain');
    res.send('404 Not found.');
})
vehicleRouter.use(function(err, req, res, next) {
    res.status(500);
    res.type('text/plain');
    res.send('Internal Server Error.');
})
module.exports = vehicleRouter;
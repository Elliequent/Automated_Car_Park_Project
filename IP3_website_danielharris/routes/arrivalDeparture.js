const express = require('express');
const arrivalRouter = express.Router();
const controller = require('../controllers/arrivalDepartureController.js');
arrivalRouter.get("/", controller.landing_page);
arrivalRouter.get('/arrivals', controller.entries_list);

arrivalRouter.get('/new', controller.new_entries);
arrivalRouter.post('/new', controller.post_new_entry);

arrivalRouter.get('/peter', controller.peters_entries);
arrivalRouter.use(function(req, res) {
    res.status(404);
    res.type('text/plain');
    res.send('404 Not found.');
})
arrivalRouter.use(function(err, req, res, next) {
    res.status(500);
    res.type('text/plain');
    res.send('Internal Server Error.');
})
module.exports = arrivalRouter;
const express = require('express');
const SpaceRouter = express.Router();
const controller = require('../controllers/parkingController.js');
SpaceRouter.get("/", controller.landing_page);
SpaceRouter.get('/spaces', controller.entries_list);

SpaceRouter.get('/new', controller.new_entries);
SpaceRouter.post('/new', controller.post_new_entry);

SpaceRouter.get('/peter', controller.peters_entries);
SpaceRouter.use(function(req, res) {
    res.status(404);
    res.type('text/plain');
    res.send('404 Not found.');
})
SpaceRouter.use(function(err, req, res, next) {
    res.status(500);
    res.type('text/plain');
    res.send('Internal Server Error.');
})
module.exports = SpaceRouter;
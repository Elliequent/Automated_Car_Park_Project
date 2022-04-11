const express = require('express');
const structureRouter = express.Router();
const controller = require('../controllers/parkingStructureController.js');
structureRouter.get("/", controller.landing_page);
structureRouter.get('/structures', controller.entries_list);

structureRouter.get('/new', controller.new_entry);
structureRouter.post('/new', controller.post_new_entry);

structureRouter.get('/update', controller.update_entry);
structureRouter.post('/update', controller.post_update_entry);

structureRouter.get('/delete', controller.delete_entry);

structureRouter.get('/peter', controller.peters_entries);
structureRouter.use(function(req, res) {
    res.status(404);
    res.type('text/plain');
    res.send('404 Not found.');
})
structureRouter.use(function(err, req, res, next) {
    res.status(500);
    res.type('text/plain');
    res.send('Internal Server Error.');
})
module.exports = structureRouter;

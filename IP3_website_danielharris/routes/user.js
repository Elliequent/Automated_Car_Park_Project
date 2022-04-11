const express = require('express');
const userRouter = express.Router();
const controller = require('../controllers/userController.js');
userRouter.get("/", controller.landing_page);
userRouter.get('/users', controller.entries_list);

userRouter.get('/new', controller.new_entry);
userRouter.post('/new', controller.post_new_entry);

userRouter.get('/update', controller.update_entry);
userRouter.post('/update', controller.post_update_entry);

userRouter.get('/delete', controller.delete_entry);

userRouter.get('/peter', controller.peters_entries);
userRouter.use(function(req, res) {
    res.status(404);
    res.type('text/plain');
    res.send('404 Not found.');
})
userRouter.use(function(err, req, res, next) {
    res.status(500);
    res.type('text/plain');
    res.send('Internal Server Error.');
})
module.exports = userRouter;
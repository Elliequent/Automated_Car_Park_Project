const userDAO = require('../models/user');
const db = new userDAO();

db.init();

exports.entries_list = function(req, res) {
    res.send('<h1>Not yet implemented: show a list of guest book entries.</h1>');
    db.getAllUsers();
}

exports.landing_page = function(req, res) {
    db.getAllUsers()
    .then((list) => {
        res.render('users', {
            'title': 'list of users',
            'users': list
        });
        console.log('promise resolved');
    })
    .catch((err) => {
        console.log('promise rejected', err);
    })
}
exports.new_entry = function(req, res) {
    res.render('newUser', {
        'title': 'users'
        })
}

exports.post_new_entry = function(req, res) {
    console.log('processing post-new_entry controller');
    if (!req.body.userID) {
    response.status(400).send("Entries must have an userID.");
    return;
    }
    db.addEntry(req.body.userID, req.body.name, req.body.username, req.body.address,
        req.body.phoneNumber, req.body.email, req.body.password, req.body.role,  );
    res.redirect('/users');
}

exports.update_entry = function(req, res) {
    res.render('updateUser', {
        'title': 'users'
        })
}

exports.post_update_entry = function(req, res) {
    console.log('processing post-update_entry controller');
    if (!req.body.userID) {
    response.status(400).send("Entries must have an userID.");
    return;
    }
    db.updateUser(req.body.userID, req.body.name, req.body.username, req.body.address,
        req.body.phoneNumber, req.body.email, req.body.password, req.body.role  );
    res.redirect('/users');
}

exports.delete_entry = function(req, res) {
    res.send('<h1>this user has been deleted</h1>');
    db.deleteUser(req.body.userID, req.body.name, req.body.username, req.body.address,
        req.body.phoneNumber, req.body.email, req.body.password, req.body.role );
}

exports.peters_entries = function(req, res) {
    res.send('<h1>Processing Peter\'s Entries, see terminal</h1>');
    db.getOneUser();
}
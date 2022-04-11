const userVehicleDAO = require('../models/userVehicle');
const db = new userVehicleDAO();

db.init();

exports.entries_list = function(req, res) {
    res.send('<h1>Not yet implemented: show a list of guest book entries.</h1>');
    db.getAllUservehicles();
}
exports.landing_page = function(req, res) {
    db.getAllUservehicles()
    .then((list) => {
        res.render('userVehicles', {
            'title': 'users with vehicles',
            'userVehicles': list
        });
        console.log('promise resolved');
    })
    .catch((err) => {
        console.log('promise rejected', err);
    })
}

exports.new_entries = function(req, res) {
    res.render('newUservehicle', {
    'title': 'userVehicle'
    })
}


exports.post_new_entry = function(req, res) {
console.log('processing post-new_entry controller');
if (!req.body.userID) {
response.status(400).send("Entries must have an author.");
return;
}
db.addEntry(req.body.userID, req.body.registrationPlate);
res.redirect('/userVehicle');
}
exports.peters_entries = function(req, res) {
    res.send('<h1>Processing Peter\'s Entries, see terminal</h1>');
    db.getOneUservehicle();
}
const vehicleDAO = require('../models/vehicle');
const db = new vehicleDAO();

db.init();

exports.entries_list = function(req, res) {
    res.send('<h1>Not yet implemented: show a list of guest book entries.</h1>');
    db.getAllVehicles();
}
exports.landing_page = function(req, res) {
    db.getAllVehicles()
    .then((list) => {
        res.render('vehicles', {
            'title': 'list of vehicles',
            'vehicles': list
        });
        console.log('promise resolved');
    })
    .catch((err) => {
        console.log('promise rejected', err);
    })
}

exports.new_entries = function(req, res) {
    res.render('newVehicle', {
    'title': 'vehicles'
    })
}


exports.post_new_entry = function(req, res) {
console.log('processing post-new_entry controller');
if (!req.body.registrationPlate) {
response.status(400).send("Entries must have an author.");
return;
}
db.addEntry(req.body.registrationPlate, req.body.make, req.body.model, req.body.isElectric, req.body.isParked, req.body.parkingSpaceId);
res.redirect('/vehicles');
}

exports.peters_entries = function(req, res) {
    res.send('<h1>Processing Peter\'s Entries, see terminal</h1>');
    db.getOneVehicle();
}
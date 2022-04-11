const arrivalDepartureDAO = require('../models/arrivalDeparture');
const db = new arrivalDepartureDAO();

db.init();

exports.entries_list = function(req, res) {
    res.send('<h1>Not yet implemented: show a list of guest book entries.</h1>');
    db.getAllStructures();
}
exports.landing_page = function(req, res) {
    db.getAllDepartures()
    .then((list) => {
        res.render('departures', {
            'title': 'departures and arrivals',
            'departures': list
        });
        console.log('promise resolved');
    })
    .catch((err) => {
        console.log('promise rejected', err);
    })
}

exports.new_entries = function(req, res) {
    res.render('newArrivalDeparture', {
    'title': 'Arrivals and Departures'
    })
}


exports.post_new_entry = function(req, res) {
console.log('processing post-new_entry controller');
if (!req.body.userID) {
response.status(400).send("Entries must have an author.");
return;
}
db.addEntry(req.body.userID, req.body.structureID, req.body.departureTime, req.body.arrivalTime);
res.redirect('/departures');
}
exports.peters_entries = function(req, res) {
    res.send('<h1>Processing Peter\'s Entries, see terminal</h1>');
    db.getOneEntries();
}
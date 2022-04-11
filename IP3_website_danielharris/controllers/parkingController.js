const SpaceDAO = require('../models/parkingSpace');
const db = new SpaceDAO();

db.init();

exports.entries_list = function(req, res) {
    res.send('<h1>Not yet implemented: show a list of guest book entries.</h1>');
    db.getAllSpaces();
}
exports.landing_page = function(req, res) {
    db.getAllSpaces()
        .then((list) => {
            res.render('spaces', {
                'title': 'parking Spaces',
                'spaces': list
            });
            console.log('promise resolved');
        })
        .catch((err) => {
            console.log('promise rejected', err);
        })
}
exports.new_entries = function(req, res) {
    res.render('newSpace', {
    'title': 'parking space'
    })
}

exports.post_new_entry = function(req, res) {
    console.log('processing post-new_entry controller');
    if (!req.body.parkingID) {
    response.status(400).send("Entries must have an structureID.");
    return;
    }
    db.addEntry(req.body.parkingID, req.body.structureID, req.body.floor, req.body.isParked, req.body.isDisabled);
    res.redirect('/parking');
}
exports.peters_entries = function(req, res) {
    res.send('<h1>Processing Peter\'s Entries, see terminal</h1>');
    db.getOneEntries();
}
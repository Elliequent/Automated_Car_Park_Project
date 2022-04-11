const structureDAO = require('../models/parkingStructure');
const db = new structureDAO();

db.init();

exports.entries_list = function(req, res) {
    res.send('<h1>Not yet implemented: show a list of guest book entries.</h1>');
    db.getAllStructures()
    
}
exports.landing_page = function(req, res) {
    db.getAllStructures()
    .then((list) => {
        res.render('structures', {
            'title': 'parking structures',
            'structures': list
        });
        console.log('promise resolved');
    })
    .catch((err) => {
        console.log('promise rejected', err);
    })
}


exports.new_entry = function(req, res) {
    res.render('newStructure', {
        'title': 'parking structure'
        })
}

exports.post_new_entry = function(req, res) {
    console.log('processing post-new_entry controller');
    if (!req.body.structureID) {
    response.status(400).send("Entries must have an structureID.");
    return;
    }
    db.addEntry(req.body.structureID, req.body.address, req.body.parkingSpaces, req.body.costPerHour);
    res.redirect('/structure');
}

exports.update_entry = function(req, res) {
    res.render('updateStructure', {
        'title': 'structures'
        })
}

exports.post_update_entry = function(req, res) {
    console.log('processing post-update_entry controller');
    if (!req.body.structureID) {
    response.status(400).send("Entries must have an structureID.");
    return;
    }
    db.updateUser(req.body.structureID, req.body.address, req.body.parkingSpaces, req.body.costPerHour  );
    res.redirect('/structure');
}

exports.delete_entry = function(req, res) {
    res.send('<h1>this structure has been deleted</h1>');
    db.deleteUser(req.body.structureID, req.body.address, req.body.parkingSpaces, req.body.costPerHour );
}

exports.peters_entries = function(req, res) {
    res.send('<h1>Processing Peter\'s Entries, see terminal</h1>');
    db.getOneEntries();
}

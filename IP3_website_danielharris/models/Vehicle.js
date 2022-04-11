const nedb = require('nedb');
class Vehicle {
    constructor(dbFilePath) {
        if (dbFilePath) {
            this.db = new nedb({ filename: dbFilePath, autoload: true });
            console.log('DB connected to ' + dbFilePath);
        } else {
            this.db = new nedb();
        }
    }
    init() {
        this.db.insert({
            registrationPlate: 'TE51 1NG',
            make: 'red',
            model: 'good',
            isElectric: 'false',
            isParked: 'true',
            parkingSpaceId: '120'
        });
        //for later debugging
        console.log('db entry Peter inserted');
            this.db.insert({
                registrationPlate: 'DA31 1EL',
                make: 'black',
                model: 'fort',
                isElectric: 'true',
                isParked: 'false',
                parkingSpaceId: '11'
        });
        //for later debugging
        console.log('db entry Ann inserted');
        }
    //a function to return all entries from the database
    getAllVehicles() {
        //return a Promise object, which can be resolved or rejected
        return new Promise((resolve, reject) => {
            //use the find() function of the database to get the data,
            //error first callback function, err for error, entries for data
            this.db.find({}, function(err, entries) {
                //if error occurs reject Promise
                if (err) {
                    reject(err);
                //if no error resolve the promise & return the data
                } else {
                    resolve(entries);
                    //to see what the returned data looks like
                    console.log('function all() returns: ', entries);
                }
            })
        })
    }  

    addEntry(registrationPlate, make, model, isElectric, isParked, parkingSpaceId) {
        var entry = {
            registrationPlate: registrationPlate,
                make: make,
                model: model,
                isElectric: isElectric,
                isParked: isParked,
                parkingSpaceId: parkingSpaceId
                }
        console.log('entry created', entry);
        this.db.insert(entry, function(err, doc) {
                if (err) {
                    console.log('Error inserting document', registrationPlate);
                    } else {
                    console.log('document inserted into the database', doc);
                }
        }) 
     } 
    getOneVehicle() {
        //return a Promise object, which can be resolved or rejected
        return new Promise((resolve, reject) => {
            //find(author:'Peter) retrieves the data,
            //with error first callback function, err=error, entries=data
            this.db.find({ author: 'Peter' }, function(err, entries) {
                //if error occurs reject Promise
                if (err) {
                    reject(err);
                //if no error resolve the promise and return the data
                } else {
                    resolve(entries);
                    //to see what the returned data looks like
                    console.log('getPetersEntries() returns: ', entries);
                 }
            })
        })
    }
      
}
//make the module visible outside
module.exports = Vehicle;
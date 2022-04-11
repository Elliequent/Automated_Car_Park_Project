const nedb = require('nedb');
class userVehicle {
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
            userID: '001',
            registrationPlate: 'TE51 1ING',
        });
        //for later debugging
        console.log('db entry Peter inserted');
            this.db.insert({
                userID: '002',
                registrationPlate: 'DA31 1EL',
        });
        //for later debugging
        console.log('db entry Ann inserted');
        }
    //a function to return all entries from the database
    getAllUservehicles() {
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

    addEntry(userID, registrationPlate) {
        var entry = {
                userID: userID,
            registrationPlate: registrationPlate
                }
        console.log('entry created', entry);
        this.db.insert(entry, function(err, doc) {
                if (err) {
                    console.log('Error inserting document', userID);
                    } else {
                    console.log('document inserted into the database', doc);
                }
        }) 
     } 
    getOneUservehicle() {
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
module.exports = userVehicle;
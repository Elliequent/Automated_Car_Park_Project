const nedb = require('nedb');
class Space {
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
            parkingID: '001',
            stuctureID: '001',
            floor: '1',
            spaceNumber: '22',
            isDisabled: 'false'
        });
        //for later debugging
        console.log('db entry Peter inserted');
            this.db.insert({
            parkingID: '0122',
            stuctureID: '001',
            floor: '3',
            spaceNumber: '234',
            isDisabled: 'true'
        });
        //for later debugging
        console.log('db entry Ann inserted');
        }
    //a function to return all entries from the database
    getAllSpaces() {
        //return a Promise object, which can be resolved or rejected
        return new Promise((resolve, reject) => {
            //use the find() function of the database to get the data,
            //error first callback function, err for error, entries for data
            this.db.find({}, function(err, spaces) {
                //if error occurs reject Promise
                if (err) {
                    reject(err);
                //if no error resolve the promise & return the data
                } else {
                    resolve(spaces);
                    //to see what the returned data looks like
                    console.log('function all() returns: ', spaces);
                }
            })
        })
    }  
    getOneEntries() {
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

    addEntry(parkingID, structureID, floor, spaceNumber, isDisabled) {
        var space = {
                parkingID: parkingID,
                structureID: structureID,
                floor: floor,
                spaceNumber: spaceNumber,
                isDisabled: isDisabled
                }
        console.log('entry created', space);
        this.db.insert(space, function(err, doc) {
                if (err) {
                    console.log('Error inserting document');
                    } else {
                    console.log('document inserted into the database', doc);
                }
        }) 
     }   
      
}
//make the module visible outside
module.exports = Space;
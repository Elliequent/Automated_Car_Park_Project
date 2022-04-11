const nedb = require('nedb');
class Structure {
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
            stuctureID: '001',
            address: 'fourth avenue',
            parkingSpaces: '28',
            costPerHour: '£0.60'
        });
        //for later debugging
        console.log('db entry Peter inserted');
            this.db.insert({
                stuctureID: '002',
                address: 'camsburg',
                parkingSpaces: '400',
                costPerHour: '£1.30'
        });
        //for later debugging
        }
    //a function to return all entries from the database
    getAllStructures() {
        //return a Promise object, which can be resolved or rejected
        return new Promise((resolve, reject) => {
            //use the find() function of the database to get the data,
            //error first callback function, err for error, entries for data
            this.db.find({}, function(err, structures) {
                //if error occurs reject Promise
                if (err) {
                    reject(err);
                //if no error resolve the promise & return the data
                } else {
                    resolve(structures);
                    //to see what the returned data looks like
                    console.log('function all() returns: ', structures);
                }
            })
        })
    }  
    getOneEntries() {
        //return a Promise object, which can be resolved or rejected
        return new Promise((resolve, reject) => {
            //find(author:'Peter) retrieves the data,
            //with error first callback function, err=error, entries=data
            this.db.find({ stuctureID: '001' }, function(err, structures) {
                //if error occurs reject Promise
                if (err) {
                    reject(err);
                //if no error resolve the promise and return the data
                } else {
                    resolve(structures);
                    //to see what the returned data looks like
                    console.log('getOneEntries() returns: ', structures);
                 }
            })
        })
    }

    addEntry(stuctureID, address, parkingSpaces, costPerHour) {
        var structure = {
            stuctureID: stuctureID,
            address: address,
            parkingSpaces: parkingSpaces,
            costPerHour: costPerHour
                }
        console.log('entry created', structure);
        this.db.insert(structure, function(err, doc) {
                if (err) {
                    console.log('Error inserting document', stuctureID);
                    } else {
                    console.log('document inserted into the database', doc);
                }
        }) 
     } 

     getStructuresById(structureName) {
        return new Promise((resolve, reject) => {
            this.db.find({ 'structureID': structureName }, function(err, structures) {
            if (err) {
                reject(err);
            } else {
                resolve(structures);
            console.log('getEntriesByUser returns: ', structures);
        }
    })
})
} 

updateUser(structureID, address, parkingSpaces, costPerHour) {
    this.db.update(structures, function(err, doc){
        if (err) {
            console.log('Error inserting document', structureID);
            } else {
            console.log('document inserted into the database', doc);
        }
  
     return callback(updatedStructure);
    });
   }

deleteUser(){
        structure.remove({ 'name': structureID }, function(err, numDeleted) {
    console.log('Deleted', numDeleted, 'user');
});
}
      
}
//make the module visible outside
module.exports = Structure;
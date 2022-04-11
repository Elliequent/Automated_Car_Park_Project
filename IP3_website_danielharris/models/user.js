const { name } = require('ejs');
const nedb = require('nedb');


class User {
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
            name: 'daniel',
            username: 'danny',
            address: '16th red road',
            phoneNumber: '0990897654',
            email: 'dharri211@caledonian.ac.uk',
            password: '*******',
            role: 'BASIC'
        });
        //for later debugging
        console.log('db entry Peter inserted');
            this.db.insert({
                userID: '002',
                name: 'test',
                username: 'testing',
                address: '16th red road',
                phoneNumber: '0990897654',
                email: 'testing@caledonian.ac.uk',
                password: '*******',
                role: 'ADMIN'
        });
        //for later debugging
        console.log('db entry Ann inserted');
        }
    //a function to return all entries from the database
    getAllUsers() {
        //return a Promise object, which can be resolved or rejected
        return new Promise((resolve, reject) => {
            //use the find() function of the database to get the data,
            //error first callback function, err for error, entries for data
            this.db.find({}, function(err, users) {
                //if error occurs reject Promise
                if (err) {
                    reject(err);
                //if no error resolve the promise & return the data
                } else {
                    resolve(users);
                    //to see what the returned data looks like
                    console.log('function all() returns: ', users);
                }
            })
        })
    }  

    addEntry(userID, name, username, address, phoneNumber, email, password, role) {
        var structure = {
            userID: userID,
            name: name,
            username: username,
            address: address,
            phoneNumber: phoneNumber,
            email: email,
            password: password,
            role: role
                }
        console.log('entry created', users);
        this.db.insert(users, function(err, doc) {
                if (err) {
                    console.log('Error inserting document', userID);
                    } else {
                    console.log('document inserted into the database', doc);
                }
        }) 
     } 
    getOneUser() {
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

    updateUser(userID, name, username, address, phoneNumber, email, password, role) {
        this.db.update(users, function(err, doc){
            if (err) {
                console.log('Error inserting document', userID);
                } else {
                console.log('document inserted into the database', doc);
            }
      
         return callback(updatedUser);
        });
       }

    deleteUser(){
            users.remove({ 'name': name }, function(err, numDeleted) {
        console.log('Deleted', numDeleted, 'user');
   });
    }

      
}
//make the module visible outside
module.exports = User;
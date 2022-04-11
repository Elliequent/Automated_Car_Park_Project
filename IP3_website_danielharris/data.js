const ROLE = {
    ADMIN: 'admin',
    BASIC: 'basic'
  }
  
  module.exports = {
    ROLE: ROLE,
    users: [
      { id: 1, name: 'Kyle', username: 'kyle', address: '4th redroad', phoneNumber: '9090', email: 'kyle@test.com', password: 'kyle', role: ROLE.ADMIN },
      { id: 2, name: 'bob', username: 'bob', address: '5th redroad', phoneNumber: '9090', email: 'bob@test.com', password: 'bobby', role: ROLE.BASIC },
      { id: 1, name: 'freya', username: 'freya', address: '16th camsburg', phoneNumber: '77950', email: 'freya@test.com', password: 'freya', role: ROLE.ADMIN }
    ],

    structures: [
      {structureID: 001, Address: 'redroad', parkingSpaces: 30, costPerHour: '0.90'},
      {structureID: 001, Address: 'redroad', parkingSpaces: 30, costPerHour: '0.90'}
    ]
}
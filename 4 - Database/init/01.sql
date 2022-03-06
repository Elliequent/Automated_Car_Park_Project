CREATE TABLE User (
    User_ID VARCHAR(5) NOT NULL,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Firstname VARCHAR(50) NOT NULL,
    Lastname VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Phone_Number VARCHAR(50) NULL,
    Address VARCHAR(255) NOT NULL,
    PRIMARY KEY (User_ID)
);

CREATE TABLE Parking_Structure (
    Parking_Structure_ID VARCHAR(5) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Number_of_parking_spaces int(20) NOT NULL,
    Cost_per_hour DECIMAL(4,2) NOT NULL,
    PRIMARY KEY (Parking_Structure_ID)
);

CREATE TABLE Parking_Spaces (
    Parking_Space_ID VARCHAR(5) NOT NULL,
    Parking_Structure_ID VARCHAR(5) NOT NULL,
    Floor int(20) NOT NULL,
    Space_Number int(100) NOT NULL,
    is_disabled VARCHAR(3) NULL,
    PRIMARY KEY (Parking_Space_ID),
    FOREIGN KEY (Parking_Structure_ID) REFERENCES Parking_Structure(Parking_Structure_ID)
);

CREATE TABLE Vehicle (
    Registeration_Plate VARCHAR(20) NOT NULL,
    Make VARCHAR(100) NOT NULL,
    Model VARCHAR(100) NOT NULL,
    Is_Electric VARCHAR(3) NULL,
    Is_Currently_Parked VARCHAR(3) NULL,
    Parking_Space_ID VARCHAR(5) NULL,
    PRIMARY KEY (Registeration_Plate),
    FOREIGN KEY (Parking_Space_ID) REFERENCES Parking_Spaces(Parking_Space_ID)
);

CREATE TABLE User_Vehicles (
    User_ID VARCHAR(5) NOT NULL,
    Registeration_Plate VARCHAR(20) NOT NULL,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID),
    FOREIGN KEY (Registeration_Plate) REFERENCES Vehicle(Registeration_Plate)
);

CREATE TABLE Arrival_Departure (
    Arrival_Time Date NOT NULL,
    Departure_Time Date NOT NULL,
    User_ID VARCHAR(5) NOT NULL,
    Parking_Structure_ID VARCHAR(5) NOT NULL,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID),
    FOREIGN KEY (Parking_Structure_ID) REFERENCES Parking_Structure(Parking_Structure_ID)
);

INSERT INTO User VALUES('00001', 'Test', 'Test', 'Test', 'Test', 'Test@Test.com', '0777777777', '123 Test Town');
INSERT INTO User VALUES('00002', 'Musky', 'TeslaIsGreat', 'Elon', 'Musk', 'Elon@Testa.com', '0777777777', 'None of your damn business');
INSERT INTO User VALUES('00003', 'Admin', 'Admin', 'Admin', 'User', 'Admin@Test.com', '0777777777', '123 Admin Town');

INSERT INTO Parking_Structure VALUES('00001', '456 Test Town', '5', '2.00');

INSERT INTO Parking_Spaces VALUES('00001', '00001', '1', '1', 'No');
INSERT INTO Parking_Spaces VALUES('00002', '00001', '1', '2', 'No');
INSERT INTO Parking_Spaces VALUES('00003', '00001', '1', '3', 'No');
INSERT INTO Parking_Spaces VALUES('00004', '00001', '1', '4', 'No');
INSERT INTO Parking_Spaces VALUES('00005', '00001', '1', '5', 'Yes');

INSERT INTO Vehicle VALUES('MUSKY', 'Tesla', 'Model S', 'Yes', 'Yes', '00004');

INSERT INTO User_Vehicles VALUES('00002', 'MUSKY');

INSERT INTO Arrival_Departure VALUES('2022-03-06 12:00:00', '2022-03-06 16:00:00', '00002', '00001');
INSERT INTO Arrival_Departure VALUES('2022-01-01 12:00:00', '2022-01-01 18:00:00', '00002', '00001');
INSERT INTO Arrival_Departure VALUES('2022-02-02 12:00:00', '2022-02-02 15:00:00', '00002', '00001');
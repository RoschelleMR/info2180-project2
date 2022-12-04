DROP DATABASE IF EXISTS dolphin_crm;

CREATE DATABASE dolphin_crm;
USE dolphin_crm;

CREATE TABLE Users(
    id INT NOT NULL AUTO_INCREMENT, 
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(50), 
    created_at DATETIME,
    PRIMARY KEY (id)
);

CREATE TABLE Contacts(
    id INT NOT NULL AUTO_INCREMENT, 
    title varchar(255), 
    firstname varchar(255), 
    lastname varchar(255), 
    email varchar(255), 
    telephone varchar(32),
    company varchar(255), 
    type ENUM ('Sales Lead', 'Support'),
    assigned_to INT, 
    created_by INT, 
    created_at DATETIME, 
    updated_at DATETIME,

    PRIMARY KEY (id), 
    FOREIGN KEY (assigned_to) REFERENCES Users(id),
    FOREIGN KEY (created_by) REFERENCES Users(id)
);

CREATE TABLE Notes(
    id INT NOT NUll AUTO_INCREMENT, 
    contact_id INT, 
    comment TEXT, 
    created_by INT, 
    created_at DATETIME,

    PRIMARY KEY (id),
    FOREIGN KEY (contact_id) REFERENCES Contacts(id), 
    FOREIGN KEY (created_by) REFERENCES Users(id)
);

 
INSERT INTO Users (firstname, lastname, password, email, role, created_at)VALUES ('Justin', 'Allen', MD5('password123'), 'admin@project2.com', 'Admin', NOW() );

INSERT INTO Contacts (title, firstname, lastname, email, telephone, company
, type, assigned_to, created_by, created_at, updated_at) VALUES ('Ms','Erica','Parker','erica23@gmail.com','876-444-8743','Rhoden West','Support', 1, 1, NOW(),NOW());

INSERT INTO Contacts (title, firstname, lastname, email, telephone, company
, type, assigned_to, created_by, created_at, updated_at) VALUES ('Prof','John','Brown','johnbrown@gmail.com','876-909-5555','Vancouver Tech','Sales Lead', 1, 1, NOW(),NOW());

INSERT INTO Contacts (title, firstname, lastname, email, telephone, company
, type, assigned_to, created_by, created_at, updated_at) VALUES ('Dr','Jim','Bo','jimbo@yahoo.com','876-123-4567','Cruise Limited','Support', 1, 1, NOW(),NOW());
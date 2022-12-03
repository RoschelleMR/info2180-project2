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

 
INSERT INTO Users (firstname, lastname, password, email, role, created_at)VALUES ('Justin', 'Allen', PASSWORD('password123'), 'admin@project2.com', 'Admin', NOW() );
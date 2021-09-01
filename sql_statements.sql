CREATE DATABASE SpaCity;

USE SpaCity;

CREATE TABLE usertype(
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE betalingen(
    id INT NOT NULL AUTO_INCREMENT,
    status VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE klanten(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(255),
    email VARCHAR(255),
    betalingen_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES betalingen(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE gebruikers(
    id INT NOT NULL AUTO_INCREMENT,
    usertype_id INT NOT NULL,
    voornaam VARCHAR(255),
    gebruikersnaam VARCHAR(255) UNIQUE,
    wachtwoord VARCHAR(255),
    email VARCHAR(255),
    telefoonnummer INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(usertype_id) REFERENCES usertype(id)
);

INSERT INTO usertype VALUES (NULL, 'admin', now(), now());
INSERT INTO usertype VALUES (NULL, 'gebruiker', now(), now());
INSERT INTO usertype VALUES (NULL, 'gebruiker', now(), now());

INSERT INTO betalingen VALUES (NULL, 'afgerond', now(), now());
INSERT INTO betalingen VALUES (NULL, 'in behandeling', now(), now());
INSERT INTO betalingen VALUES (NULL, 'afgekeurd', now(), now());

INSERT INTO gebruikers VALUES (NULL, 1, 'jessie', 'jessie', '$2y$10$LGONlkPCf9QOJjV6Tlyy/.YPLwmTZeQ2pHIJXzdr5lToWEI3GA6Bu', 'admin', 0643501502,  now(), now());
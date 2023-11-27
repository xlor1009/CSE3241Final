Create database 3241Proj;
use 3241Proj;

CREATE TABLE venues (
    venue_id INT PRIMARY KEY AUTO_INCREMENT,
    venue_name VARCHAR(50) NOT NULL UNIQUE);

CREATE TABLE zones (
    zone_id INT PRIMARY KEY AUTO_INCREMENT,
    zone_name VARCHAR(50) NOT NULL,
    max_spots INT NOT NULL,
    rate DECIMAL(8, 2) NOT NULL,
    UNIQUE (zone_name)
);

CREATE TABLE events (
    event_id INT PRIMARY KEY AUTO_INCREMENT,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    venue_id INT,
    FOREIGN KEY (venue_id) REFERENCES venues(venue_id),
	UNIQUE (event_date)
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    cellphone_number VARCHAR(15) NOT NULL
);

CREATE TABLE reservations (
    confirmation_number INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    zone_id INT,
    event_id INT,
    reservation_date DATE NOT NULL,
    fee DECIMAL(8, 2) NOT NULL,
    is_cancelled BOOLEAN NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (zone_id) REFERENCES zones(zone_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);



CREATE TABLE distances (
    distance_id INT PRIMARY KEY AUTO_INCREMENT,
    zone_name VARCHAR(50) NOT NULL,
    venue_name VARCHAR(50) NOT NULL,
    miles INT NOT NULL,
    FOREIGN KEY (zone_name) REFERENCES zones(zone_name),
    FOREIGN KEY (venue_name) REFERENCES venues(venue_name),
    UNIQUE (zone_name, venue_name));
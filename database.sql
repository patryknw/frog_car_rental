CREATE DATABASE frog_car_rental CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128),
	surname VARCHAR(128),
	email VARCHAR(128) UNIQUE,
	password VARCHAR(128),
	is_business BOOLEAN,
	nip INT,
	regon INT
);

CREATE TABLE cars(
    id INT NOT NULL PRIMARY KEY,
    brand VARCHAR(128),
	model VARCHAR(128),
	horsepower INT,
	acceleration DECIMAL(2, 1),
	top_speed INT,
	engine VARCHAR(128),
    drivetrain VARCHAR(128),
    transmission VARCHAR(128),
	year INT,
	price INT,
    is_available BOOLEAN
);

INSERT INTO users VALUES(
    NULL,
    "Patryk",
    "Nowak",
    "patryk.nowak@zs1piaseczno.pl",
    "zaq1@WSX",
    1,
    0694201337,
    420133769
);

INSERT INTO cars VALUES(
    1,
    "BMW",
    "M3 E92",
    420,
    4.8,
    290,
    "4L V8",
    "RWD",
    "manual",
    2013,
    1200,
    1
);

INSERT INTO cars VALUES(
    2,
    "Nissan",
    "GTR R35",
    557,
    2.7,
    328,
    "3.8L V6 (TT)",
    "AWD",
    "sequential",
    2022,
    1800,
    1
);

INSERT INTO cars VALUES(
    3,
    "Audi",
    "R8 V10",
    525,
    3.8,
    316,
    "5.2 V10",
    "AWD",
    "sequential",
    2019,
    1600,
    1
);

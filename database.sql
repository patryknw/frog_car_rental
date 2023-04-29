CREATE DATABASE frog_car_rental CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE users(
    name VARCHAR(255),
	surname VARCHAR(255),
	email VARCHAR(255),
	password VARCHAR(255),
	is_business BOOLEAN,
	nip INT,
	regon INT
);

CREATE TABLE cars(
    id INT,
    brand VARCHAR(255),
	model VARCHAR(255),
	horsepower INT,
	acceleration DECIMAL(2, 1),
	top_speed INT,
	engine VARCHAR(255),
    drivetrain VARCHAR(255),
	year INT,
	price INT
);

INSERT INTO users VALUES(
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
    2013,
    1200
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
    2022,
    1800
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
    2019,
    1600
);

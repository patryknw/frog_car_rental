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
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(128),
	model VARCHAR(128),
	horsepower INT,
	acceleration DECIMAL(2, 1),
	top_speed INT,
	engine VARCHAR(128),
    drivetrain VARCHAR(128),
    transmission VARCHAR(128),
    fuel VARCHAR(128),
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
    NULL,
    "BMW",
    "M3 E92",
    420,
    4.8,
    290,
    "4L V8",
    "RWD",
    "manual",
    "petrol",
    2013,
    1200,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Nissan",
    "GTR R35",
    557,
    2.7,
    328,
    "3.8L V6 (Twin Turbo)",
    "AWD",
    "automatic_sequential",
    "petrol",
    2022,
    1800,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Audi",
    "R8 V10",
    525,
    3.8,
    316,
    "5.2 V10",
    "AWD",
    "automatic_sequential",
    "petrol",
    2019,
    1600,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Mercedes-Benz",
    "S 560",
    469,
    4.7,
    250,
    "4.0 V8",
    "AWD",
    "automatic_sequential",
    "petrol",
    2017,
    1100,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Lamborghini",
    "Aventador SVJ",
    759,
    2.8,
    352,
    "6.5 V12",
    "AWD",
    "sequential",
    "petrol",
    2021,
    2500,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Porsche",
    "911 Turbo S",
    641,
    2.7,
    330,
    "3.7 B6 (Twin Turbo)",
    "AWD",
    "automatic_sequential",
    "petrol",
    2020,
    2200,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Porsche",
    "911 GT3 RS",
    525,
    3.2,
    296,
    "4.0 B6",
    "RWD",
    "automatic_sequential",
    "petrol",
    2019,
    2000,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "McLaren",
    "570S Spider",
    562,
    3.2,
    328,
    "3.8 V8 (Twin Turbo)",
    "RWD",
    "automatic_sequential",
    "petrol",
    2018,
    2400,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Ferrari",
    "458 Italia",
    570,
    3.5,
    340,
    "4.5 V8",
    "RWD",
    "sequential",
    "petrol",
    2015,
    2300,
    1
);

INSERT INTO cars VALUES(
    NULL,
    "Nissan",
    "370Z",
    331,
    5.3,
    253,
    "3.7 V6",
    "RWD",
    "manual",
    "petrol",
    2016,
    1000,
    1
);

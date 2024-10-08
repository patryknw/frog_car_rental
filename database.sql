DROP DATABASE IF EXISTS frog_car_rental;
CREATE DATABASE frog_car_rental CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
	surname VARCHAR(255),
	email VARCHAR(255) UNIQUE,
	password VARCHAR(255),
	is_business BOOLEAN,
	nip CHAR(10) UNIQUE,
	regon CHAR(9) UNIQUE
);

CREATE TABLE cars(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(255),
	model VARCHAR(255),
	horsepower INT,
	acceleration DECIMAL(2, 1),
	top_speed INT,
	engine VARCHAR(255),
    drivetrain VARCHAR(255),
    transmission VARCHAR(255),
    fuel VARCHAR(255),
	year INT,
	price INT
);

CREATE TABLE rent_data(
    rent_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    car_id INT NOT NULL,
    date_from INT,
    date_until INT,
    car_wash BOOLEAN,
    flowers BOOLEAN,
    business BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (car_id) REFERENCES cars(id)
);

INSERT INTO users VALUES(
    NULL,
    "Patryk",
    "Nowak",
    "patryk.nowak@zs1piaseczno.pl",
    "3c6e3550e97b872da67938d34f3740f11c94102a5bfd3ddd4501820e980b5ca778c2fbe88d2695affe9a53bb5064c5a8a717360db3ecb87e2c0c74feea2f37a8",
    1,
    "0694201337",
    "420133769"
);

INSERT INTO users VALUES(
    NULL,
    "Zbigniew",
    "Stonoga",
    "zbigniew.stonoga@gmail.com",
    "3c6e3550e97b872da67938d34f3740f11c94102a5bfd3ddd4501820e980b5ca778c2fbe88d2695affe9a53bb5064c5a8a717360db3ecb87e2c0c74feea2f37a8",
    0,
    NULL,
    NULL
);

INSERT INTO users VALUES(
    NULL,
    "Szymon",
    "Besser",
    "szymool@gmail.com",
    "3c6e3550e97b872da67938d34f3740f11c94102a5bfd3ddd4501820e980b5ca778c2fbe88d2695affe9a53bb5064c5a8a717360db3ecb87e2c0c74feea2f37a8",
    0,
    NULL,
    NULL
);

INSERT INTO users VALUES(
    NULL,
    "Konrad",
    "Małaczek",
    "konrad.malaczek@gmail.com",
    "3c6e3550e97b872da67938d34f3740f11c94102a5bfd3ddd4501820e980b5ca778c2fbe88d2695affe9a53bb5064c5a8a717360db3ecb87e2c0c74feea2f37a8",
    1,
    "6739284492",
    "320539218"
);

INSERT INTO users VALUES(
    NULL,
    "Janusz",
    "Korwin-Mikke",
    "korwin@gmail.com",
    "3c6e3550e97b872da67938d34f3740f11c94102a5bfd3ddd4501820e980b5ca778c2fbe88d2695affe9a53bb5064c5a8a717360db3ecb87e2c0c74feea2f37a8",
    1,
    "6557389231",
    "547338980"
);

INSERT INTO cars VALUES(
    NULL,
    "BMW",
    "M3 E92",
    420,
    4.6,
    290,
    "4.0 V8",
    "RWD",
    "sequential",
    "petrol",
    2011,
    1200
);

INSERT INTO cars VALUES(
    NULL,
    "Nissan",
    "GT-R R35",
    565,
    2.7,
    328,
    "3.8 V6 (Twin Turbo)",
    "AWD",
    "automatic_sequential",
    "petrol",
    2020,
    2000
);

INSERT INTO cars VALUES(
    NULL,
    "Audi",
    "R8 V10",
    602,
    3.2,
    330,
    "5.2 V10",
    "AWD",
    "automatic_sequential",
    "petrol",
    2018,
    2100
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
    1400
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
    3000
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
    2500
);

INSERT INTO cars VALUES(
    NULL,
    "Porsche",
    "911 GT3 RS",
    513,
    3.2,
    312,
    "4.0 B6",
    "RWD",
    "automatic_sequential",
    "petrol",
    2021,
    2200
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
    2600
);

INSERT INTO cars VALUES(
    NULL,
    "Ferrari",
    "488 Pista",
    710,
    2.9,
    340,
    "3.9 V8 (Twin-Turbo)",
    "RWD",
    "automatic_sequential",
    "petrol",
    2019,
    2800
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
    800
);

INSERT INTO cars VALUES(
    NULL,
    "Lamborghini",
    "Huracan",
    631,
    2.9,
    328,
    "5.2 V10",
    "AWD",
    "automatic_sequential",
    "petrol",
    2020,
    2400
);

INSERT INTO cars VALUES(
    NULL,
    "Bugatti",
    "Chiron",
    1479,
    2.4,
    420,
    "8.0 W16 (Quad-Turbo)",
    "AWD",
    "automatic_sequential",
    "petrol",
    2019,
    5000
);

INSERT INTO cars VALUES(
    NULL,
    "Audi",
    "RS7",
    592,
    3.5,
    306,
    "4.0 V8 (Twin-Turbo)",
    "AWD",
    "automatic_sequential",
    "petrol",
    2023,
    1700
);

INSERT INTO cars VALUES(
    NULL,
    "BMW",
    "M8",
    591,
    3.2,
    305,
    "4.4 V8 (Twin-Turbo)",
    "AWD",
    "automatic_sequential",
    "petrol",
    2023,
    1700
);

INSERT INTO cars VALUES(
    NULL,
    "Ford",
    "Mustang",
    421,
    4.8,
    250,
    "5.0 V8",
    "RWD",
    "manual",
    "petrol",
    2018,
    1100
);

INSERT INTO cars VALUES(
    NULL,
    "Lexus",
    "IS F",
    423,
    4.6,
    270,
    "5.0 V8",
    "RWD",
    "automatic_sequential",
    "petrol",
    2013,
    1000
);

INSERT INTO cars VALUES(
    NULL,
    "Porsche",
    "718 Spyder",
    414,
    4.4,
    301,
    "4.0 B6",
    "RWD",
    "automatic_sequential",
    "petrol",
    2022,
    1500
);

INSERT INTO cars VALUES(
    NULL,
    "Toyota",
    "GT86",
    204,
    7.6,
    233,
    "2.0 H4",
    "RWD",
    "manual",
    "petrol",
    2016,
    500
);

INSERT INTO rent_data VALUES(
    NULL,
    1,
    5,
    1680818400,
    1685570400,
    1,
    1,
    1
);

INSERT INTO rent_data VALUES(
    NULL,
    2,
    4,
    1676242800,
    1676588400,
    1,
    0,
    0
);

INSERT INTO rent_data VALUES(
    NULL,
    3,
    2,
    1682892000,
    1683410400,
    0,
    0,
    0
);

INSERT INTO rent_data VALUES(
    NULL,
    3,
    3,
    1684620000,
    1684792800,
    1,
    0,
    0
);

INSERT INTO rent_data VALUES(
    NULL,
    4,
    2,
    1683842400,
    1684188000,
    0,
    1,
    0
);

INSERT INTO rent_data VALUES(
    NULL,
    4,
    3,
    1681941600,
    1682028000,
    0,
    0,
    1
);

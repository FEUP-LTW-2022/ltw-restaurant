<<<<<<< HEAD
PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
=======


PRAGMA foreign_keys = ON;
DROP TABLE IF EXISTS restaurant;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS dish;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS credit_card_info;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS photo;
/*******************************************************************************
   Create Tables
********************************************************************************/
>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8
CREATE TABLE restaurant (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ownerID INTEGER NOT NULL REFERENCES users(id),
    name VARCHAR UNIQUE NOT NULL,
    location VARCHAR,
    address VARCHAR NOT NULL,
    website VARCHAR,
    restaurant_logo INTEGER REFERENCES photo(id),
    openHour INTEGER NOT NULL DEFAULT '900',
    closeHour INTEGER NOT NULL DEFAULT '2200',
    email VARCHAR,
    phoneNumber VARCHAR,
    photo VARCHAR NOT NULL DEFAULT ('./images/default/default-rest.jpg'),
    category INTEGER NOT NULL, -- apagar default
    FOREIGN KEY(category) REFERENCES categories(id)
);
INSERT INTO restaurant VALUES(1,1,'Restaurante 1','cidade','Rua do restaurante1',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(2,2,'Restaurante 2','cidade2','Rua do restaurante2',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(3,3,'Restaurante 3','cidade3','Rua do restaurante3',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(4,4,'Restaurante 4','cidade4','Rua do restaurante4',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(5,5,'Restaurante 5','cidade5','Rua do restaurante5',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(6,6,'Restaurante 6','cidade6','Rua do restaurante6',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(7,7,'Restaurante 7','cidade7','Rua do restaurante7',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(8,8,'Restaurante 8','cidade8','Rua do restaurante8',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(9,9,'Restaurante 9','cidade9','Rua do restaurante9',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(10,10,'Restaurante 10','cidade10','Rua do restaurante10',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(11,11,'Restaurante 11','cidade11','Rua do restaurante11',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
INSERT INTO restaurant VALUES(12,12,'Restaurante 12','cidade12','Rua do restaurante12',NULL,900,2200,NULL,NULL,'./images/default/default-rest.jpg',1);
CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER,
	id_author INTEGER NOT NULL ,
	rate INTEGER NOT NULL,
	text VARCHAR,
	date VARCHAR,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
	FOREIGN KEY(id_author) REFERENCES users(id)
);
<<<<<<< HEAD
INSERT INTO reviews VALUES(1,2,1,5,'Nice restaurant','2021-07-12');
INSERT INTO reviews VALUES(2,2,1,1,'Nice restaurant','2017-12-20');
INSERT INTO reviews VALUES(3,2,1,5,'Nice restaurant','2020-01-17');
INSERT INTO reviews VALUES(4,1,1,5,'Nice restaurant','2015-04-30');
=======

>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8
CREATE TABLE dish(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
    price INTEGER NOT NULL CHECK ( price > 0 ),
<<<<<<< HEAD
    category VARCHAR, --(desert, meat, fish, vegan, etc)
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);
INSERT INTO dish VALUES(1,'Hamburguer de vaca',1,50,NULL);
INSERT INTO dish VALUES(2,'Mixed Olives',2,3.5,'starters');
INSERT INTO dish VALUES(3,'Mixed Platter',2,12,'starters');
INSERT INTO dish VALUES(4,'Pan-Fried Mushrooms',2,5,'starters');
INSERT INTO dish VALUES(5,'Smoked Salmon & Shirazy Salad',2,7,'starters');
INSERT INTO dish VALUES(6,'Sirloin Steak',2,16,'meat');
INSERT INTO dish VALUES(7,'Rib Eye Steak',2,16,'meat');
INSERT INTO dish VALUES(8,'Côte De Bœuf (2px)',2,47,'meat');
INSERT INTO dish VALUES(9,'T– Bone Steak ',2,30,'meat');
INSERT INTO dish VALUES(10,'Vegan Burger',2,7,'vegetarian');
INSERT INTO dish VALUES(11,'Pan-fried in garlic and tomatoes',2,4,'vegetarian');
INSERT INTO dish VALUES(12,'Chocolate Cake',2,5,'dessert');
INSERT INTO dish VALUES(13,'Churros',2,5,'dessert');
INSERT INTO dish VALUES(14,'Cheese Platter',2,11,'dessert');
=======
    photo VARCHAR,
    category VARCHAR,
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);--review dish?

>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8
CREATE TABLE request(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    userID INTEGER REFERENCES Users(id) NOT NULL,
    restaurantID INTEGER REFERENCES Restaurant(id) NOT NULL,
    date INTEGER DEFAULT (strftime('%s','now'))
);
CREATE TABLE request_dish(
    dishID INTEGER REFERENCES Dish(id),
    request INTEGER REFERENCES request(id),
    quantity INTEGER CHECK ( quantity > 0 ),
    PRIMARY KEY (dishID,request)
);
<<<<<<< HEAD
=======

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT ,
    email VARCHAR NOT NULL UNIQUE,
    name VARCHAR NOT NULL,
	birthDate VARCHAR,
	photo BLOB,
	type VARCHAR,
	phoneNumber INTEGER,
    isOwner NOT NULL DEFAULT False,
    password VARCHAR NOT NULL
);

>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8
CREATE TABLE user_login_token(
    token TEXT NOT NULL,
    userID INTEGER NOT NULL REFERENCES users(id)
);
<<<<<<< HEAD
INSERT INTO user_login_token VALUES('0LHmp8tBMukw7pKBycs/Jj',1);
INSERT INTO user_login_token VALUES('LFgUz7Os1T87.6kdMmT/dy',1);
INSERT INTO user_login_token VALUES('imFltVBwvMYSILOolhkjZ9',1);
INSERT INTO user_login_token VALUES('y1N5ZaJyPKchhpCbaNm01C',1);
INSERT INTO user_login_token VALUES('iFzk.YUklRH4LH9BFzlA9m',1);
INSERT INTO user_login_token VALUES('0LHmp8tBMukw7pKBycs/Jj',1);
INSERT INTO user_login_token VALUES('LFgUz7Os1T87.6kdMmT/dy',1);
INSERT INTO user_login_token VALUES('imFltVBwvMYSILOolhkjZ9',1);
INSERT INTO user_login_token VALUES('y1N5ZaJyPKchhpCbaNm01C',1);
INSERT INTO user_login_token VALUES('iFzk.YUklRH4LH9BFzlA9m',1);
INSERT INTO user_login_token VALUES('0LHmp8tBMukw7pKBycs/Jj',1);
INSERT INTO user_login_token VALUES('LFgUz7Os1T87.6kdMmT/dy',1);
INSERT INTO user_login_token VALUES('imFltVBwvMYSILOolhkjZ9',1);
INSERT INTO user_login_token VALUES('y1N5ZaJyPKchhpCbaNm01C',1);
INSERT INTO user_login_token VALUES('iFzk.YUklRH4LH9BFzlA9m',1);
INSERT INTO user_login_token VALUES('0LHmp8tBMukw7pKBycs/Jj',1);
INSERT INTO user_login_token VALUES('LFgUz7Os1T87.6kdMmT/dy',1);
INSERT INTO user_login_token VALUES('imFltVBwvMYSILOolhkjZ9',1);
INSERT INTO user_login_token VALUES('y1N5ZaJyPKchhpCbaNm01C',1);
INSERT INTO user_login_token VALUES('iFzk.YUklRH4LH9BFzlA9m',1);
INSERT INTO user_login_token VALUES('1FVagXyEP6ld0iEqP1D.Mw',1);
INSERT INTO user_login_token VALUES('V/bKr20sISzgtUgOIHxTPF',1);
INSERT INTO user_login_token VALUES('Jq7GHJ7vO7VnTQMAxVD5yC',1);
=======


CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	review_id INTEGER,
	id_author INTEGER,
	text VARCHAR,
	date TEXT,
	likes INTEGER,
	FOREIGN KEY(review_id) REFERENCES reviews(id),
	FOREIGN KEY(id_author) REFERENCES users(id)
);


>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8
CREATE TABLE categories (
	id INTEGER PRIMARY KEY,
	name VARCHAR NOT NULL
);
<<<<<<< HEAD
INSERT INTO categories VALUES(1,'Steakhouse');
INSERT INTO categories VALUES(2,'Fast Food');
INSERT INTO categories VALUES(3,'Italian');
INSERT INTO categories VALUES(4,'Pizzeria');
INSERT INTO categories VALUES(5,'Mediterranean');
CREATE TABLE IF NOT EXISTS "users"
=======

CREATE TABLE photo(
    id INT PRIMARY KEY ,
    extension VARCHAR NOT NULL
);



CREATE TABLE  users
>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8
(
    id          INTEGER
        primary key autoincrement,
    email       VARCHAR not null
        unique,
    name        VARCHAR not null,
    birthDate   VARCHAR,
    photo       VARCHAR default './images/default/default-user-image.png',
    type        VARCHAR,
    phoneNumber INTEGER,
    isOwner             default False not null,
    password    VARCHAR not null
);
<<<<<<< HEAD
INSERT INTO users VALUES(1,'up201805000@g.uporto.pt','Henrique Pinho','2022-05-11','../images/default/default-user-image.png','costumer',912345678,0,'$2a$10$zdhB12u9ydmOXyyIFhLfvOSYC.O471gfa41YWHZ5QRTXn4sBIGqLG');
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('restaurant',12);
INSERT INTO sqlite_sequence VALUES('reviews',4);
INSERT INTO sqlite_sequence VALUES('dish',14);
INSERT INTO sqlite_sequence VALUES('users',1);
COMMIT;
=======


>>>>>>> d1bd0e6e6383ed1c5a51c5ad24abb27ab23d29a8


PRAGMA foreign_keys = ON;
DROP TABLE IF EXISTS restaurant;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS dish;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS credit_card_info;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS categories;
/*******************************************************************************
   Create Tables
********************************************************************************/
CREATE TABLE restaurant (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ownerID INTEGER NOT NULL REFERENCES users(id),
    name VARCHAR UNIQUE NOT NULL,
    location VARCHAR,
    address VARCHAR NOT NULL,
    website VARCHAR,
    openHour DATE NOT NULL DEFAULT '1230',
    closeHour DATE NOT NULL DEFAULT '1930',
    email VARCHAR,
    phoneNumber VARCHAR
);

CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER,
	id_author INTEGER,
	title VARCHAR,
	rate INTEGER NOT NULL,
	text VARCHAR,
	date DATE,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
	FOREIGN KEY(id_author) REFERENCES users(id)
);

CREATE TABLE dish(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
    price INTEGER NOT NULL CHECK ( price > 0 ),
    photo VARCHAR,
    category VARCHAR,
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);--review dish?

CREATE TABLE request(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    userID INTEGER REFERENCES Users(id) NOT NULL ,
    restaurantID INTEGER REFERENCES Restaurant(id) NOT NULL
);

CREATE TABLE request_dish(
    dishID INTEGER REFERENCES Dish(id),
    request INTEGER REFERENCES request(id),
    quantity INTEGER CHECK ( quantity > 0 ),
    PRIMARY KEY (dishID,request)
);

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT ,
    email VARCHAR NOT NULL UNIQUE,
    name VARCHAR NOT NULL,
	birthDate VARCHAR,
	photoId VARCHAR,
	type VARCHAR,
	phoneNumber INTEGER,
    isOwner NOT NULL DEFAULT False,
    password VARCHAR NOT NULL --crypt
);

/*CREATE TABLE credit_card_info(
    user_id REFERENCES users(id) NOT NULL,
    num integer PRIMARY KEY,
    cardholder VARCHAR NOT NULL,
    expiry_date DATE NOT NULL
);*/

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


CREATE TABLE categories (
	id INTEGER PRIMARY KEY,
	restaurant_id INTEGER,
	category VARCHAR NOT NULL,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);

/*
--prevent the change of credit card info to prevent exploit
DROP TRIGGER IF EXISTS is_change_credit_card_info;



CREATE TRIGGER is_change_credit_card_info
    BEFORE  UPDATE ON users
    BEGIN
        SELECT RAISE(FAIL, 'updates not allowed');
    end;
*/




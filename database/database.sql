
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
    openHour INTEGER NOT NULL DEFAULT '900',
    closeHour INTEGER NOT NULL DEFAULT '2200',
    email VARCHAR,
    phoneNumber VARCHAR,
    category INTEGER NOT NULL DEFAULT 1, -- apagar default
    FOREIGN KEY(category) REFERENCES categories(id)
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

CREATE TABLE user_login_token(
    token TEXT NOT NULL,
    userID INTEGER NOT NULL REFERENCES users(id)
);


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
	name VARCHAR NOT NULL
);


CREATE TABLE photo(
    id INTEGER PRIMARY KEY,
    name VARCHAR NOT NULL,
    mime VARCHAR NOT NULL,
    size INTEGER NOT NULL,
    data BLOB NOT NULL
);






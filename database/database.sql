PRAGMA FOREIGN_KEYS ON 

DROP TABLE IF EXISTS restaurant;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS dish;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS categories;
/*******************************************************************************
   Create Tables
********************************************************************************/
CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	OwnerID INTEGER,
	name VARCHAR UNIQUE NOT NULL,
	address VARCHAR,
	location VARCHAR,
	website VARCHAR,
	openHour DATE,
	closeHour DATE,
	phoneNumber VARCHAR,

);

CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER,
	id_autor INTEGER,
	title VARCHAR,
	rate INTEGER NOT NULL,
	text VARCHAR,
	date DATE,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
	FOREIGN KEY(id_autor) REFERENCES users(id)
);

CREATE TABLE dish(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
    price INTEGER,
    photo VARCHAR,
    category VARCHAR,
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);--review dish?

CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR,
	fullName VARCHAR,
	birthDate VARCHAR,
	photoId VARCHAR,
	type VARCHAR,
    password VARCHAR --crypt
	
);

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	review_id INTEGER,
	id_autor INTEGER,
	text VARCHAR,
	date TEXT,
	likes INTEGER,
	FOREIGN KEY(review_id) REFERENCES reviews(id),
	FOREIGN KEY(id_autor) REFERENCES users(id)
);


CREATE TABLE categories (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER,
	category VARCHAR,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);



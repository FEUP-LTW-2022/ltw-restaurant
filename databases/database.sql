
DROP TABLE IF EXISTS Album;
DROP TABLE IF EXISTS Artist;
DROP TABLE IF EXISTS Track;
DROP TABLE IF EXISTS Customer;
/*******************************************************************************
   Create Tables
********************************************************************************/
CREATE TABLE Restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	OwnerID INTEGER,
	name VARCHAR UNIQUE NOT NULL,
	address VARCHAR,
	location VARCHAR,
	website VARCHAR,
	openHour DATE,
	closeHour DATE,
	phoneNumber VARCHAR,
	rating INTEGER

);

CREATE TABLE Reviews (
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

CREATE TABLE Dish(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
    price INTEGER,
    photo VARCHAR,
    category VARCHAR,
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);--review dish?

CREATE TABLE Users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR,
	fullName VARCHAR,
	birthDate VARCHAR,
	photoId VARCHAR,
	type VARCHAR,
    password VARCHAR --crypt
	
);

CREATE TABLE Comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	review_id INTEGER,
	id_autor INTEGER,
	text VARCHAR,
	date TEXT,
	likes INTEGER,
	FOREIGN KEY(review_id) REFERENCES reviews(id),
	FOREIGN KEY(id_autor) REFERENCES users(id)
);


CREATE TABLE Categories (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER,
	category VARCHAR,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);

/*********************************************************************************/
/* Populate */

INSERT INTO Restaurant(id, name) VALUES (1, 'Restaurante 1')

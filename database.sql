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
	rating INTEGER

);

CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	id_autor INTEGER REFERENCES users,
	title VARCHAR,
	rate INTEGER NOT NULL,
	text VARCHAR,
	date DATE
);

CREATE TABLE dish(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER REFERENCES restaurant
    price INTEGER,
    photo VARCHAR,
    category VARCHAR --(received, preparing, ready, delivered)
);--review dish?

CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR,
	fullName VARCHAR,
	birthDate VARCHAR,
	photoId VARCHAR,
	type VARCHAR,
    password text --crypt
);

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	review_id INTEGER REFERENCES reviews,
	id_autor INTEGER REFERENCES users,
	text VARCHAR,
	date TEXT,
	likes INTEGER
);


CREATE TABLE categories (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	category VARCHAR
);
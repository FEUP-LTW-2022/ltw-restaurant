CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
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
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	restaurant_id INTEGER,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
	id_autor INTEGER,
	FOREIGN KEY(id_autor) REFERENCES users(id),
	title VARCHAR,
	rate INTEGER NOT NULL,
	text VARCHAR,
	date DATE
);

CREATE TABLE dish(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
  price INTEGER,
  photo VARCHAR,
  category VARCHAR --(received, preparing, ready, delivered)
);--review dish?

CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR,
	fullName VARCHAR,
	birthDate VARCHAR,
	photoId VARCHAR,
	type VARCHAR,
    password VARCHAR --crypt
);

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	review_id INTEGER,
	FOREIGN KEY(review_id) REFERENCES reviews(id),
	id_autor INTEGER,
	FOREIGN KEY(id_autor) REFERENCES users(id),
	text VARCHAR,
	date TEXT,
	likes INTEGER
);


CREATE TABLE categories (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	restaurant_id INTEGER,
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
	category VARCHAR
);
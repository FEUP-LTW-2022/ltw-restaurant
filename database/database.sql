PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

CREATE TABLE restaurant (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ownerID INTEGER NOT NULL REFERENCES users(id),
    name VARCHAR UNIQUE NOT NULL,
    city VARCHAR,
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
);

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


CREATE TABLE IF NOT EXISTS "users"
(
    id          INTEGER
        primary key autoincrement,
    email       VARCHAR not null
        unique,
    name        VARCHAR not null,
    birthDate   VARCHAR,
    photo       VARCHAR default '../images/default/default-user-image.png',
    type        VARCHAR,
    phoneNumber INTEGER,
    isOwner             default False not null,
    password    VARCHAR not null
);

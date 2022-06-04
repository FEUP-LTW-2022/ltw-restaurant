PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

CREATE TABLE restaurant (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ownerID INTEGER NOT NULL REFERENCES users(id),
    name VARCHAR UNIQUE NOT NULL,
    city VARCHAR NOT NULL ,
    address VARCHAR NOT NULL,
    website VARCHAR,
    openHour INTEGER NOT NULL ,
    closeHour INTEGER NOT NULL ,
    email VARCHAR,
    phoneNumber VARCHAR,
    photo VARCHAR NOT NULL DEFAULT './images/default/default-rest.jpg',
    category INTEGER NOT NULL, -- apagar default
    FOREIGN KEY(category) REFERENCES categories(id)
);


CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER,
	id_author INTEGER NOT NULL ,
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
    category VARCHAR, --(Starters, desert, meat, fish, vegan, etc)
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
    photo       VARCHAR default './images/default/default-user-image.png',
    address        VARCHAR,
    phoneNumber INTEGER,
    password    VARCHAR not null
);

INSERT INTO sqlite_sequence VALUES('restaurant',12);
INSERT INTO sqlite_sequence VALUES('reviews',4);
INSERT INTO sqlite_sequence VALUES('dish',1);
INSERT INTO sqlite_sequence VALUES('users',1);
COMMIT;

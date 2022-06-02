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
    photo VARCHAR DEFAULT '../images/default/default-rest.png',
    category INTEGER NOT NULL, -- apagar default
    FOREIGN KEY(category) REFERENCES categories(id)
);
INSERT INTO restaurant VALUES(1,1,'Restaurante 1','cidade','Rua do restaurante1',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(2,2,'Restaurante 2','cidade2','Rua do restaurante2',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(3,3,'Restaurante 3','cidade3','Rua do restaurante3',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(4,4,'Restaurante 4','cidade4','Rua do restaurante4',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(5,5,'Restaurante 5','cidade5','Rua do restaurante5',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(6,6,'Restaurante 6','cidade6','Rua do restaurante6',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(7,7,'Restaurante 7','cidade7','Rua do restaurante7',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(8,8,'Restaurante 8','cidade8','Rua do restaurante8',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(9,9,'Restaurante 9','cidade9','Rua do restaurante9',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(10,10,'Restaurante 10','cidade10','Rua do restaurante10',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(11,11,'Restaurante 11','cidade11','Rua do restaurante11',NULL,900,2200,NULL,NULL,NULL,1);
INSERT INTO restaurant VALUES(12,12,'Restaurante 12','cidade12','Rua do restaurante12',NULL,900,2200,NULL,NULL,NULL,1);



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
INSERT INTO reviews VALUES(1,2,NULL,NULL,5,NULL,NULL);
INSERT INTO reviews VALUES(2,2,NULL,NULL,1,NULL,NULL);
INSERT INTO reviews VALUES(3,2,NULL,NULL,5,NULL,NULL);
INSERT INTO reviews VALUES(4,1,NULL,NULL,5,NULL,NULL);



CREATE TABLE dish(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
    price INTEGER NOT NULL CHECK ( price > 0 ),
    photo VARCHAR,
    category VARCHAR, --(desert, meat, fish, vegan, etc)
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);
INSERT INTO dish VALUES(1,'Hamburguer de vaca',1,50,NULL,NULL);


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
INSERT INTO user_login_token VALUES('0LHmp8tBMukw7pKBycs/Jj',1);
INSERT INTO user_login_token VALUES('LFgUz7Os1T87.6kdMmT/dy',1);
INSERT INTO user_login_token VALUES('imFltVBwvMYSILOolhkjZ9',1);
INSERT INTO user_login_token VALUES('y1N5ZaJyPKchhpCbaNm01C',1);
INSERT INTO user_login_token VALUES('iFzk.YUklRH4LH9BFzlA9m',1);



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
INSERT INTO categories VALUES(1,'steakhouse');


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
INSERT INTO users VALUES(1,'up201805000@g.uporto.pt','Henrique Pinho','2022-05-11','''../images/default/default-user-image.png''','costumer',912345678,0,'$2a$10$zdhB12u9ydmOXyyIFhLfvOSYC.O471gfa41YWHZ5QRTXn4sBIGqLG');

INSERT INTO sqlite_sequence VALUES('restaurant',12);
INSERT INTO sqlite_sequence VALUES('reviews',4);
INSERT INTO sqlite_sequence VALUES('dish',1);
INSERT INTO sqlite_sequence VALUES('users',1);
COMMIT;

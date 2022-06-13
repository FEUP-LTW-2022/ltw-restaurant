PRAGMA foreign_keys=ON;

CREATE TABLE restaurant (
    id INTEGER PRIMARY KEY,
    ownerID INTEGER NOT NULL REFERENCES users(id),
    name VARCHAR UNIQUE NOT NULL,
    city VARCHAR NOT NULL ,
    address VARCHAR NOT NULL,
    website VARCHAR,
    openHour INTEGER NOT NULL ,
    closeHour INTEGER NOT NULL ,
    email VARCHAR,
    phoneNumber VARCHAR,
    logo INTEGER NOT NULL DEFAULT 0,
    category INTEGER NOT NULL, -- apagar default
    FOREIGN KEY(category) REFERENCES categories(id)
);

CREATE TABLE reviews (
	id INTEGER PRIMARY KEY,
	restaurant_id INTEGER,
	id_author INTEGER NOT NULL ,
	rate INTEGER NOT NULL,
	text VARCHAR,
	date INTEGER default strftime('%s','now'),
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id),
	FOREIGN KEY(id_author) REFERENCES users(id)
);

CREATE TABLE dish(
	id INTEGER PRIMARY KEY ,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER,
    price INTEGER NOT NULL CHECK ( price > 0 ),
    category VARCHAR, --(starters, meat, fish, vegetarian, dessert)
	--(received, preparing, ready, delivered)?
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(id)
);

CREATE TABLE request(
    id INTEGER PRIMARY KEY,
    userID INTEGER REFERENCES Users(id) NOT NULL ,
    restaurantID INTEGER REFERENCES Restaurant(id) NOT NULL,
    date INTEGER DEFAULT (strftime('%s','now'))
);

CREATE TABLE request_dish(
    dishID INTEGER REFERENCES Dish(id),
    request INTEGER REFERENCES request(id),
    quantity INTEGER CHECK ( quantity > 0 ),
    PRIMARY KEY (dishID,request)
);

CREATE TABLE photo(
      id INTEGER PRIMARY KEY autoincrement ,
      extension VARCHAR NOT NULL
);
INSERT INTO photo values (0,'jpg');
INSERT INTO photo values (1,'png');

CREATE TABLE user_login_token(
    token TEXT NOT NULL,
    userID INTEGER NOT NULL REFERENCES users(id)
);


CREATE TABLE categories (
	id INTEGER PRIMARY KEY,
	name VARCHAR NOT NULL
);



CREATE TABLE IF NOT EXISTS users
(
    id          INTEGER primary key,
    email       VARCHAR not null unique,
    name        VARCHAR not null,
    birthDate   VARCHAR,
    logo        INTEGER DEFAULT 1,
    phoneNumber INTEGER,
    password    VARCHAR not null,
    address     VARCHAR
);
INSERT INTO users VALUES(1,'up201805000@g.uporto.pt','Henrique Pinho','2022-05-11',1,912345678,'$2a$10$zdhB12u9ydmOXyyIFhLfvOSYC.O471gfa41YWHZ5QRTXn4sBIGqLG',NULL);

INSERT INTO categories VALUES(1,'Steakhouse');
INSERT INTO categories VALUES(2,'Fast Food');
INSERT INTO categories VALUES(3,'Italian');
INSERT INTO categories VALUES(4,'Pizzeria');
INSERT INTO categories VALUES(5,'Mediterranean');


INSERT INTO photo values (0,'jpg');
INSERT INTO photo values (1,'png');

CREATE TRIGGER token_creation
    BEFORE INSERT
    ON user_login_token
    BEGIN
        DELETE FROM old WHERE old.userID == new.userID;
    end;
/*

INSERT INTO restaurant VALUES(1,1,'Restaurante 1','cidade','Rua do restaurante1',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(2,2,'Restaurante 2','cidade2','Rua do restaurante2',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(3,3,'Restaurante 3','cidade3','Rua do restaurante3',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(4,4,'Restaurante 4','cidade4','Rua do restaurante4',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(5,5,'Restaurante 5','cidade5','Rua do restaurante5',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(6,6,'Restaurante 6','cidade6','Rua do restaurante6',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(7,7,'Restaurante 7','cidade7','Rua do restaurante7',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(8,8,'Restaurante 8','cidade8','Rua do restaurante8',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(9,9,'Restaurante 9','cidade9','Rua do restaurante9',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(10,10,'Restaurante 10','cidade10','Rua do restaurante10',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(11,11,'Restaurante 11','cidade11','Rua do restaurante11',NULL,900,2200,NULL,NULL,0,1);
INSERT INTO restaurant VALUES(12,12,'Restaurante 12','cidade12','Rua do restaurante12',NULL,900,2200,NULL,NULL,0,1);


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



INSERT INTO reviews VALUES(1,2,1,5,'Nice restaurant','2021-07-12');
INSERT INTO reviews VALUES(2,2,1,1,'Nice restaurant','2017-12-20');
INSERT INTO reviews VALUES(3,2,1,5,'Nice restaurant','2020-01-17');
INSERT INTO reviews VALUES(4,1,1,5,'Nice restaurant','2015-04-30');

 */
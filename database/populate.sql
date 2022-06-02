/*********************************************************************************/
/* Populate */

/*restaurants */

INSERT INTO restaurant VALUES(1,1,'Restaurante 1',NULL,'Rua do restaurante1',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(2,2,'Restaurante 2',NULL,'Rua do restaurante2',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(3,3,'Restaurante 3',NULL,'Rua do restaurante3',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(4,4,'Restaurante 4',NULL,'Rua do restaurante4',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(5,5,'Restaurante 5',NULL,'Rua do restaurante5',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(6,6,'Restaurante 6',NULL,'Rua do restaurante6',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(7,7,'Restaurante 7',NULL,'Rua do restaurante7',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(8,8,'Restaurante 8',NULL,'Rua do restaurante8',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(9,9,'Restaurante 9',NULL,'Rua do restaurante9',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(10,10,'Restaurante 10',NULL,'Rua do restaurante10',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(11,11,'Restaurante 11',NULL,'Rua do restaurante11',NULL,900,2200,NULL,NULL,1);
INSERT INTO restaurant VALUES(12,12,'Restaurante 12',NULL,'Rua do restaurante12',NULL,900,2200,NULL,NULL,1);

/*reviews*/
INSERT INTO reviews(id, restaurant_id, rate) VALUES (1,2, 5);
INSERT INTO reviews(id, restaurant_id, rate) VALUES (2,2, 0);
INSERT INTO reviews(id, restaurant_id, rate) VALUES (3,2, 5);
INSERT INTO reviews(id, restaurant_id, rate) VALUES (4,1, 5);

/*Dish*/
--INSERT INTO dish(id,name, restaurant_id) VALUES (1,'dish', 3);
INSERT INTO dish(id,name, restaurant_id,price) VALUES (1,'Hamburguer de vaca', 1,50);


/*admin*/




/*categories */ 
INSERT INTO categories(id, name) VALUES (1, 'steakhouse');
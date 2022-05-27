/*********************************************************************************/
/* Populate */

/*restaurants */

INSERT INTO restaurant(id,ownerID, name, address) VALUES (1, 1, 'Restaurante 1', 'Rua do restaurante1');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (2, 2, 'Restaurante 2', 'Rua do restaurante2');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (3, 3, 'Restaurante 3', 'Rua do restaurante3');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (4, 4, 'Restaurante 4', 'Rua do restaurante4');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (5, 5, 'Restaurante 5', 'Rua do restaurante5');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (6, 6, 'Restaurante 6', 'Rua do restaurante6');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (7, 7, 'Restaurante 7', 'Rua do restaurante7');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (8, 8, 'Restaurante 8', 'Rua do restaurante8');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (9, 9, 'Restaurante 9', 'Rua do restaurante9');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (10, 10, 'Restaurante 10', 'Rua do restaurante10');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (11, 11, 'Restaurante 11', 'Rua do restaurante11');
INSERT INTO restaurant(id,ownerID, name, address) VALUES (12, 12, 'Restaurante 12', 'Rua do restaurante12');

/*reviews*/
INSERT INTO reviews(id, restaurant_id, rate) VALUES (1,2, 5);
INSERT INTO reviews(id, restaurant_id, rate) VALUES (2,2, 0);
INSERT INTO reviews(id, restaurant_id, rate) VALUES (3,2, 5);
INSERT INTO reviews(id, restaurant_id, rate) VALUES (4,1, 5);

/*Dish*/
--INSERT INTO dish(id,name, restaurant_id) VALUES (1,'dish', 3);


/*admin*/




/*categories */ 
INSERT INTO categories(id, name) VALUES (1, 'steakhouse');
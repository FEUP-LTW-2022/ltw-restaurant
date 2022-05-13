/*********************************************************************************/
/* Populate */

INSERT INTO restaurant(id, name) VALUES (1, 'Restaurante 1');
INSERT INTO restaurant(id, name) VALUES (2, 'Restaurante 2');
INSERT INTO restaurant(id, name) VALUES (3, 'Restaurante 3');
INSERT INTO restaurant(id, name) VALUES (4, 'Restaurante 4');
INSERT INTO restaurant(id, name) VALUES (5, 'Restaurante 5');
INSERT INTO restaurant(id, name) VALUES (6, 'Restaurante 6');


INSERT INTO reviews(id,restaurant_id, rate) VALUES (1,2, 5);

INSERT INTO dish(id,name, restaurant_id) VALUES (1,'dish', 3);

INSERT INTO users(id, username) VALUES (1, 'username');
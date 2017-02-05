/*----------------------------------------
 * CREATE DATABASE
 *----------------------------------------*/
CREATE DATABASE Fishing;
USE Fishing;

/*----------------------------------------
 * CREATE TABLE
 *----------------------------------------*/
/**
 * User Table
 */
CREATE TABLE User(
	user_id       int NOT NULL,    /* NULL禁止 */
	position      int NOT NULL,    /* NULL禁止 */
	fish_sum		int DEFAULT 0,
	next_id		int DEFAULT 0,
	PRIMARY KEY(user_id)
);

/*----------------------------------------
 * INSERT
 *----------------------------------------*/
/**
 * User
 */
INSERT INTO User(user_id, position, fish_sum, next_id)
VALUES (1, 0, 0, 0),
        (2, 0, 0, 0),
        (3, 0, 0, 0),
        (4, 0, 0, 0);


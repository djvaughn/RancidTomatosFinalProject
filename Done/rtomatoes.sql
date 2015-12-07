drop DATABASE if exists rtomatoes;
CREATE DATABASE rtomatoes;
USE rtomatoes;

create table reviewers(
	userId		varchar(100) PRIMARY KEY,
	firstName	varchar(100) NOT NULL,
	lastName	varchar(100) NOT NULL,
	publication	varchar(100) NOT NULL
);

create table movies(
	title			varchar(100) NOT NULL PRIMARY KEY,
	year			int NOT NULL,
	rating			int NOT NULL,
	director		varchar(100) NOT NULL,
	mpaaRating		varchar(5) NOT NULL,
	runTime		int NOT NULL,
	boxOffice		int NOT NULL,
	posterImage		varchar(100) NOT NULL
);

create table reviews(
	id		bigint AUTO_INCREMENT PRIMARY KEY,
	title		varchar(100) NOT NULL,
	userId		varchar(100) NOT NULL,
	comment	varchar(2000) NOT NULL,
	rating		char(1) NOT NULL
);

create table users(
	id		bigint AUTO_INCREMENT PRIMARY KEY,
	userId		varchar(100) NOT NULL default ' ' UNIQUE,
	hash		varchar(255) NOT NULL default ' '
);

/*Inserting movies  into the movie table*/
INSERT INTO movies(title, year, rating, director, mpaaRating, runTime, boxOffice, posterImage) VALUES('The Princess Bride', 1987, 95, 'Rob Reiner', 'PG', 98, 31, 'moviePoster/princessBride.png');
INSERT INTO movies(title, year, rating, director, mpaaRating, runTime, boxOffice, posterImage) VALUES('Mortal Kombat', 1995, 74, 'Paul Anderson', 'PG-13', 101, 121, 'moviePoster/mortalKombat.png');
INSERT INTO movies(title, year, rating, director, mpaaRating, runTime, boxOffice, posterImage) VALUES('The Martian', 2015, 93, 'Ridley Scott', 'PG-13', 134, 556, 'moviePoster/theMartian.png');
INSERT INTO movies(title, year, rating, director, mpaaRating, runTime, boxOffice, posterImage) VALUES('Teenage Mutant Ninja Turtles II: The Secret of the Ooze', 1991, 36, 'Michael Pressman', 'PG', 88, 79, 'moviePoster/tmnt2.png');



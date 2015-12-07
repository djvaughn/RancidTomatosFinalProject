drop table if exists users;
create table users(
	id			bigint not null auto_increment primary key,
	userid		varchar(100) not null,
	name		varchar(100) not null,
	hash		varchar(255) not null,
	publication	varchar(100)
);

drop table if exists movies;
create table movies(
	id			bigint not null auto_increment primary key,
	title		varchar(100) not null,
	year		int not null,
	rating		int not null,
	imagePath	varchar(100) not null,
	cast		varchar(2000) not null,
	director	varchar(100) not null,
	producer	varchar(2000) not null,
	mpaaRating	varchar(5) not null,
	releaseDate	varchar(10) not null,
	synopsis	varchar(2000) not null,
	productionCompany	varchar(100) not null,
	runTime		int not null,
	genre		varchar(2000) not null,
	boxOffice	int not null,
	links		varchar(100) not null
);

drop table if exists reviews;
create table reviews(
	id			bigint not null auto_increment primary key,
	title		varchar(100) not null,
	userid		varchar(100) not null,
	comment		varchar(2000) not null,
	rating		char(1) not null
);
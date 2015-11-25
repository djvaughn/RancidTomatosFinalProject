drop table if exists quote;
create table quote
(
 id         bigint not null auto_increment primary key,
 added      datetime,
 quote      varchar(2000) not null,
 author     varchar(100) not null,
 rating     int not null,
 flagged    char(1) not null
 );

insert into quote(added, quote, author, rating, flagged) values(now(), 'The earlyworm gets the bird.', 'Dave Farber', 0, 'f');
insert into quote(added, quote, author, rating, flagged) values(now(), 'By all means marry; if you get a good wife, you''ll become happy; if you get a bad one, you\'ll become a philosopher.', 'Socrates', 0, 'f');
insert into quote(added, quote, author, rating, flagged) values(now(), 'This year try a ham.', 'On placard being carried by a turkey', 0, 'f');

create database carousel;
use carousel;

create table image(
	id int not null auto_increment primary key,
	title varchar(255),
	folder varchar(255),
	src varchar(255),
	created_at datetime not null
);
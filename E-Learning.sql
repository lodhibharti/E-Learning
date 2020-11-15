create database E-learningsite;
use E-learningsite;

create table admin 
(
admin_name varchar(30) primary key,
password varchar(10)
);

insert into admin values('admin','admin');

create table user 
(
user_name varchar(30),
password varchar(10),
email_id varchar(40) primary key,
contact varchar(10) unique key
);

create table notes 
(
id int(5) primary key auto_increment,
title varchar(40),
category varchar(40),
notesfile varchar(200),
thumbnail varchar(100),
emailid varchar(40),
uploadingdate varchar(30),
description varchar(200),
status varchar(10)
);




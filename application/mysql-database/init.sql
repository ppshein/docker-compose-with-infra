CREATE DATABASE IF NOT EXISTS MYSQL_DATABASE;
USE MYSQL_DATABASE;
drop table if exists users;
create table users (
    id int not null auto_increment,
    username text not null,
    password text not null,
    primary key (id)
);
insert into users (username, password) values
    ("admin", "password"),
    ("User A", "987654321"),
    ("User B", "123456789");
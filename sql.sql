--Run the sql queries below one by one

CREATE database tavola;

CREATE TABLE tavola.users (
    email VARCHAR(50) NOT NULL , 
    password VARCHAR(50) NOT NULL , 
    fname VARCHAR(100) NOT NULL ,
    lname VARCHAR(100), 
    PRIMARY KEY (email(50)));

CREATE TABLE tavola.reservations (
    email VARCHAR(255),
    res_id integer,
    reservation_date DATE,
    reservation_time TIME,
    table_id VARCHAR(10),
    PRIMARY KEY (email, res_id, reservation_date, reservation_time, table_id),
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE tavola.admin (
    email VARCHAR(255),
    password VARCHAR(255)
);

insert into tavola.admin values ('admin@pass', 'admin@pass');
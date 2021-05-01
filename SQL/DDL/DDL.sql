DROP DATABASE IF EXISTS MondaMari;
CREATE DATABASE MondaMari;

USE MONDAMARI;

CREATE TABLE UTENTI (
    email varchar(50) NOT NULL PRIMARY KEY,
    password varchar(50) NOT NULL,
    nome varchar(100) NOT NULL,
    cognome varchar(100) NOT NULL
);
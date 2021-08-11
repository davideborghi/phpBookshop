DROP DATABASE IF EXISTS MondaMari;
CREATE DATABASE MondaMari;

USE MONDAMARI;

CREATE TABLE UTENTI (
    email varchar(50) NOT NULL PRIMARY KEY,
    password varchar(50) NOT NULL,
    nome varchar(100) NOT NULL,
    cognome varchar(100) NOT NULL
);
INSERT INTO UTENTI VALUES ('dborghi@gmail.com', 'passdav', 'Davide', 'Borghi');
INSERT INTO UTENTI VALUES ('mariabevacqua@gmail.com', 'passmar', 'Maria', 'Bevacqua');


CREATE TABLE AUTORI(
    id int not null primary key AUTO_INCREMENT,
    nome varchar(500),
    urlfotoautore varchar(5000)
);
INSERT INTO AUTORI (id, Nome, UrlFotoAutore) VALUES (NULL, 'Joanne Rowling', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS3bDP-AbnH7l2pjO-SwJkEFQu9dxDE6V8wyJ_5x_lfkVpTMA80'),
 (NULL, 'Clive Cussler', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSax7uUri9y3q873L3Jnwqic7PsrprOFZFs0HBhNLFO215kuIvx');
    (NULL, 'Stephen King', 'https://www.filo.news/__export/1600631826092/sites/claro/img/2020/09/20/stephen_king.jpg_423682103.jpg');

 CREATE TABLE LIBRI(
     id int not null primary key AUTO_INCREMENT,
     titolo varchar(500),
     editore varchar(500),
     urlanteprimacopertina varchar(5000)
 );

 INSERT INTO libri (id, titolo, editore, urlanteprimacopertina) VALUES (NULL, 'Harry Potter e la pietra filosofale', 'Salani Editore', 'https://images-na.ssl-images-amazon.com/images/I/5130+N583vL._SY344_BO1,204,203,200_.jpg'), (NULL, 'Harry Potter e la camera dei segreti', 'Salani Editore', 'https://i.ebayimg.com/images/g/23AAAOSwaUdfDFXJ/s-l640.jpg');
 INSERT INTO libri (id, titolo, editore, urlanteprimacopertina) VALUES (NULL, 'SAHARA', 'TEA DUE', 'https://www.picclickimg.com/d/l400/pict/233722915441_/Libro-Sahara-Clive-Cussler-354-Tea-Due-2000.jpg');

 CREATE TABLE REL_LIBRO_AUTORE(
     idautore int not null,
     idlibro int not null
 );
 INSERT INTO REL_LIBRO_AUTORE (idautore, idlibro) values (1,1);
 INSERT INTO REL_LIBRO_AUTORE (idautore, idlibro) values (1,2);
 INSERT INTO REL_LIBRO_AUTORE (idautore, idlibro) values (2,3);
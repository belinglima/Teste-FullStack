drop database if exists phpoo;
create database phpoo;
use phpoo;

DROP TABLE IF EXISTS tbl_familia;
CREATE TABLE tbl_familia (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  membros varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO tbl_familia (nome,membros) VALUES 
('Tyrell','4'),
('Arryn','8'),
('Tully','5'),
('GreyJoy','2'),
('Lannister','9'),
('Baratheon','12'),
('Martel','10'), 
('Targaryen','15');


DROP TABLE IF EXISTS tbl_guerra;
CREATE TABLE tbl_guerra (
  id int(11) NOT NULL AUTO_INCREMENT,
  desafiadora varchar(100) NOT NULL,
  desafiada varchar(100) NOT NULL,
  inicio DATE,
  fim DATE,
  vencedora varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO tbl_guerra (desafiadora,desafiada,inicio,fim,vencedora) VALUES 
('Lannister','Arryn','2011.02.01','2012.03.01','Arryn'),
('Tyrell','Tyrell','2011.02.01','2013.03.01','Tyrell'),
('Tyrell','Martel','2011.03.01','2012.04.01','Martel'),
('GreyJoy','Targaryen','2011.05.01','2011.06.01','GreyJoy'),
('Martel','Arryn','2011.01.01','2014.01.11','Arryn'),
('Baratheon','Tully','2011.09.01','2015.10.01','Baratheon'),
('Targaryen','GreyJoy','2011.04.01','2016.06.01','Targaryen'),
('Arryn','Martel','2011.02.01','2017.08.01','Martel'),
('Tully','Lannister','2011.07.01','2013.11.01','Lannister'),
('Tully','Tyrell','2011.02.01','2012.08.01','Tully');



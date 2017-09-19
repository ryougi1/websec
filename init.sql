-- paste this into command form to init DB
CREATE DATABASE Webshop;
CREATE TABLE Users (
	   uuid	 	 int NOT NULL AUTO_INCREMENT,
	   email     varchar(100) UNIQUE,
	   firstname tinytext NOT NULL,
	   lastname  tinytext NOT NULL,
	   country	 tinytext NOT NULL,
	   city		 tinytext NOT NULL,
	   zip		 int NOT NULL,
	   address	 tinytext NOT NULL,
	   pwhash	 tinytext NOT NULL,
	PRIMARY KEY (uuid)
);

CREATE TABLE Products (
	   prodID    int NOT NULL AUTO_INCREMENT,
	   prodName	 tinytext NOT NULL,
	   prodCost	 int NOT NULL,
	   prodStock int NOT NULL,
	   prodImage tinytext, 
	PRIMARY KEY (prodID)
);

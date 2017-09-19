-- paste this into command form to init DB
CREATE DATABASE Webshop;
CREATE TABLE Users (
	   uuid	 	 int PRIMARY AUTO_INCREMENT,
	   email     tinytext UNIQUE,
	   firstname tinytext NOT NULL,
	   lastname  tinytext NOT NULL,
	   country	 tinytext NOT NULL,
	   city		 tinytext NOT NULL,
	   zip		 int NOT NULL,
	   address	 tinytext NOT NULL,
	   pwhash	 tinytext NOT NULL
);

CREATE TABLE Products (
	   prodID    int PRIMARY AUTO_INCREMENT,
	   prodName	 tinytext NOT NULL,
	   prodCost	 int NOT NULL,
	   prodStock int NOT NULL,
	   prodImage tinytext
);

-- paste this into command form to init DB
CREATE DATABASE Webshop;
CREATE TABLE Users (
	   uuid	 	 int,
	   email     tinytext,
	   firstname tinytext,
	   lastname  tinytext,
	   country	 tinytext,
	   city		 tinytext,
	   zip		 int,
	   address	 tinytext,
	   pwhash	 tinytext
);

CREATE TABLE Products (
	   prodID    int,
	   prodName	 tinytext,
	   prodCost	 int,
	   prodStock int,
	   prodImage tinytext
);

CREATE DATABASE Webshop;
CREATE TABLE Users (
  uuid	 	int NOT NULL AUTO_INCREMENT,
  email     varchar(100) UNIQUE,
  firstname tinytext NOT NULL,
  lastname  tinytext NOT NULL,
  country	tinytext NOT NULL,
  city		tinytext NOT NULL,
  zip		int NOT NULL,
  address	tinytext NOT NULL,
  pwhash	tinytext NOT NULL,
  failedlogins	int,
  PRIMARY KEY (uuid)
);

CREATE TABLE Products (
  prodID    int NOT NULL AUTO_INCREMENT,
  prodName	tinytext NOT NULL,
  prodCost	int NOT NULL,
  prodStock int NOT NULL,
  prodImage tinytext,
  PRIMARY KEY (prodID)
);

CREATE TABLE PwBlacklist (
    primkey int NOT NULL AUTO_INCREMENT,
  password  varchar(10) NOT NULL,
  PRIMARY KEY (primkey)
  );
  
  INSERT INTO PwBlacklist (password) VALUES 
  ("Password12"), 
 ("passworD12"), 
 ("pASSWORD12"), 
 ("PASSWORd12"), 
 ("Abcdefgh1j"),
 ("ABCDEFGH1j"),
 ("4Bcdefghij"), 
 ("abcd3Fghij"), 
 ("12345678Aa"), 
 ("Aa12345678");

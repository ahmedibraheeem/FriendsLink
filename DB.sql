CREATE DATABASE FriendsLink;

USE FriendsLink;

CREATE TABLE siteUser(
  ID INT auto_increment,
  fName VARCHAR(50) not null,
  lName VARCHAR(50) not null,
  nickname VARCHAR(50) unique,
  password VARCHAR(255) not null,
  email VARCHAR(255) unique not null,
  Gender ENUM("Male", "Female") not null,
  bDay DATE not null,
  martialStatus ENUM("Single", "Engaged", "Married", "In Relationship"),
  hometown VARCHAR(50),
  about VARCHAR(255),
  profilePicture VARCHAR(255),
  PRIMARY KEY(id)
);

CREATE TABLE phoneBook(
  phoneID INT auto_increment,
  userID INT NOT NULL,
  phoneNumber INT NOT NULL,
  PRIMARY KEY(phoneID),
  FOREIGN KEY(userID) REFERENCES siteUser(ID)
);

CREATE TABLE friends(
  userID INT NOT NULL,
  friendID INT NOT NULL,
  PRIMARY KEY(userID, friendID),
  FOREIGN KEY(userID) REFERENCES siteUser(ID),
  FOREIGN KEY(friendID) REFERENCES siteUser(ID)
);

CREATE TABLE friendrequest(
  requesterID INT NOT NULL,
  friendID INT NOT NULL,
  status INT NOT NULL,
  PRIMARY KEY(requesterID, friendID),
  FOREIGN KEY(requesterID) REFERENCES siteUser(ID),
  FOREIGN KEY(friendID) REFERENCES siteUser(ID)
);

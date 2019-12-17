--Group Members : Ryan Simonson, Tristen Anderson, Ibrahim Khan, Kofi Adu Gyan, Dalton Berry

--********************************************Relational Schema******************************************
/*
Primary Keys __ = phoneN, SID, KID, CID
Foreign Keys *  = SID*

{
Clients(phoneN, name)
Songs(SID, title, artist)
Contributors(CID, name)
KaraokeFiles(name, KID, SID*)
}

{
Contributes(CID*,SID*)
Selects(KID*,phoneN*,date/time, amountPaid)

*/
--*************************************************PHP*******************************************************

--USE YOUR OWN ZID!

DROP TABLES Contributes, Contributors, Selects, KaraokeFiles, Songs, Clients;

CREATE TABLE Clients(
phoneNum VARCHAR(15) NOT NULL,
name VARCHAR(30) NOT NULL,
PRIMARY KEY(phoneNum));

CREATE TABLE Contributors(
 name VARCHAR(30) NOT NULL,
 primaryRole VARCHAR(30) NOT NULL,
 CID INT(10) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY(CID));

CREATE TABLE Songs(
 SID INT(10) NOT NULL AUTO_INCREMENT,
 title VARCHAR(30) NOT NULL,
 artist VARCHAR(30) NOT NULL,
 PRIMARY KEY(SID));

CREATE TABLE KaraokeFiles(
 KID INT(10) NOT NULL AUTO_INCREMENT,
 SID INT(10) NOT NULL,
 name VARCHAR(30) NOT NULL,
 PRIMARY KEY(KID),
 FOREIGN KEY(SID) REFERENCES Songs(SID));

CREATE TABLE Contributes(
 CID INT(10) NOT NULL,
 SID INT(10) NOT NULL,
 PRIMARY KEY(CID, SID),
 FOREIGN KEY(CID) REFERENCES Contributors(CID),
 FOREIGN KEY(SID) REFERENCES Songs(SID));

CREATE TABLE Selects(
 KID INT(10) NOT NULL,
 phoneNum VARCHAR(15) NOT NULL,
 dtandtm VARCHAR(20) NOT NULL,
 amountPaid INT(10) NOT NULL,
 PRIMARY KEY(KID, phoneNum),
 FOREIGN KEY(KID) REFERENCES KaraokeFiles(KID),
 FOREIGN KEY(phoneNum) REFERENCES Clients(phoneNum));

--**************************************************DATA****************************************************
begin;
INSERT INTO Songs(title, artist) VALUES ('Rockstar', 'Post Malone');
INSERT INTO Songs(title, artist) VALUES ('Roundabout', 'Yes');
INSERT INTO Songs(title, artist) VALUES ('Congratulations', 'Post Malone');
INSERT INTO Songs(title, artist) VALUES ('Stairway to Heaven', 'Led Zepplin');
INSERT INTO Songs(title, artist) VALUES ('Marvins Room', 'Drake');
INSERT INTO Songs(title, artist) VALUES ('Closed on Sunday', 'Kanye West');
INSERT INTO Songs(title, artist) VALUES ('Californication', 'Red Hot Chili Peppers');
INSERT INTO Songs(title, artist) VALUES ('Alright', 'Logic');
INSERT INTO Songs(title, artist) VALUES ('Toxic', 'Brittany Spears');
INSERT INTO Songs(title, artist) VALUES ('Paranoid Android', 'Radio Head');
INSERT INTO Songs(title, artist) VALUES ('Under the Bridge', 'Red Hot Chili Peppers');
INSERT INTO Songs(title, artist) VALUES ('Ultralight Beam', 'Kanye West');
commit;


begin;
INSERT INTO KaraokeFiles(SID,name) VALUES ('1', 'Rockstar');
INSERT INTO KaraokeFiles(SID,name) VALUES ('1', 'Rockstar (Remix) [Feat Nicky Jam]');
INSERT INTO KaraokeFiles(SID,name) VALUES ('2', 'Roundabout');
INSERT INTO KaraokeFiles(SID,name) VALUES ('3', 'Congratulations');
INSERT INTO KaraokeFiles(SID,name) VALUES ('4', 'Stairway to Heaven');
INSERT INTO KaraokeFiles(SID,name) VALUES ('5', 'Marvins Room');
INSERT INTO KaraokeFiles(SID,name) VALUES ('6', 'Closed on Sunday');
INSERT INTO KaraokeFiles(SID,name) VALUES ('7', 'Californication');
INSERT INTO KaraokeFiles(SID,name) VALUES ('8', 'Alright');
INSERT INTO KaraokeFiles(SID,name) VALUES ('9', 'Toxic');
INSERT INTO KaraokeFiles(SID,name) VALUES ('10', 'Paranoid Android');
INSERT INTO KaraokeFiles(SID,name) VALUES ('11', 'Under the Bridge');
INSERT INTO KaraokeFiles(SID,name) VALUES ('12', 'Ultralight Beam');
commit;

begin;
INSERT INTO Clients(phoneNum, name) VALUES ('(198)967-0098', 'Ronald');
INSERT INTO Clients(phoneNum, name) VALUES ('(777)555-9990', 'Cyrus');
INSERT INTO Clients(phoneNum, name) VALUES ('(321)654-0987', 'Kaitlyn');
INSERT INTO Clients(phoneNum, name) VALUES ('(986)564-1234', 'Laura');
INSERT INTO Clients(phoneNum, name) VALUES ('(876)555-8943', 'Kyle');
INSERT INTO Clients(phoneNum, name) VALUES ('(111)111-1111', 'Dakota');
INSERT INTO Clients(phoneNum, name) VALUES ('(222)222-2222', 'James');
INSERT INTO Clients(phoneNum, name) VALUES ('(333)333-3333', 'Karen');
INSERT INTO Clients(phoneNum, name) VALUES ('(444)444-4444', 'Carter');
INSERT INTO Clients(phoneNum, name) VALUES ('(555)555-5555', 'Optimus');
INSERT INTO Clients(phoneNum, name) VALUES ('(666)666-6666', 'Voldemort');
commit;

begin;
INSERT INTO Contributors(primaryRole, name) VALUES ('Producer', 'Kayne West');
INSERT INTO Contributors(primaryRole, name) VALUES ('Vocals', 'Quavo');
INSERT INTO Contributors(primaryRole, name) VALUES ('Vocals', 'Nicky Jam');
INSERT INTO Contributors(primaryRole, name) VALUES ('Vocals', '21 Savage');
INSERT INTO Contributors(primaryRole, name) VALUES ('Vocals', 'Big Sean');

INSERT INTO Contributors(primaryRole, name) VALUES ('Drummer', 'Chad Smith');
commit;

begin;
INSERT INTO Contributes(CID, SID) VALUES (1,5);
INSERT INTO Contributes(CID, SID) VALUES (2,3);
INSERT INTO Contributes(CID, SID) VALUES (3,1);
INSERT INTO Contributes(CID, SID) VALUES (4,1);
INSERT INTO Contributes(CID, SID) VALUES (5,8);
INSERT INTO Contributes(CID, SID) VALUES (6,11);
INSERT INTO Contributes(CID, SID) VALUES (6,7);

commit;

begin;
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('1','(777)555-9990','11/01/2019 02:13:29', '35');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('4','(222)222-2222','11/03/2019 21:05:08', '3');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('9','(876)555-8943','11/05/2019 00:41:15', '160');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('13','(444)444-4444','11/20/2019 12:25:30', '0');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('3','(777)555-9990','11/20/2019 05:12:10', '80');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('7','(555)555-5555','11/10/2019 06:47:24', '78');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('8','(111)111-1111','11/25/2019 05:30:40', '0');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('6','(333)333-3333','11/11/2019 04:33:45', '182');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('2','(666)666-6666','11/12/2019 03:18:28', '0');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('5','(222)222-2222','11/14/2019 06:38:12', '777');
INSERT INTO Selects(KID, phoneNum, dtandtm, amountPaid) VALUES ('4','(444)444-4444','11/16/2019 22:25:30', '42');
commit;














/*
***********************************************TO DO LIST***********************************************

1. 11/7 (DONE)Create an ER diagram that accurately models the database that will be needed to implement the application. 
2. 11/11 (DONE)Once the ER diagram is done and approved by the professor, convert it into a relational schema (list of tables). Do not continue on to the SQL portion until this is done.
 3. 11/13 Create and run an SQL script that will create the tables from the relational schema in the step above. 
4. 11/13Think up some sample data and insert it into your SQL tables. You should have enough where you can effectively test the application as you develop it.
 5. 11/18 - 12/4 Implement the web application using PHP. The following must be present, at a minimum:
 • a page that allows a user to specify an artist, song title, or contributor to search for 
• a page that shows the songs that match the criteria from the above page. Make sure to show all of the versions of each song found. The user should be able to choose a version of the song and enter into either of the queues. If he or she chooses the accelerated queue, find out from the user somehow how much they are willing to pay. 
• a page that shows the queues for the DJ. Using this page, the DJ should also be able to flag songs as already played once he has called the users up to perform. The already-performed songs will no longer show in the queue, but will remain present in the database. 
*/
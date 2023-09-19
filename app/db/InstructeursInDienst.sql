-- Active: 1663583610500@@127.0.0.1@3306@instructeursindienst
DROP DATABASE IF EXISTS `InstructeursInDienst`;
CREATE DATABASE IF NOT EXISTS `InstructeursInDienst`;
Use `InstructeursInDienst`;

DROP TABLE IF EXISTS TypeVoertuig;
CREATE TABLE IF NOT EXISTS TypeVoertuig(
Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
TypeVoertuig VARCHAR(200) NOT NULL,
Rijbewijscategorie VARCHAR(10) NOT NULL,
IsActief BIT NOT NULL DEFAULT 1,
Opmerkingen VARCHAR(250) NULL DEFAULT NULL,
DatumAangemaakt DateTime(6) NOT NULL,
DatumGewijzigd DateTime(6) NOT NULL)
ENGINE = InnoDB;

INSERT INTO TypeVoertuig VALUES 
(NULL, 'Personenauto', 'B', 1, NULL, sysdate(6), sysdate(6)), 
(NULL, 'Vrachtwagen', 'C', 1, NULL, sysdate(6), sysdate(6)), 
(NULL, 'Bus', 'D', 1, NULL, sysdate(6), sysdate(6)), 
(NULL, 'Bromfiets', 'AM', 1, NULL, sysdate(6), sysdate(6));

DROP TABLE IF EXISTS Instructeur;
CREATE TABLE IF NOT EXISTS Instructeur(
Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Voornaam VARCHAR(200) NOT NULL,
Tussenvoegsel VARCHAR(200),
Achternaam VARCHAR(200) NOT NULL,
Mobiel VARCHAR(11) NOT NULL,
DatumInDienst DATE NOT NULL,
AantalSterren VARCHAR(5),
IsActief BIT NOT NULL DEFAULT 1,
Opmerkingen VARCHAR(250) NULL DEFAULT NULL,
DatumAangemaakt DateTime(6) NOT NULL,
DatumGewijzigd DateTime(6) NOT NULL)
ENGINE = InnoDB;

INSERT INTO Instructeur VALUES
(NULL, 'Li', NULL, 'Zhan', '06-28493827', '2015-04-17', '***', 1, NULL, sysdate(6), sysdate(6)),
(NULL, 'Leroy', NULL, 'Boerhaven', '06-39398734', '2018-06-25', '*', 1, NULL, sysdate(6), sysdate(6)),
(NULL, 'Youri', 'Van', 'Veen', '06-24383291', '2010-05-12', '***', 1, NULL, sysdate(6), sysdate(6)),
(NULL, 'Bert', 'Van', 'Sali', '06-48293823', '2023-01-10', '****', 1, NULL, sysdate(6), sysdate(6)),
(NULL, 'Mohammed', 'El', 'Yassidi', '06-34291234', '2010-06-14', '*****', 1, NULL, sysdate(6), sysdate(6));

DROP TABLE IF EXISTS Voertuig;
CREATE TABLE IF NOT EXISTS Voertuig(
Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Kenteken VARCHAR(8) NOT NULL,
Type VARCHAR(50) NOT NULL,
Bouwjaar DATE NOT NULL,
Brandstof VARCHAR(10) NOT NULL,
TypeVoertuigId INT NOT NULL,
IsActief BIT NOT NULL DEFAULT 1,
Opmerkingen VARCHAR(250) NULL DEFAULT NULL,
DatumAangemaakt DateTime(6) NOT NULL,
DatumGewijzigd DateTime(6) NOT NULL,
FOREIGN KEY (TypeVoertuigId) REFERENCES TypeVoertuig(Id))
ENGINE = InnoDB;

INSERT INTO Voertuig VALUES
(1, 'AU-67-IO', 'Golf', '2017-06-12', 'Diesel', 1, '1', NULL, sysdate(6), sysdate(6)),
(2, 'TR-24-OP', 'DAF', '2019-05-23', 'Diesel', 2, '1', NULL, sysdate(6), sysdate(6)),
(3, 'TH-78-KL', 'Mercedes', '2023-01-01', 'Benzine', 1, '1', NULL, sysdate(6), sysdate(6)),
(4, '90-KL-TR', 'Fiat 500', '2021-09-12', 'Benzine', 1, '1', NULL, sysdate(6), sysdate(6)),
(5, '34-TK-LP', 'Scania', '2015-03-13', 'Diesel', 2, '1', NULL, sysdate(6), sysdate(6)),
(6, 'YY-OP-78', 'BMW M5', '2022-05-13', 'Diesel', 1, '1', NULL, sysdate(6), sysdate(6)),
(7, 'UU-HH-JK', 'M.A.N', '2017-12-03', 'Diesel', 2, '1', NULL, sysdate(6), sysdate(6)),
(8, 'ST-FZ-28', 'Citroën', '2018-01-20', 'Elektrisch', 1, '1', NULL, sysdate(6), sysdate(6)),
(9, '123-FR-T', 'Piaggio ZIP', '2021-02-01', 'Benzine', 4, '1', NULL, sysdate(6), sysdate(6)),
(10, 'DRS-52-P', 'Vespa', '2022-03-21', 'Benzine', 4, '1', NULL, sysdate(6), sysdate(6)),
(11, 'STP-12-U', 'Kymco', '2022-07-02', 'Benzine', 4, '1', NULL, sysdate(6), sysdate(6)),
(12, '45-SD-23', 'Renault', '2023-01-01', 'Diesel', 3, '1', NULL, sysdate(6), sysdate(6));

DROP TABLE IF EXISTS VoertuigInstructeur;
CREATE TABLE IF NOT EXISTS VoertuigInstructeur(
Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
VoertuigId INT NOT NULL,
InstructeurId INT NOT NULL,
DatumToekenning DATE NOT NULL,
IsActief BIT NOT NULL DEFAULT 1,
Opmerkingen VARCHAR(250) NULL DEFAULT NULL,
DatumAangemaakt DateTime(6) NOT NULL,
DatumGewijzigd DateTime(6) NOT NULL,
FOREIGN KEY (VoertuigId) REFERENCES Voertuig(Id),
FOREIGN KEY (InstructeurId) REFERENCES Instructeur(Id))
ENGINE = InnoDB;

INSERT INTO VoertuigInstructeur VALUES
(NULL, 1, 5, '2017-06-18', '1', NULL, sysdate(6), sysdate(6)),
(NULL, 3, 1, '2021-09-26', '1', NULL, sysdate(6), sysdate(6)),
(NULL, 9, 1, '2021-09-27', '1', NULL, sysdate(6), sysdate(6)),
(NULL, 3, 4, '2022-08-01', '1', NULL, sysdate(6), sysdate(6)),
(NULL, 5, 1, '2019-08-30', '1', NULL, sysdate(6), sysdate(6)),
(NULL, 10, 5, '2020-02-02', '1', NULL, sysdate(6), sysdate(6));

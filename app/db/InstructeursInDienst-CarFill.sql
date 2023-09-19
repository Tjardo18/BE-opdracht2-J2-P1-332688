-- ALLE AUTO'S INZETTEN

USE instructeursindienst;

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

INSERT INTO VoertuigInstructeur VALUES 
(NULL, 2, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6)),
(NULL, 4, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6)),
(NULL, 6, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6)),
(NULL, 7, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6)),
(NULL, 8, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6)),
(NULL, 11, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6)),
(NULL, 12, 1, '2023-04-14', 1, NULL, SYSDATE(6), SYSDATE(6));
<?php

class AlleVoertuigenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getVoertuigen()
    {
        $sql = "SELECT V.Id AS VoertuigID,
                       TV.TypeVoertuig,
                       V.Type,
                       V.Kenteken,
                       V.Bouwjaar,
                       V.Brandstof,
                       TV.Rijbewijscategorie,
                       CONCAT_WS(
                            ' ',
                            I.Voornaam,
                            I.Tussenvoegsel,
                            I.Achternaam
                        ) AS InstructeurNaam
                FROM Voertuig V
                JOIN TypeVoertuig TV ON V.TypeVoertuigId = TV.Id
                LEFT JOIN VoertuigInstructeur VI ON V.Id = VI.VoertuigId
                LEFT JOIN Instructeur I ON VI.InstructeurId = I.Id
                WHERE VI.InstructeurId IS NOT NULL OR VI.InstructeurId IS NULL
                ORDER BY V.Id;";

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}

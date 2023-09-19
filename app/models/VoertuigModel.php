<?php

class VoertuigModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getVoertuigen($Id)
    {
        $sql = "SELECT 
                    Instructeur.Id AS InstructeurID,
                    Voertuig.Id AS VoertuigID
                    ,TypeVoertuig.TypeVoertuig
                    ,Voertuig.Type
                    ,Voertuig.Kenteken
                    ,Voertuig.Bouwjaar
                    ,Voertuig.Brandstof
                    ,TypeVoertuig.Rijbewijscategorie
        FROM VoertuigInstructeur
        INNER JOIN Voertuig ON Voertuig.Id = VoertuigInstructeur.VoertuigId
        INNER JOIN Instructeur ON Instructeur.Id = VoertuigInstructeur.InstructeurId
        INNER JOIN TypeVoertuig ON TypeVoertuig.Id = Voertuig.TypeVoertuigId
        WHERE Instructeur.Id = $Id
        ORDER BY TypeVoertuig.Rijbewijscategorie;";

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function getInstructeur($Id)
    {
        $sql = "SELECT 
                    Voornaam
                    ,Tussenvoegsel
                    ,Achternaam
                    ,DatumInDienst
                    ,AantalSterren
        FROM Instructeur
        WHERE Id = $Id;";

        $this->db->query($sql);

        return $this->db->resultSetAssoc();
    }
}

<?php

class ToewijzenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNietToegewezen()
    {
        $sql = "SELECT 
                        Voertuig.Id AS VoertuigID
                        ,TypeVoertuig.TypeVoertuig
                        ,Voertuig.Type
                        ,Voertuig.Kenteken
                        ,Voertuig.Bouwjaar
                        ,Voertuig.Brandstof
                        ,TypeVoertuig.Rijbewijscategorie
        FROM Voertuig
        LEFT JOIN VoertuigInstructeur ON Voertuig.Id = VoertuigInstructeur.VoertuigId
        INNER JOIN TypeVoertuig ON TypeVoertuig.Id = Voertuig.TypeVoertuigId
        WHERE VoertuigInstructeur.VoertuigId IS NULL
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

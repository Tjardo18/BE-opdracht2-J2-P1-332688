<?php

class WijzigenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getVoertuig($Id)
    {
        $sql = "SELECT VoertuigId
		                ,InstructeurId
                        ,Voertuig.TypeVoertuigId
                        ,Voertuig.Type
                        ,Voertuig.Bouwjaar
                        ,Voertuig.Brandstof
                        ,Voertuig.Kenteken
                FROM VoertuigInstructeur
                INNER JOIN Instructeur ON Instructeur.Id = VoertuigInstructeur.InstructeurId
                INNER JOIN Voertuig ON Voertuig.Id = VoertuigInstructeur.VoertuigId
                WHERE VoertuigId = $Id;";

        $this->db->query($sql);

        return $this->db->resultSetAssoc();
    }

    public function getVoertuigen($Id)
    {
        $sql = "SELECT Id
                        ,TypeVoertuigId
                        ,Type
                        ,Bouwjaar
                        ,Brandstof
                        ,Kenteken
                FROM Voertuig
                WHERE Id = $Id;";

        $this->db->query($sql);

        return $this->db->resultSetAssoc();
    }
}

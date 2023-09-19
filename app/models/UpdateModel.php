<?php

class UpdateModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function wijzigen($VoertuigId, $InstructeurId, $typeVoertuig, $autoMerk, $bouwjaar, $brandstof, $kenteken)
    {

        $test = "SELECT * FROM VoertuigInstructeur
                WHERE VoertuigId = $VoertuigId;";
        $this->db->query($test);
        if ($this->db->resultSetAssoc() == NULL) {
            $sql = "UPDATE Voertuig
                SET TypeVoertuigId = $typeVoertuig,
                    Type = '$autoMerk',
                    Bouwjaar = '$bouwjaar',
                    Brandstof = '$brandstof',
                    Kenteken = '$kenteken',
                    DatumGewijzigd = sysdate(6)
                WHERE Id = $VoertuigId;


                INSERT INTO VoertuigInstructeur VALUES
                (NULL, $VoertuigId, $InstructeurId, sysdate(3), '1', NULL, sysdate(6), sysdate(6));";
            $this->db->query($sql);

            header("refresh:2;../../voertuig/id/$InstructeurId");

            return $this->db->execute();
        } else {

            $sql = "UPDATE Voertuig
                SET TypeVoertuigId = $typeVoertuig,
                    Type = '$autoMerk',
                    Bouwjaar = '$bouwjaar',
                    Brandstof = '$brandstof',
                    Kenteken = '$kenteken',
                    DatumGewijzigd = sysdate(6)
                WHERE Id = $VoertuigId;
        
                UPDATE VoertuigInstructeur
                SET InstructeurId = $InstructeurId,
                    DatumGewijzigd = sysdate(6)
                WHERE VoertuigId = $VoertuigId;";
            $this->db->query($sql);

            header("refresh:2;../../voertuig/id/$InstructeurId");

            return $this->db->execute();
        }
    }
}

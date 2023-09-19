<?php

class CreateModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function toewijzen($VoertuigId, $InstructeurId)
    {
        $sql = "INSERT INTO VoertuigInstructeur VALUES (NULL, $VoertuigId, $InstructeurId, sysdate(), 1, NULL, sysdate(6), sysdate(6));";
        $this->db->query($sql);

        header("refresh:2;../../voertuig/id/$InstructeurId");

        return $this->db->execute();
    }
}

<?php

class DeleteModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function delete($VoertuigId, $InstructeurId, $CaseId)
    {
        if (!$InstructeurId) {
            $sql = "DELETE FROM voertuig WHERE Id = $VoertuigId;";
            $this->db->query($sql);

            header("refresh:3;../../allevoertuigen");

            return $this->db->execute();
        } else {
            if ($CaseId == 1) {
                $sql = "DELETE FROM VoertuigInstructeur WHERE VoertuigId = $VoertuigId;";
                $this->db->query($sql);

                header("refresh:3;../../voertuig/id/$InstructeurId");

                return $this->db->execute();
            } else {
                $sql = "DELETE FROM VoertuigInstructeur WHERE VoertuigId = $VoertuigId;
                        DELETE FROM voertuig WHERE Id = $VoertuigId;";
                $this->db->query($sql);

                header("refresh:3;../../allevoertuigen");

                return $this->db->execute();
            }
        }
    }
}

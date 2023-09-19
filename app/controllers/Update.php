<?php

class Update extends BaseController
{
    private $updateModel;

    public function __construct()
    {
        $this->updateModel = $this->model('UpdateModel');
    }

    public function index()
    {

        $VoertuigId = $_POST['voertuig'];
        $InstructeurId = $_POST['instructeur'];
        $typeVoertuig = $_POST['typeVoertuig'];
        $autoMerk = $_POST['autoMerk'];
        $bouwjaar = $_POST['bouwjaar'];
        $brandstof = $_POST['brandstof'];
        $kenteken = $_POST['kenteken'];

        $this->updateModel->wijzigen($VoertuigId, $InstructeurId, $typeVoertuig, $autoMerk, $bouwjaar, $brandstof, $kenteken);

        $data = [
            'title' => 'Voertuig is gewijzigd'
        ];

        $this->view('update/update', $data);
    }
}

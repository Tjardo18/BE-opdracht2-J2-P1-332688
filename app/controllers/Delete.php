<?php

class Delete extends BaseController
{
    private $deleteModel;

    public function __construct()
    {
        $this->deleteModel = $this->model('DeleteModel');
    }

    public function index()
    {
        $VoertuigId = $_GET['voertuig'];
        $InstructeurId = $_GET['instructeur'];
        $CaseId = $_GET['case'];

        $this->deleteModel->delete($VoertuigId, $InstructeurId, $CaseId);

        $data = [
            'title' => 'Het door u geselecteerde voertuig is verwijderd'
        ];

        $this->view('delete/delete', $data);
    }
}

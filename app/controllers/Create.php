<?php

class Create extends BaseController
{
    private $createModel;

    public function __construct()
    {
        $this->createModel = $this->model('CreateModel');
    }

    public function index()
    {

        $VoertuigId = $_GET['voertuig'];
        $InstructeurId = $_GET['instructeur'];

        $this->createModel->toewijzen($VoertuigId, $InstructeurId);

        $data = [
            'title' => 'Voertuig is toegevoegd'
        ];

        $this->view('create/create', $data);
    }
}

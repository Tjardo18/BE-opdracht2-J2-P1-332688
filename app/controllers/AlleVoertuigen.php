<?php

class AlleVoertuigen extends BaseController
{
    private $alleVoertuigenModel;

    public function __construct()
    {
        $this->alleVoertuigenModel = $this->model('AlleVoertuigenModel');
    }

    public function index()
    {
        $result = $this->alleVoertuigenModel->getVoertuigen();

        if ($result == null) {
            $th = "";
            $rows = "<h2>Er zijn geen voertuigen beschikbaar op dit moment.</h2>";
        } else {
            $th = "<th>Type Voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
            <th>Instructeur naam</th>
            <th>Verwijderen</th>";

            $result = $this->alleVoertuigenModel->getVoertuigen();
            $rows = "";
            foreach ($result as $voertuig) {
                $rows .= "<tr>
                <td>$voertuig->TypeVoertuig</td>
                <td>$voertuig->Type</td>
                <td>$voertuig->Kenteken</td>
                <td>$voertuig->Bouwjaar</td>
                <td>$voertuig->Brandstof</td>
                <td>$voertuig->Rijbewijscategorie</td>
                <td>$voertuig->InstructeurNaam</td>
                <td>
                    <a href='../../delete/id/$voertuig->VoertuigID'>
                        <i class='bx bxs-trash' style='color:#ff0000'></i>
                    </a>
                </td>
                </tr>";
            }
        }

        $data = [
            'title' => 'Alle Voertuigen',
            'rows' => $rows,
            'th' => $th
        ];

        $this->view('allevoertuigen/allevoertuigen', $data);
    }
}

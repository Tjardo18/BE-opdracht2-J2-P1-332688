<?php

class Toewijzen extends BaseController
{
    private $toewijzenModel;

    public function __construct()
    {
        $this->toewijzenModel = $this->model('ToewijzenModel');
    }

    public function index($id = NULL)
    {
        $result = $this->toewijzenModel->getNietToegewezen();
        $instructeur = $this->toewijzenModel->getInstructeur($id);

        if ($result == null) {
            $th = "";
            $rows = "<h2>Er zijn geen voertuigen meer om toe te voegen</h2>";
            header("refresh:3;../../voertuig/id/$id");
        } else {
            $th = "<th>Type Voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
            <th>Toewijzen</th>
            <th>Wijzigen</th>";

            $result = $this->toewijzenModel->getNietToegewezen();
            $rows = "";
            foreach ($result as $toewijzen) {
                $voertuig = $toewijzen->VoertuigID;

                $rows .= "<tr>
                <td>$toewijzen->TypeVoertuig</td>
                <td>$toewijzen->Type</td>
                <td>$toewijzen->Kenteken</td>
                <td>$toewijzen->Bouwjaar</td>
                <td>$toewijzen->Brandstof</td>
                <td>$toewijzen->Rijbewijscategorie</td>
                <td>
                    <a href='../../create/id/$voertuig?voertuig=$voertuig&instructeur=$id'>
                        <i class='bx bx-plus-medical' style='color:#29fd53'></i>
                    </a>
                </td>
                <td>
                    <a href='../../wijzigen/id/$voertuig'>
                        <i class='bx bxs-pencil' style='color:#29fd53'></i>
                    </a>
                </td>
                </tr>";
            }
        }


        $data = [
            'title' => 'Alle beschikbare voertuigen',
            'rows' => $rows,
            'fullName' => $instructeur['Voornaam'] . ' ' . $instructeur['Tussenvoegsel'] . ' ' . $instructeur['Achternaam'],
            'did' => $instructeur['DatumInDienst'],
            'TotalStars' => $instructeur['AantalSterren'],
            'th' => $th
        ];

        $this->view('toewijzen/toewijzen', $data);
    }
}

<?php

class Voertuig extends BaseController
{
    private $voertuigModel;

    public function __construct()
    {
        $this->voertuigModel = $this->model('VoertuigModel');
    }

    public function index($id = NULL)
    {
        $result = $this->voertuigModel->getVoertuigen($id);
        $instructeur = $this->voertuigModel->getInstructeur($id);

        if ($result == null) {
            $th = "";
            $rows = "<h2>Er zijn op dit moment nog geen voertuigen toegewezen aan deze instructeur.</h2>";
        } else {
            $th = "<th>Type Voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
            <th>Wijzigen</th>
            <th>Verwijderen</th>";

            $result = $this->voertuigModel->getVoertuigen($id);
            $rows = "";
            foreach ($result as $voertuig) {
                $voertuigen = $voertuig->VoertuigID;
                $instructeurId = $voertuig->InstructeurID;
                $rows .= "<tr>
                <td>$voertuig->TypeVoertuig</td>
                <td>$voertuig->Type</td>
                <td>$voertuig->Kenteken</td>
                <td>$voertuig->Bouwjaar</td>
                <td>$voertuig->Brandstof</td>
                <td>$voertuig->Rijbewijscategorie</td>
                <td>
                    <a href='../../wijzigen/id/$voertuig->VoertuigID'>
                        <i class='bx bxs-pencil' style='color:#29fd53'></i>
                    </a>
                </td>
                <td>
                    <a href='../../delete/id/$voertuigen?voertuig=$voertuigen&instructeur=$instructeurId&case=1'>
                        <i class='bx bxs-trash' style='color:#ff0000'></i>
                    </a>
                </td>
                </tr>";
            }
        }

        $data = [
            'title' => 'Door instructeur gebruikte voertuigen',
            'rows' => $rows,
            'fullName' => $instructeur['Voornaam'] . ' ' . $instructeur['Tussenvoegsel'] . ' ' . $instructeur['Achternaam'],
            'did' => $instructeur['DatumInDienst'],
            'TotalStars' => $instructeur['AantalSterren'],
            'th' => $th,
            'id' => $id
        ];

        $this->view('voertuig/voertuig', $data);
    }
}

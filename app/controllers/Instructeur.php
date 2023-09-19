<?php

class Instructeur extends BaseController
{
    private $instructeurModel;

    public function __construct()
    {
        $this->instructeurModel = $this->model('InstructeurModel');
    }

    public function index()
    {
        $result = $this->instructeurModel->getInstructeurs();
        $TotalInstructeurs = $this->instructeurModel->countInstructeurs();

        $rows = "";
        foreach ($result as $instructeur) {
            $rows .= "<tr>
                        <td>$instructeur->Voornaam</td>
                        <td>$instructeur->Tussenvoegsel</td>
                        <td>$instructeur->Achternaam</td>
                        <td>$instructeur->Mobiel</td>
                        <td>$instructeur->DatumInDienst</td>
                        <td>$instructeur->AantalSterren</td>
                        <td>
                            <a href='voertuig/id/{$instructeur->Id}'>
                                <i class='bx bxs-car' style='color:#29fd53'></i>
                            </a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => 'Instructeurs in dienst',
            'rows' => $rows,
            'TotalInstr' => $TotalInstructeurs['Total']
        ];

        $this->view('instructeur/instructeur', $data);
    }
}

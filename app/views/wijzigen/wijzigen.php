<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Wijzigen</title>
</head>

<body>

    <header>
        <a href="<?= URLROOT; ?>" class="logo">
            <i class="ri-home-3-fill"></i>
            <span>TJARDO</span>
        </a>

        <ul class="navbar">
            <li><a href="<?= URLROOT; ?>">Home</a></li>
            <li><a href="<?= URLROOT; ?>/instructeur" class="active">Instructeurs</a></li>
        </ul>

        <div class="main">
            <a href="#" class="user">
                <i class="ri-user-fill"></i>
                Sign In
            </a>
            <a href="#">Register</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <div class="container">
        <div class="circle"></div>
        <div class="circle"></div>

        <h1>
            <?= $data['title']; ?>
        </h1>

        <div class="card">
            <div class="ruimte">
                <form action="../../update" method="post">
                    <div class="inputVeld">
                        <label for="instructeur">
                            Instructeur:
                            <select name="instructeur" id="instructeur">
                                <option hidden>Kies een Instructeur</option>
                                <option value="1">Li Zhan</option>
                                <option value="2">Leroy Boerhaven</option>
                                <option value="3">Youri van Veen</option>
                                <option value="4">Bert van Sali</option>
                                <option value="5">Mohammed El Yassidi</option>
                            </select>
                        </label>
                    </div>

                    <div class="inputVeld">
                        <label for="typeVoertuig">
                            Type Voertuig:
                            <select name="typeVoertuig" id="typeVoertuig" required>
                                <option value="1">Personenauto</option>
                                <option value="2">Vrachtwagen</option>
                                <option value="3">Bus</option>
                                <option value="4">Bromfiets</option>
                            </select>
                        </label>
                    </div>

                    <div class="inputVeld">
                        <label for="autoMerk">
                            Type:
                            <input type="text" name="autoMerk" id="autoMerk" value="<?= $data['autoMerk']; ?>" required>
                        </label>
                    </div>

                    <div class="inputVeld">
                        <label for="bouwjaar">
                            Bouwjaar:
                            <input type="date" name="bouwjaar" id="bouwjaar" required="" value="<?= $data['bouwjaar'] ?>" readonly>
                        </label>
                    </div>

                    <div class="inputVeld">
                        <label for="brandstof">
                            Brandstof:
                        </label>
                        <input type="radio" id="brandstof" name="brandstof" value="Diesel">
                        <label for="Diesel">Diesel</label>

                        <input type="radio" id="brandstof" name="brandstof" value="Benzine">
                        <label for="Benzine">Benzine</label>

                        <input type="radio" id="brandstof" name="brandstof" value="Elektrisch">
                        <label for="Elektrisch">Elektrisch</label>
                    </div>

                    <div class="inputVeld">
                        <label for="kenteken">
                            Kenteken:
                        </label>

                        <input type="text" name="kenteken" id="kenteken" value="<?= $data['kenteken']; ?>" required>
                    </div>
                    <input type="hidden" name="voertuig" id="voertuig" value="<?= $data['id'] ?>">
                    <div class="button">
                        <button>Wijzigen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const instructeur = document.getElementById("instructeur");
        const instructeurId = "<?= $data['instructeur']; ?>";

        for (let i = 0; i < instructeur.options.length; i++) {
            if (instructeur.options[i].value === instructeurId) {
                instructeur.options[i].selected = true;
                break;
            }
        }

        const typeVoertuig = document.getElementById("typeVoertuig");
        const typeVoertuigId = "<?= $data['typeVoertuig']; ?>";

        for (let i = 0; i < typeVoertuig.options.length; i++) {
            if (typeVoertuig.options[i].value === typeVoertuigId) {
                typeVoertuig.options[i].selected = true;
                break;
            }
        }

        const radioButtons = document.getElementsByName("brandstof");
        const desiredValue = "<?= $data['brandstof']; ?>";

        for (let i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].value === desiredValue) {
                radioButtons[i].checked = true;
                break;
            }
        }
    </script>

    <script src="<?= URLROOT; ?>/js/nav.js"></script>

</body>

</html>
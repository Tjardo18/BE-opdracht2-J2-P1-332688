<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Voertuigen</title>
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
        <h3>
            Naam: <?= $data['fullName']; ?>
        </h3>
        <h3>
            Datum in dienst: <?= $data['did']; ?>
        </h3>
        <h3>
            Aantal sterren: <?= $data['TotalStars']; ?>
        </h3>

        <div class="card voertuig">
            <div class="ruimte">
                <table>
                    <thead>
                        <?= $data['th']; ?>
                    </thead>
                    <tbody>
                        <?= $data['rows']; ?>
                    </tbody>
                </table>
                <div class="button">
                    <a href="../../toewijzen/id/<?= $data['id']; ?>">
                        <button>Voertuig toevoegen</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= URLROOT; ?>/js/nav.js"></script>

</body>

</html>
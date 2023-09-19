<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Home</title>
</head>

<body>

    <header>
        <a href="<?= URLROOT; ?>" class="logo">
            <i class="ri-home-3-fill"></i>
            <span>TJARDO</span>
        </a>

        <ul class="navbar">
            <li><a href="<?= URLROOT; ?>" class="active">Home</a></li>
            <li><a href="<?= URLROOT; ?>/instructeur">Instructeurs</a></li>
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

    <h2><?= $data['title']; ?></h2>

    <table border="1">
        <thead>
            <th>Id</th>
            <th>Naam</th>
        </thead>
        <tbody>
            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['name']; ?></td>
            </tr>
        </tbody>
    </table>

    <script src="<?= URLROOT; ?>/js/nav.js"></script>
</body>

</html>
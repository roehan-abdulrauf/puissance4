<?php
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/puissance4.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <script src="../public/js/script.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <title>Puissance 4</title>
</head>

<body>

    <!-- <?php require('header.php'); ?> -->

    <nav>
        <?php if (isset($_SESSION['user'])) { ?>

            <div class="navbar">
                <ul>
                    <a href="puissance4.php">
                        <li>Puissance 4</li>
                    </a>
                    <a href="classement.php">
                        <li>Classement</li>
                    </a>
                    <a href="disconnect.php">
                        <li>Deconnexion</li>
                    </a>
                </ul>
            </div>

        <?php } ?>
    </nav>



    <main>

        <div id="rejouer">

        </div>


        <?php if (Security::isConnect()) { ?>

            <div id="board"></div>

        <?php } else { ?>

            <a class="aerreur" href="../index.php">
                <h1 class="h1erreur">Accueil</h1>
            </a>
            <h2 class="h2erreur">Veuillez vous connecter avant de jouer !</h2>

        <?php
        } ?>
        <br>
    </main>

    <!-- <?php require_once 'footer.php'; ?> -->

</body>

</html>
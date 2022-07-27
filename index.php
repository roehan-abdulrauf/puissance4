<?php

require_once(__DIR__ . '/controller/User.php');
require_once(__DIR__ . '/controller/Toolbox.php');
require_once(__DIR__ . '/controller/Security.php');

session_start();

if (isset($_POST['connection'])) {
    if (!empty($_POST['loginC']) && !empty($_POST['passwordC'])) {
        $user = new User();
        $user->connection($_POST['loginC'], $_POST['passwordC']);
    } else {
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

if (isset($_POST['register'])) {
    if (!empty($_POST['loginR']) && !empty($_POST['passwordR']) && !empty($_POST['conf-password'])) {
        if ($_POST['passwordR'] == $_POST['conf-password']) {
            $user = new User();
            $user->register($_POST['loginR'], $_POST['passwordR']);
        } else {
            Toolbox::addMessageAlert("Mots de passe non identiques", Toolbox::RED_COLOR);
        }
    } else {
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="public/css/root.css" />
    <title>Accueil</title>
</head>

<body>
    <!-- <?php require('view/header.php'); ?> -->
    <main>
        <?php require('view/errors.php'); ?>
        <div class="container">
            <?php if (!Security::isConnect()) { ?>
                <div class="container-fieldset">
                    <div class="main">
                        <h1>Puissance 4</h1>
                        <input type="checkbox" id="chk" aria-hidden="true">
                        <div class="signup">
                            <form method="POST">
                                <label for="chk" aria-hidden="true">Créer un compte</label>
                                <input type="text" name="loginR" placeholder="Identifiant" required="">
                                <input type="password" name="passwordR" placeholder="Mot de passe" required="">
                                <input type="password" name="conf-password" placeholder="Confirmer le mot de passe" required="">
                                <button name="register">Créer un compte</button>
                            </form>
                        </div>

                        <div class="login">
                            <form method="POST">
                                <label for="chk" aria-hidden="true">Connectez-vous</label>
                                <input type="text" name="loginC" placeholder="Identifiant" required="">
                                <input type="password" name="passwordC" placeholder="Mot de passe" required="">
                                <button name="connection">Connectez-vous</button>
                            </form>
                        </div>
                    </div>
                <?php } else { ?>
                    <h1>

                    </h1>
                <?php } ?>
                </div>
    </main>
    <!-- <?php require_once(__DIR__ . '/view/footer.php'); ?> -->
</body>

</html>
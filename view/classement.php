<?php
require_once(__DIR__ . '/../controller/Stats.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');
// require_once('header.php'); 

session_start();

$stats = New Stats();
$classement = $stats->classement();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/classement.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <title>Classement</title>
</head>
<body>
    
<nav>
        <?php if(isset($_SESSION['user'])){?>

            <div class="navbar">
                <ul class>
                    <a href="puissance4.php"><li>Puissance 4</li></a>
                    <a href="classement.php"><li>Classement</li></a>
                    <a href="disconnect.php"><li>Deconnexion</li></a>
                </ul>
            </div>
            
        <?php } ?>
    </nav>
    
    <main>
        <div class="container">
            <table>
                <tr>
                    <th>Joueur</th>
                    <th>Parties jouées</th>
                    <th>Parties gagnées</th>
                </tr>
                <?php foreach($classement as $c){
                    if($c['played'] > 0){ ?>
                <tr>
                    <td><?php echo $c['login'] ?></td>
                    <td><?php echo $c['played'] ?></td>
                    <td><?php echo $c['won'] ?></td>
                </tr>
                <?php }} ?>
            </table>
        </div>
    </main>
    <!-- <?php require_once 'footer.php'; ?> -->
</body>
</html>
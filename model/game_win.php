<?php

require_once(__DIR__ . '/../database/DB.php');
require_once(__DIR__.'/Stats_model.php');

session_start();

$id_user = $_SESSION['user']['id'];
$results = Stats_model::info_stats($id_user);

$played = $results['game_played'] + 1;
$won = $results['game_won'] + 1;

$req = "UPDATE stats SET game_played = :played, game_won = :won WHERE id_user = :id_user";
$stmt = Database::connect_db()->prepare($req);
$stmt->execute(array(
    ':id_user' => $id_user,
    ':played' => $played,
    ':won' => $won
));

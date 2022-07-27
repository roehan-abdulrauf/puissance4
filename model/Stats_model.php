<?php
require_once(__DIR__ . '/../database/DB.php');
require_once(__DIR__ . '/../controller/Security.php');

class Stats_model{

    public static function create_profil($id_user){
        $played = 0;
        $won = 0;
        $req = "INSERT INTO stats (id_user, game_played, game_won) VALUES (:id_user, :played, :won)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user,
            ":played" => $played,
            ":won" => $won
        ));
    }

    public static function info_stats($id_user){
        $req = "SELECT * FROM stats WHERE id_user = :id_user";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public function sql_classement(){
        $req = "SELECT u.login AS login, s.game_played AS played, s.game_won AS won FROM stats s INNER JOIN users u WHERE u.id = s.id_user ORDER BY s.game_won DESC, s.game_played ASC LIMIT 5";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }
}
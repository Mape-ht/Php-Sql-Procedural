<?php

function getConnexion()
{

    $host = "localhost";
    $dbname = "bpmape_gr2";
    $user = "root";
    $psw = "";
    $dsn = "mysql: host=".$host.";dbname=".$dbname;
    $db = null;
    try {
        $db=new PDO($dsn,$user,$psw);

    } catch (PDOException $e) {
        //throw $th;
        echo "erreur de connexion";

    }
    return $db;
}
//sortir la list des clients entreprise au niveau de employeur
function listClientMoral($connexion){

    $requet = "SELECT * FROM `client_moral`";

   return $connexion->query($requet);
}





//==================end functions================================//
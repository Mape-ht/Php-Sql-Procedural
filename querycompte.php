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


//select type compte 
function getAll($connexion){

    $request= "SELECT * FROM `type_compte`";
    return $connexion->query($request)->fetchAll();
    
}

//select type frais bancaire
function getAllfraisB($connexion){

    $request= "SELECT * FROM `type_frais`";
    return $connexion->query($request)->fetchAll();
    
}

//==================end functions================================//
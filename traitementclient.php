<?php
function getConnexion()
{

    $host = "localhost";
    $dbname = "bpmape_gr2";
    $user = "root";
    $psw = "";
    $dsn = "mysql: host=" . $host . ";dbname=" . $dbname;
    $db = null;
    try {
        $db = new PDO($dsn, $user, $psw);
    } catch (PDOException $e) {
        //throw $th;
        echo "erreur de connexion";
    }
    return $db;
}
//===================model functions==================================//
//add client entreprise
function addClientMoral($connexion)
{
    $requet = "INSERT INTO `client_moral`(`id`, `raison_social`, `nom`,    `adresse`, `ninea`, `telephone`, `email`, `login`, `password`)
     VALUES (null,?,?,?,?,null,null,null,null)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array(
        $_POST["raisonSo"],
        $_POST["nomsEmployeur"], $_POST["adresseEmploi"], $_POST["numIdEmployeur"]
    ));

    return $connexion->lastInsertId();
}

//add client particulier
function addClientPhyNS($connexion)
{ //client particulier non salarie
    $requet = "INSERT INTO `client_physique`(`id`, `nom`, `prenom`, `telephone`, `statut`, `salaire`, `adresse`, `login`, `password`, `email`, `cin`, `typeclt_id`, `cltmoral_id`) VALUES (null,?,?,?,?,null,?,null,null,?,null,null,null)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array(
        $_POST["nomsClt"],
        $_POST["prenoms"], $_POST["phone"], $_POST["statut"], $_POST["adresse"], $_POST["email"]
    ));

    return $connexion->lastInsertId();
}

function addClientPhyS($connexion)
{ //client particulier salarie
    $requet = "INSERT INTO `client_physique`(`id`, `nom`, `prenom`, `telephone`, `statut`, `salaire`, `adresse`, `login`, `password`, `email`, `cin`, `typeclt_id`, `cltmoral_id`) VALUES (null,?,?,?,?,?,?,null,null,?,?,null,null)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array(
        $_POST["nomsClt"],
        $_POST["prenoms"], $_POST["phone"], $_POST["statut"], $_POST["salaire"], $_POST["adresse"], $_POST["email"], $_POST["numIdTravail"]
    ));

    return $connexion->lastInsertId();
}



//==================end functions================================//

//===================traitement controller===========================// 
//traitement extraction formulaire client entreprise
if (isset($_POST) && !empty($_POST)) {
    //Extraction client moral
    $connexion = getConnexion();

    $resultat = addClientMoral($connexion);
    if ($resultat > 0) {
        header("Location:client.php");
    } else {

        echo "client entreprise non ajouté ";
    }
}


//Extraction formulaire client particulier
if (isset($_POST) && !empty($_POST)) {
    if ($_POST['statut'] == '1' && !empty($_POST)) {
        $connexion = getConnexion();
        $resultat = addClientPhyS($connexion);

        if ($resultat > 0) {
            header("Location:client.php");
        } else {

            echo "client particulier salarié non ajouté ";
        }
    } else {
        $connexion = getConnexion();
        $resultat = addClientPhyNS($connexion);

        if ($resultat > 0) {
            header("Location:client.php");
        } else {

            echo "client particulier non salarié non ajouté ";
        }
    }
    
}



//====================end controller==================================//

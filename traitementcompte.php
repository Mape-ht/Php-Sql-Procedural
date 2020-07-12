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
//Compte épargne simple et xeewel : frais d’ouverture / rémunération par an//
//Compte courant pour salariés / agios par 3 mois//
//Compte bloqué : frais d’ouverture / rémunération par an//


//add compte épargne simple et xeewel

function addCompteE($connexion)
{

    $requet = "INSERT INTO `compte_client`(`id`, `numerocte`, `clerib`, `agence_id`, `depot initial`, `etat`, `cltphy_id`, `cltmoral_id`, `datecrea`, `typecompte_id`, `typefrais_id`, `agio`, `interet`) VALUES (null,?,?,null,?,null,null,null,?,?,?,?,?)";


    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array($_POST["numCompte"], $_POST["cle"], $_POST["initial"], $_POST["dateOuv"], $_POST["typeCompte"], '$montantF', '$montantA', '$montantR'));

    $montantF=(int)'$montantF';
    $montantA=(int)'$montantA';
    $montantR=(int)'$montantR';

    return $connexion->lastInsertId();
}

//add Compte courant pour salariés
function addCompteC($connexion)
{

    $requet = "INSERT INTO `compte_client`(`id`, `numerocte`, `clerib`, `agence_id`, `depot initial`, `etat`, `cltphy_id`, `cltmoral_id`, `datecrea`, `typecompte_id`, `typefrais_id`, `agio`, `interet`) VALUES (null,?,?,null,?,null,null,null,?,?,?,?,?)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array($_POST["numCompte"], $_POST["cle"], $_POST["initial"], $_POST["dateOuv"], '$montantF', '$montantA', '$montantR' ));

    return $connexion->lastInsertId();
}

function addCompteB($connexion)
{

    $requet = "INSERT INTO `compte_client`(`id`, `numerocte`, `clerib`, `agence_id`, `depot initial`, `etat`, `cltphy_id`, `cltmoral_id`, `datecrea`, `typecompte_id`, `typefrais_id`, `agio`, `interet`) VALUES (null,?,?,null,?,null,null,null,?,?,?,?,?)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array($_POST["numCompte"], $_POST["cle"], $_POST["initial"], $_POST["dateOuv"], $_POST["typeCompte"], '$montantF', '$montantA', '$montantR'));

    return $connexion->lastInsertId();
}


//==================end functions================================//


//===================traitement controller===========================// 
//traitement extraction formulaire creation compte
if (isset($_POST['valider'])) {
    extract($_POST);
    //var_dump($_POST);
    //die;
    //Extraction formulaire compte
    if ($typeCompte == "1") {

        if(($typesfrais == "1") && ($remun == "1") && ($agios == "2")){

            $montantF = 25000 && $montantR = 50000 && $montantA = null;
            
            }
        
            $connexion = getConnexion();
            $resultat = addCompteE($connexion);

            if ($resultat > 0) {
                header("Location:client.php");
            } else {
    
            echo "compte epargne et xewel non ajouté ";
        }
    } else {

        echo "les frais ne correspondent pas";
    }

        
    }
       /* if ($typeCompte == "2") 
            $typesfrais == 2;
            $agios == 1;

            $montantF = null;
            $montantR = null;
            $montantA = 6000;

            $connexion = getConnexion();
            $resultat = addCompteC($connexion);
        } else {

            echo "compte courant non ajouté ";
        }
    }
    if ($typeCompte == "3") {

        $remun == 2;
        $montantF = 50000;
        $montantR = 100000;
        $montantA = null;

        $connexion = getConnexion();
        $resultat = addCompteB($connexion);
    } else {

        echo "compte bloqué non ajouté ";
    }*/



//====================end controller==================================//

?>

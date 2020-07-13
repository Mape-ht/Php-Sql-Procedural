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

    /*$requet = "INSERT INTO `compte_client`(`id`, `numerocte`, `clerib`, `agence_id`, `depot initial`, `etat`, `cltphy_id`, `cltmoral_id`, `datecrea`, `typecompte_id`, `typefrais_id`, `agio`, `interet`)
    VALUES (null,?,?,null,?,null,null,null,?,?,?,?,?)";
     
     $preparestatement = $connexion->prepare($requet);
     $preparestatement->execute(array('null', $_POST["numCompte"], $_POST["cle"], 'null', $_POST["initial"],'null', 'null', 'null', $_POST["dateOuv"], $_POST["typeCompte"], $_POST["typesfrais"], $_POST["agios"], $_POST["remun"]));

     return $connexion->lastInsertId();*/

     $requet = "INSERT INTO `compte`(`id`, `numCompte`, `clerib`, `depotInit`, `fraisOuverture`, `remun`, `agio`, `dateOuv`) VALUES (null,?,?,?,?,?,?,?)";
     
     $preparestatement = $connexion->prepare($requet);
     $preparestatement->execute(array( $_POST["numCompte"], $_POST["cle"], $_POST["initial"], $_POST["typesfrais"],  $_POST["remun"], $_POST["agios"], $_POST["dateOuv"]));

     return $connexion->lastInsertId();

     
}
  


/*//add Compte courant pour salariés
function addCompteC($connexion)
{

    $requet = "INSERT INTO `compte_client`(`id`, `numerocte`, `clerib`, `agence_id`, `depot initial`, `etat`, `cltphy_id`, `cltmoral_id`, `datecrea`, `typecompte_id`, `typefrais_id`, `agio`, `interet`) VALUES (null,?,?,null,?,null,null,null,?,?,?,?,?)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array($_POST["numCompte"], $_POST["cle"], $_POST["initial"], $_POST["dateOuv"], '$typesfrais', '$agios', '$remun' ));

    return $connexion->lastInsertId();
}

function addCompteB($connexion)
{

    $requet = "INSERT INTO `compte_client`(`id`, `numerocte`, `clerib`, `agence_id`, `depot initial`, `etat`, `cltphy_id`, `cltmoral_id`, `datecrea`, `typecompte_id`, `typefrais_id`, `agio`, `interet`) VALUES (null,?,?,null,?,null,null,null,?,?,?,?,?)";

    $preparestatement = $connexion->prepare($requet);
    $preparestatement->execute(array($_POST["numCompte"], $_POST["cle"], $_POST["initial"], $_POST["dateOuv"], $_POST["typeCompte"], '$montantF', '$montantA', '$montantR'));

    return $connexion->lastInsertId();
}*/


//==================end functions================================//


//===================traitement controller===========================// 
//traitement extraction formulaire creation compte
if (isset($_POST) && !empty($_POST)) {
    //var_dump($_POST);
    //die;
    //Extraction formulaire compte
    $typeCompte = $_POST["typeCompte"];
    $typesfrais = $_POST["typesfrais"];
    $remun = $_POST["remun"];
    $agios = $_POST["agios"];

        if ($typeCompte == "1") {

                
                $connexion = getConnexion();
                $resultat = addCompteE($connexion);
                if ($resultat > 0) {
                    header("Location:compte.php");
                } else {
            
                    echo "compte epargne non ajouté ";
                }
                
            }

            if ($typeCompte == "2"){
            
                $connexion = getConnexion();
                $resultat = addCompteE($connexion);
                if ($resultat > 0) {
                    header("Location:compte.php");
                } else {
            
                    echo "compte courant non ajouté ";
                }

        } 
                
        if ($typeCompte == "3"){
            
            $connexion = getConnexion();
            $resultat = addCompteE($connexion);
            if ($resultat > 0) {
                header("Location:compte.php");
            } else {
        
                echo "compte bloqué non ajouté ";
            }
    } 

        } 
        
   
//====================end controller==================================//

?>

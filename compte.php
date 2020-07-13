<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet" />
    <title>Creation Client</title>
    <meta name="description" content="Interface client Banque du Peuple" />
    <meta name="keywords" content="Interface, client, banque du Peuple" />
    <meta name="author" content="Marie Perle" />
</head>

<body>
    <!-----------------header contiendra logo + titre------>
    <header>
        <h1><span>Banque du</span> peuple</h1>
    </header>
    <main>
        <aside>
            <ul class="main-nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="client.php">Creation Client</a></li>
                <li><a href="compte.php">Creation Compte</a></li>
                <li><a href="#">Transaction</a></li>
            </ul>
        </aside>
        <section class="Compte">
            <form id="creacompteForm" method="POST" action="traitementcompte.php" onchange="showCompteEpargne()">
                <!--action="connectcpte.php" method="POST">-->
                <fieldset>
                    <legend>Creation Compte</legend>
                    <div>
                        <label for="typeCompte">Indiquer le type de Compte</label>
                        <select name="typeCompte" id="typeCompte">
                            <option value="0">----Type de compte----</option>
                            <option value="1">Epargne et Xewel</option>
                            <option value="2">Courant</option>
                            <option value="3">Bloque</option>
                        </select><br><br/>    
                    </div>
                    <div>
                        <label for="numCompte">Numéro de Compte</label>
                        <input type="text" id="numCompte" name="numCompte" /></br>
                        <label for="cle">Numéro Clé RIB</label>
                        <input type="text" id="cle" name="cle"/></br>
                    </div>
                    <div id="depotInit">
                        <label for="initial">Depôt initial </label>
                        <input type="texte" id="initial" name="initial" placeholder="Depôt initial" /><br />
                    </div>
                    <!--<div id="ouverture" >-->
                        <label for="typesfrais">Frais Ouverture</label>
                        <!--<select name="typesfrais" id="typesfrais">
                            <option value="0">--Frais Ouverture --</option>
                            <option value="1">Epargne et Xewel</option>
                            <option value="2">Compte Bloqué</option>
                        </select><br><br />-->
                        <input type="text" name="typesfrais" id="typesfrais"/><br></br>
                    <!--<div id="interetB" >
                    <label for="remun">Remuneration</label>
                    <select name="remun" id="remun">
                        <option value="0">--Remuneration Compte--</option>
                        <option value="1">Epargne et Xewel</option>
                        <option value="2">Compte Bloqué</option>
                    </select><br></br>
                    </div>-->
                    <label for="remun">Remuneration</label>
                    <input type="text" name="remun" id="remun"/><br></br>
                    <!--<div id="ag">
                    <label for="agios">Agios</label>
                    <select name="agios" id="agios">
                        <option value="0">--Agios Compte--</option>
                        <option value="1">Compte Courant</option>
                        <option value="2">Autre</option>
                    </select><br></br>
                    </div>-->
                    <label for="agios">Agios</label>
                    <input type="text" name="agios" id="agios"/><br></br>
                    <label for="dateOuv">Date d'ouverture du compte</label>
                    <input id="dateOuv" type="date" name="dateOuv" /><br />
                </fieldset>
                <div>
                    <input type="submit" name="valider" value="valider"/>
                    <button type="reset" class="bouttonA">ANNULER</button>
                </div>
            </form>
        </section>
    </main>
    <!--<script src="./banqueDuPeupleRendu/js/compte.js">-->
    </script>
</body>
</html>
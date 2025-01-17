<!--
	Auteur : Mr langloy Alban
	Date : 116/11/2023
	Description : Mon premier C
-->
<DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
        <script src="feuille.js" defer></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="jquery-ui-1.13.2.custom/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="jquery-ui-1.13.2.custom/jquery-ui.js"></script>
	</head>
	<body>


        <!-- Ajouter un bouton pour ouvrir le menu -->
		<button class="button" id="button">☰</button>
            <!-- Ajouter un menu avec des liens -->
            <div class="menu" id="menu">
            <div id="accordion">
                <h3>MENU</h3>
                <div>
                    <p>
                        <a href="menu.html">Accueil</a>
                    </p>
                </div>
                <h3>FORMULAIRES</h3>
                <div>
                    <p>
                        <a href="selection.php">vos formulaires enregistrer</a>
                    </p>
                </div>
                <h3>TELECHARGER</h3>
                <div>
                    <p>
                        <a href="download.php">télécharger</a>
                    </p>
                </div>
                <h3>connexion / inscription</h3>
                <div>
                    <p>
                        <a href="connexion.php">votre compte</a>
                    </p>
                
                </div>
                <h3>test</h3>
                <div>
                    <p>
                        <a href="Validation.php">validation</a>
                    </p>
                </div>
                
            </div>
                <!-- Ajouter un bouton pour fermer le menu -->
                <button class="close" id="close">×</button>
            </div>
        <div class="container">
            <div class="header">
                <div class="logo">Formulaire</div>
                <div class="nav">
                    <a href="menu.html">Accueil</a>
                    <a href="menu.html">À propos</a>
                    <a href="menu.html">Contact</a>
                </div>

                <!-- Ajouter une barre de recherche -->
                <div class="search">
                    <input type="text" name="query" id="query" placeholder="Rechercher">
                    <button type="submit" id="search">Rechercher</button>
                </div>
            </div>
<div class="content">
    <?php
    //connexion
    require_once("fonction.php");
    $connexion = connect();

    // Insertion
    // initialisation de valeurs :
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $action_contribution = $_POST['action_contribution'];
    $temps_contrat = $_POST['temps_contrat'];
    $pays = $_POST['pays'];
    $contribution = $_POST['contribution'];
    $activites = $_POST['activites'];
    $nb_part = $_POST['nb_part'];
    $nom_partenariat = $_POST['nom_partenariat'];
    $adresse_partenariat = $_POST['adresse_partenariat'];
    $répartitions_des_bénéfices = $_POST['répartitions_des_bénéfices'];
    $resultat = false; 
    $requete = 'INSERT INTO info(date1, date2, temps_contrat, pays, action_contribution, nb_part, contribution, activites, nom_partenariat, adresse_partenariat, répartitions_des_bénéfices) VALUES("'.$_POST['date1'].'", "'.$_POST['date2'].'", "'.$_POST['temps_contrat'].'", "'.$_POST['pays'].'", "'.$_POST['action_contribution'].'","'.$_POST['nb_part'].'", "'.$_POST['contribution'].'", "'.$_POST['activites'].'", "'.$_POST['nom_partenariat'].'", "'.$_POST['adresse_partenariat'].'", "'.$_POST['répartitions_des_bénéfices'].'");';
    $resultat = mysqli_query($connexion,$requete);
    
    if (!$resultat) {
        die('Erreur SQL : ' . mysqli_error($connexion));
    }
    
    $resultat = mysqli_query($connexion,$requete);
    if ($resultat) {
      $idArt = mysqli_insert_id($connexion);
        echo "Insertion réussie - id nouveau arrivage = " .$idArt;
      } else {
        echo "Echec de l'insertion<br>";
     }
    ?>
    <br>
    <br>
    <a href="selection.php"><button>Cliquez pour revenir en arriere.</button></a>
	</body>
</html>

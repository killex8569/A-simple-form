<!--
	Auteur : Mr langloy Alban
	Date : 16/11/2023
	Description : Ma premier selection
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
                    <a href="formulaire.php">Créer un formulaire</a>
                </p>
            </div>
            <h3>TELECHARGER</h3>
            <div>
                <p>
                    <a href="imprimer.php" target="_blank">télécharger</a>
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
        <div class="container">
    <?php
      require_once("fonction.php");
      $connexion = connect();
      // Extraction avec mysqli_fetch_assoc 
       $resultat = mysqli_query($connexion,'SELECT * FROM info ORDER BY id ASC');
       while ($ligne = mysqli_fetch_assoc($resultat)){
        $id = $ligne['id'];
        $date1 = $ligne['date1'];
        $date2 = $ligne['date2'];
        $action_contribution = $ligne['action_contribution'];
        $temps_contrat = $ligne['temps_contrat'];
        $pays = $ligne['pays'];
        $contribution = $ligne['contribution'];
        $activites = $ligne['activites'];
        $nom_partenariat = $ligne['nom_partenariat'];
        $adresse_partenariat = $ligne['adresse_partenariat'];
        $répartitions_des_bénéfices = $ligne['répartitions_des_bénéfices'];
        ?>
        <!--Créer du div cote-à-cote-->
            <?php echo '<br><a href=\'affiche.php?id='.$id .'\'>'.$id .'|'. $date1 .'|'. $contribution . '|'. $pays . '</a>';?>
            <br>
            <?php echo '&nbsp;&nbsp;<br><a href=\'supprimer.php?id='.$id .'\'><button>Supprimer</button></a>';?>
            <br> <br>
    <?php }
    ?>
    <br>
    <br>
    <br>
    <a href="formulaire.php"><button>Créer un nouveau formulaire</button></a>
	</body>
</html>

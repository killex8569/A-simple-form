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
    //connexion
    require_once("fonction.php");
    $connexion = connect();

    // Suppression
    $requete = 'DELETE FROM info WHERE id='.$_GET["id"].';';
    $resultat = mysqli_query($connexion,$requete);
    if ($resultat) {
        echo "Le formulaire numéro = " .$_GET["id"]." à été supprimer avec succès.";
      } else {
        echo "Echec de la suppression<br>";
        echo mysqli_error($connexion);
     }
    ?>
    <br>
    <br>
    <p>Vous pouvez maintenant retournez au menu de séléction !</p>
    <br>
    <br>
    <a href="selection.php"><button>Cliquez pour revenir en arriere.</button></a>
	</body>
</html>

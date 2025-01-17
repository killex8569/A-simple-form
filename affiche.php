<!--
	Auteur : Mr langloy Alban
	Date : 116/11/2023
	Description : Mon premier affichage
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
<div class="content">				<?php
					if(isset($_GET['id'])) {
						//connexion
						require_once("fonction.php");
						$connexion = connect();

						// Extraction avec mysqli_fetch_assoc
						$resultat = mysqli_query($connexion,'SELECT * FROM info WHERE id='.$_GET['id']);
						 while ($ligne = mysqli_fetch_assoc($resultat)){
							echo '<h2>récapitulatif des informations :</h2><br><br>';
							echo 'id = '.$ligne['id'].'<br> date de création du contrat :<br> '.$ligne['date1'].' <br> <br>date de prise en compte du contrat :<br> '.$ligne['date2'].',<br><br> le contrat foncitonne pendant une durée de : <br>'.$ligne['temps_contrat'].' an(s)<br><br>le pays ainsi que les règle et lois appliquées autour :<br> '.$ligne['pays'].',<br><br> les actions qui sont assuré d être éfféctuer par le partenaire :<br> '.$ligne['action_contribution'].',<br><br> les contributeurs qui ont accépter les conséquences : '.$ligne['contribution'].', <br><br>le nom du partenariat : <br>'.$ligne['nom_partenariat'].'<br><br> l addresse de votre  partenaire :<br> '.$ligne['adresse_partenariat'].', <br><br>la répartition des bénéfices : <br>'.$ligne['répartitions_des_bénéfices'].'';
							 foreach ($_POST as $key => $value) {
								if (strpos($key, 'desc_contributeur') === 0) { 
									echo $key . ': ' . $value . '<br>';
								}
							}
							echo '<br>';
							echo '<br>';
							echo '<br>';

							 echo '<a href="selection.php"><button>Revenir sur l\'écran de selection</button></a><br>';

							echo '<br>';
							 echo '<a href="formulaire.php?id='.$ligne['id'].'"><button>Editer</button></a><br>';
					 	}
					} else {

						echo '<div>';
						echo 'Vos modifications on bien été pris en compte !';
						?>
						<br>
						<br>
						<?php 
						echo '<form action="create.php" method="post">';
		        	echo '<input type="hidden" name="date1" value="'.$_POST['date1'].'">';
		        	echo '<input type="hidden" name="date2" value="'.$_POST['date2'].'">';
					echo '<input type="hidden" name="nb_part" value="'.$_POST['nb_part'].'">';
					echo '<input type="hidden" name="temps_contrat" value="'.$_POST['temps_contrat'].'">';
					echo '<input type="hidden" name="action_contribution" value="'.$_POST['action_contribution'].'">';
					echo '<input type="hidden" name="pays" value="'.$_POST['pays'].'">';
					echo '<input type="hidden" name="contribution" value="'.$_POST['contribution'].'">';
					echo '<input type="hidden" name="activites" value="'.$_POST['activites'].'">';
					echo '<input type="hidden" name="nom_partenariat" value="'.$_POST['nom_partenariat'].'">';
					echo '<input type="hidden" name="adresse_partenariat" value="'.$_POST['adresse_partenariat'].'">';
					echo '<input type="hidden" name="répartitions_des_bénéfices" value="'.$_POST['répartitions_des_bénéfices'].'">';
					echo 'voici les action de vos contributeurs : ';

					foreach ($_POST as $key => $value) {
						if (strpos($key, 'desc_contributeur') === 0) { 
							echo $key . ': ' . $value . '<br>';
						}
					}
					?>
					<br>
					<br>
					<?php
					echo 'voici les action de vos contributeurs : ';
						foreach ($_POST as $key => $value) {
							if (strpos($key, 'contribution') === 0) { 
								echo $key . ': ' . $value . '<br>';
							}
						}
					
		        	echo '<input type="submit" value="Enregister">';
		      	echo '</form>';
						echo '<form action="formulaire.php" method="post">';
						echo '<input type="hidden" name="date1" value="'.$_POST['date1'].'">';
						echo '<input type="hidden" name="date2" value="'.$_POST['date2'].'">';
						echo '<input type="hidden" name="nb_part" value="'.$_POST['nb_part'].'">';
						echo '<input type="hidden" name="temps_contrat" value="'.$_POST['temps_contrat'].'">';
						echo '<input type="hidden" name="action_contribution" value="'.$_POST['action_contribution'].'">';
						echo '<input type="hidden" name="pays" value="'.$_POST['pays'].'">';
						echo '<input type="hidden" name="contribution" value="'.$_POST['contribution'].'">';
						echo '<input type="hidden" name="activites" value="'.$_POST['activites'].'">';
						echo '<input type="hidden" name="nom_partenariat" value="'.$_POST['nom_partenariat'].'">';
						echo '<input type="hidden" name="adresse_partenariat" value="'.$_POST['adresse_partenariat'].'">';
						echo '<input type="hidden" name="répartitions_des_bénéfices" value="'.$_POST['répartitions_des_bénéfices'].'">';
						
							echo '<button type="submit" value="Editer">Editer</button>';
						echo '</form>';
						echo '</div>';
					}
				?>



	</body>
</html>

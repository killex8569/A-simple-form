<DOCTYPE html>
<html>
    <head>
        <!--a faire pour la prochaine fois : 

        Tâche à réalisé :

        -séparer les feuilles JS 
        -intégré un premier framwork ou bibliotèque   
        -liée avec une base de donnée
        -faire en sorte que les anciens formulaires enregistrer soit retrouvable 
        -voir si possible les différents formulaires qui sont déjà remplies
        -insérer la méthode CRUD (Create, Read, Update, Delete)
        -relier le php avec le sql
        -pouvoirs faire un chek de la base de données avec les identifiants de connexions.
        -ajouter un border radius ET un style pour les inputs et les textarea
        -ajouter une police d'écriture qui est plus approprié 
        -permettre de faire choisir l'utilisateur pour le nom de ses formulaires (a la place de formulaire 1,2..., formulaire pro, formulaire test, test1, etc...)
        -ajouter des meilleures styles de boutons (et non pas ceux par défaut)
        -revoir directement le problème d'affichage sur le bouton pour le transformer en pdf
        -importer la base de donnée dans l'index
        -sécuriser le site
        -mettre de l'ajax
        pour avoir un 10/20: il faut que tout soit au minimum foncitonelle.

        #question a poser : "peut-on avoir une seul feuille css pour toute les pages du site?", "

        Choses déjà fait :
        -mettre une en-tête (pour inséré une barre de recherche et les boutons menu, acceuil ...)
        -améliorer le css (surement avec du javascript ! )
        -créer la liaison entre la page 1 (formulaire) et la page 2 (la preview juste avant la traduction en pdf !) 
        -faire un style css pour les boutons (envoie, création et aussi les inputs)
        -Faire un CSS basique
        -faire un menu déroulant 
        -créer les inputs
        -faire la forme principal du formulaire
        -complété la suite du formulaire
        -Pouvoirs le transformer en PDF
        -continuer l'ajout de nouvelles zones de texte
        -finir d'importer les autres informations
        -le faire sur un git
        -faire fonctionner le php 
        -->
        <html lang="fr">
        <link rel="stylesheet" href="style.css">
        <script src="feuille.js" defer></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="jquery-ui-1.13.2.custom/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="jquery-ui-1.13.2.custom/jquery-ui.js"></script>
    </head>
<body>
<?php
	include 'fonction.php';
	include 'fonction2.php';
	
	$id = isset($_POST["id"]) ? $_POST["id"] : 0;
	if ($id == 0) {
		$data = getNewData();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = readData($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
	
	
?>
<!-- test-->
<?php
				// initialisation de valeurs
				// passation avec $_POST
				if (isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['temps_contrat']) && isset($_POST['pays']) && isset($_POST['contribution']) && isset($_POST['activites']) && isset($_POST['nom_partenariat']) && isset($_POST['adresse_partenariat']) && isset($_POST['répartitions_des_bénéfices'])) {
                    $date1 = $_POST['date1'];
                    $date2 = $_POST['date2'];
                    $temps_contrat = $_POST['temps_contrat'];
                    $pays = $_POST['pays'];
                    $contribution = $_POST['contribution'];
                    $contributions = $_POST['contributions'];
                    $activites = $_POST['activites'];
                    $nom_partenariat = $_POST['nom_partenariat'];
                    $adresse_partenariat = $_POST['adresse_partenariat'];
                    $répartitions_des_bénéfices = $_POST['répartitions_des_bénéfices'];
				// passation avec $_GET
				} elseif (isset($_GET['id'])) {
					//connexion
					require_once("connexion.php");
					$connexion = connect();
                    if ($connexion) {
                        $ok = mysqli_select_db($connexion,'formulaire');
                        if ($ok) {
                           return $connexion;
                           echo "tout vas bien";
                        } else{
                          echo 'Echec de la sélection de la base';
                        }
                     } else {
                       echo 'Erreur lors de la connexion';
                     }
					// Extraction avec mysqli_fetch_assoc
					$resultat = mysqli_query($connexion,'SELECT * FROM info WHERE id='.$_GET['id']);
					 while ($ligne = mysqli_fetch_assoc($resultat)){
                        $id = $ligne['id'];
                        $date1 = $ligne['date1'];
                        $date2 = $ligne['date2'];
                        $temps_contrat = $ligne['temps_contrat'];
                        $pays = $ligne['pays'];
                        $contribution = $ligne['contribution'];
                        $activites = $ligne['activites'];
                        $nom_partenariat = $ligne['nom_partenariat'];
                        $adresse_partenariat = $ligne['adresse_partenariat'];
                        $répartitions_des_bénéfices = $ligne['répartitions_des_bénéfices'];
					 }
				// pas de passation
				} else {
                    $id = '';
                    $date1 = '';
                    $date2 = '';
                    $temps_contrat = '';
                    $pays = '';
                    $contribution = '';
                    $contributions = '';
                    $activites = '';
                    $nom_partenariat = '';
                    $adresse_partenariat = '';
                    $répartitions_des_bénéfices = '';
				}
			?>

    <title>Formulaire en ligne</title>
    <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  $( function() {
  $( "#dialog" ).dialog();
} );
    </script>
            <!-- Ajouter un bouton pour ouvrir le menu -->
            <button class="button" id="button">☰</button>
            <!-- Ajouter un menu avec des liens -->
            <div class="menu" id="menu">
            <div id="accordion">
                <h3>MENU</h3>
                <div>
                    <p>
                        <a href="menu.php">Accueil</a>
                    </p>
                </div>
                <h3>FORMULAIRES</h3>
                <div>
                    <p>
                        <a href="test.php">vos formulaires enregistrer</a>
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
            
        </div>
    <form action="Validation.php" method = "post">     
        <h1>CONTRAT DE PARTENARIAT COMMERCIAL</h1>
                <p>Veuillez entrer la date de création du contrat : <input type="date" name="date1" value="<?php echo $date1; ?>" required></p>
                <p>copies originales, entre</p>
                <p><strong>*</strong><br><input type="text" name="contribution" placeholder="votre contributeur" value="<?php echo $contribution; ?>" required></p>
                <br>
                <!-- Formulaire HTML pour entrer des informations -->
        <!-- il faudras bien pensée a enlevé le textearea et mettre a la place, un input-->
                <div>
            <form action="Validation.php" method = "post">
                <button type="button" onclick="addInput1()">ajouter un contributeur(s)</button> 
                <button type="button" onclick="deleteInput1()">supprimer un contributeur</button>
                <div id="inputContainer">
                </div>  
                </div>
                <div>
                <h2>1. NOM DU PARTENARIAT ET ACTIVITE</h2>
                <p>1.1 Nature des activités : Les Partenaires cités ci-dessus donnent leur accord d'être considérés comme des partenaires commerciaux pour les fins suivantes :</p>
                <textarea id ="activites" name="activites" rows="5" required><?php echo $activites; ?></textarea>
                <p>1.2 Nom : Les Partenaires cités ci-dessus donnent leur accord, pour que le partenariat commercial soit exercé sous le nom:</p>
                <input type="text" name="nom_partenariat" value="<?php echo $nom_partenariat; ?>" required>

                <p>1.3 Adresse officielle : Les Partenaires cités ci-dessus donnent leur accord pour que le siège du partenariat commercial soit:</p>
                <input type="text" name="adresse_partenariat" value="<?php echo $adresse_partenariat; ?>" required>
                <h2>2. TERMES</h2>
                <p>2.1 Le partenariat commence le <input type="date" name="date2" value="<?php echo $date2; ?>" required> et continue jusqu'à la fin de cet accord.</p>
                <h2>3. CONTRIBUTION AU PARTENARIAT</h2>
                <p>3.1 La contribution de chaque partenaire au capital listée ci-dessous se compose des éléments suivants :</p>
                <button type="button" onclick="addInput()">ajoutez un contributeur</button> 
                <button type="button" onclick="deleteInput()">supprimez un contributeur</button>
                <?php foreach ($_POST as $key => $value) {
                    if (strpos($key, 'desc_contributeur') === 0) { 
                        echo $key . ': ' . $value . '<br>';
                    }
                }
                ?>
                <div id="textareContainer">
                </div> 
                <p> <strong>*</strong><br>
                    <textarea name="contributions" rows="5" required><?php echo $contributions; ?></textarea></p>
                <br>
                <h2>4.RÉPARTITION DES BÉNÉFICES ET DES PERTES</h2>
                <p>4.1 Les Partenaires se partageront les profits et les pertes du partenariat commercial de la manière suivante :</p>
                <textarea name="répartitions_des_bénéfices" rows="10" required><?php echo $répartitions_des_bénéfices; ?></textarea>
                <h2>5. PARTENAIRES ADDITIONNELS</h2>
                <p>5.1 Aucune personne ne peut être ajoutée en tant que partenaire et aucune autre autre activité ne peut être menée par le partenariat sans le consentement écrit de tous les partenaires</p>
                <h2>6.MODALITÉS BANCAIRES ET TERMES FINANCIERS</h2>
                <p>6.1 Les Partenaires doivent avoir un compte bancaire au nom du partenariat sur lequel les chèques doivent être signés par au moins <input type="number" name ="nb_part"value="<?php echo $date1; ?>" required> des Partenaires.</p>
                <p>6.2 Les Partenaires doivent tenir une comptabilité complète du partenariat et la rendredisponible à tous les Partenaires à tout moment.</p>
                <h2>7. GESTION DES ACTIVITÉS DE PARTENARIAT</h2>
                <p>7.1 Chaque partenaire peut prendre part dans la gestion du partenariat</p>
                <p>7.2 Tout désaccord qui intervient dans l'exploitation du partenariat, sera réglé par les partenaires détenant la majorité des parts du partenariat.</p>
                <h2>8. DÉPART D'UN PARTENAIRE COMMERCIAL</h2>
                <p>8.1 Si un partenaire se retire du partenariat commercial pour une raison quelconque, y compris le décès, les autres partenaires peuvent continuer à exploiter le partenariat sous le même nom</p>
                <p>8.2 Le partenaire qui se retire est tenu de donner un préavis écrit d'au moins soixante (60) jours de son intention de se retirer et est tenu de vendre ses parts du partenariat commercial.</p>
                <p>8.3 Aucun partenaire ne doit céder ses actions dans le partenariat commercial à une autre partie sans le consentement écrit des autres partenaires.</p>
                <p>8.4 Le ou les partenaires restants paieront au partenaire qui se retire, ou au représentant légal
                    du partenaire décédé ou handicapé, la valeur de ses parts dans le partenariat, ou (a) la somme
                    de son capital, (b) des emprunts impayés qui lui sont dus, (c) sa quote-part des bénéfices nets
                    cumulés non distribués dans son compte, et (d) son intérêt dans toute plus-value
                    préalablement convenue de la valeur du partenariat par rapport à sa valeur comptable.
                    Aucune valeur de bonne volonté ne doit être incluse dans la détermination de la valeur des
                    parts du partenaire</p>
                <h2>9. CLAUSE DE NON CONCURRENCE</h2>
                <p>9.1 Un partenaire qui se retire du partenariat ne doit pas s'engager directement ou
                    indirectement dans une entreprise qui est ou serait en concurrence avec la nature des activités
                    actuelles ou futures du partenariat pendant :<input type="number" name="temps_contrat" value="<?php echo $temps_contrat; ?> "required > année(s).</p>
                <h2>10. MODIFICATION DE L’ACCORD DE PARTENARIAT</h2>
                <p>10. 1 Ce contrat de partenariat commercial ne peut être modifié sans le consentement écrit de
                    tous les partenaires.</p>
                <h2>11. DIVERS</h2>
                <p>11.1 Si une disposition ou une partie d'une disposition de la présente convention de
                    partenariat commercial est non applicable pour une quelconque raison, elle sera dissociée
                    sans affecter la validité du reste de la convention.</p>
                <p>11.2 Cet accord de partenariat commercial lie les partenaires commerciaux et pourra servir à
                    leurs héritiers, exécuteurs testamentaires, administrateurs, représentants personnels,
                    successeurs et ayants droit respectifs.
                    </p>
                <h2>12. JURIDICTION</h2>
                <p>12.1 Le présent contrat de partenariat commercial est régi par les lois de l’État de <input type = "text" name="pays" value="<?php echo $pays; ?> " required>
                    <br>
                    <p><h1>veuillez entrez un nom pour le formulaire</h1></p>
                    <input type="text" name="name_form" placeholder="le nom de votre formulaire" required>
                    <br>
                    <br>
                    <div>
                        <button type="submit">valider</button>
                    </div>                    
                    <br>
                    <br>  
                    <p><strong>*</strong> champs obligatoires (au minimum un)</p>	
            </form>
    </form>

    <?php
    
    //<?php
if (isset($_GET['partners'])) {
    $partners = $_GET['partners'];

    foreach ($partners as $partner) {
        // Faire quelque chose avec chaque partenaire, par exemple l'afficher
        echo "Partenaire ajouté : " . htmlspecialchars($partner) . "<br>";
    }
} else {
    echo "Aucun partenaire n'a été ajouté.";
}
?>

    </div> 
</body>
</html>
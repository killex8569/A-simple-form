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
    <br>
    <?php
				// initialisation de valeurs
				// passation avec $_POST
				if (isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['temps_contrat']) && isset($_POST['action_contribution']) && isset($_POST['pays']) && isset($_POST['contribution']) && isset($_POST['activites']) && isset($_POST['nom_partenariat']) && isset($_POST['adresse_partenariat']) && isset($_POST['répartitions_des_bénéfices'])) {
					$date1 = $_POST['date1']; 
                    $date2 = $_POST['date2'];
                    $temps_contrat = $_POST['temps_contrat'];
                    $pays = $_POST['pays'];
                    $contribution = $_POST['contribution'];
                    $activites = $_POST['activites'];
                    $nom_partenariat = $_POST['nom_partenariat'];
                    $adresse_partenariat = $_POST['adresse_partenariat'];
                    $répartitions_des_bénéfices = $_POST['répartitions_des_bénéfices'];
					$action_contribution = $_POST['action_contribution'];
                    $nb_part =$_POST['nb_part'];
				// passation avec $_GET
				} elseif (isset($_GET['id'])) {
					//connexion
					require_once("fonction.php");
					$connexion = connect();

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
						$action_contribution = $ligne['action_contribution'];
                        $nb_part = $ligne['nb_part'];
					 }
				// pas de passation
				} else {
                    $id = '';
                    $date1 = '';
                    $date2 = '';
                    $temps_contrat = '';
					$action_contribution = '';
                    $pays = '';
                    $contribution = '';
                    $contributions = '';
                    $activites = '';
                    $nom_partenariat = '';
                    $adresse_partenariat = '';
                    $répartitions_des_bénéfices = '';
                    $nb_part ='';
				}
			?>

            <h1>CONTRAT DE PARTENARIAT COMMERCIAL</h1>
            <p>Ce contrat est fait ce jour <?php echo ": $date1";?></p>
            <h2>1. NOM DU PARTENARIAT ET ACTIVITE</h2>
            <p>Sont présenté ci-contre la listes des contributeurs qui participe et intégre le contrat de travail : <br> <br> <?php foreach ($_POST as $key => $value) {
                    if (strpos($key, 'contribution') === 0) { 
                        echo $key . ': ' . $value . '<br>';
                    }
                }?> </p>
                <p>1.1 Nature des activités : Les Partenaires cités ci-dessus donnent leur accord d'être considérés comme des partenaires commerciaux pour les fins suivantes : <?php echo " $activites";?></p>
                
                <p>1.2 Nom : Les Partenaires cités ci-dessus donnent leur accord, pour que le partenariat commercial soit exercé sous le nom: <?php echo "$nom_partenariat";?></p>
                
                
                <p>1.3 Adresse officielle : Les Partenaires cités ci-dessus donnent leur accord pour que le siège du partenariat commercial soit: <?php echo "$adresse_partenariat";?></p>
                
                <h2>2. TERMES</h2>
                <p>2.1 Le partenariat commence le <?php echo "$date2";?> et continue jusqu'à la fin de cet accord.</p>
                <h2>3. CONTRIBUTION AU PARTENARIAT</h2>
                <p>3.1 La contribution de chaque partenaire au capital listée ci-dessous se compose des éléments suivants :</p>
                <?php foreach ($_POST as $key => $value) {
                    if (strpos($key, 'desc_contributeur') === 0) { 
                        echo $key . ': ' . $value . '<br>';
                    }
                }
                echo "- : $contributions";
                ?>
                <h2>4.RÉPARTITION DES BÉNÉFICES ET DES PERTES</h2>
                <p>4.1 Les Partenaires se partageront les profits et les pertes du partenariat commercial de la manière suivante : <?php echo  $répartitions_des_bénéfices;?></p>
                
                <h2>5. PARTENAIRES ADDITIONNELS</h2>
                <p>5.1 Aucune personne ne peut être ajoutée en tant que partenaire et aucune autre autre activité ne peut être menée par le partenariat sans le consentement écrit de tous les partenaires</p>
                <h2>6.MODALITÉS BANCAIRES ET TERMES FINANCIERS</h2>
                <p>6.1 Les Partenaires doivent avoir un compte bancaire au nom du partenariat sur lequel leschèques doivent être signés par au moins  <?php echo ": $nb_part";?> des Partenaires.</p>
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
                    actuelles ou futures du partenariat  pendant <?php echo ": $temps_contrat";?> année(s)</p>
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
                <p>12.1 Le présent contrat de partenariat commercial est régi par les lois de l’État de <?php echo ": $pays";?>
                    <br>
                    <br>
                    <button id ="printbtn" type="button" value="Enregistrer en PDF" onclick="window.print();">Enregistrer en PDF</button>
                    <br><br><br>
                    <form action="formulaire.php">
                        <button type=submit>retourner au menu</button>
                    </form>
    </body>
</html>
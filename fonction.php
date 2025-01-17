<?php
// Connexion au serveur local puis sélection de la base Test
function connect()
{
  $connexion = mysqli_connect('localhost','root',null);
  if ($connexion) {
     $ok = mysqli_select_db($connexion,'formulaire');
     if ($ok) {
        return $connexion;
     } else{
       echo 'Echec de la sélection de la base';
     }
  } else {
    echo 'Erreur lors de la connexion';
  }
}
?>

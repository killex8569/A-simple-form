
// Récupérer les éléments du bouton, du menu et du bouton de fermeture
var button = document.getElementById("button");
var menu = document.getElementById("menu");
var close = document.getElementById("close");
            
// Créer une fonction pour ouvrir ou fermer le menu
function toggleMenu() {
    // Vérifier si le menu a la classe open
    if (menu.classList.contains("open")) {
        // Enlever la classe open du menu
        menu.classList.remove("open");
    } else {
        // Ajouter la classe open au menu
        menu.classList.add("open");
    }
}
            
// Ajouter un écouteur d'événement au bouton
button.addEventListener("click", toggleMenu);
            
// Ajouter un écouteur d'événement au bouton de fermeture
close.addEventListener("click", toggleMenu);
            
// Créer une fonction pour fermer le menu automatiquement après 10 secondes
function autoClose() {
    // Vérifier si le menu a la classe open
    if (menu.classList.contains("open")) {
        // Appeler la fonction toggleMenu
        toggleMenu();
    }
}


    var inputCount1 = 1; // Variable pour suivre le nombre d'inputs
    function addInput1() {
        var container = document.getElementById("inputContainer");
        var input = document.createElement("input"); //définit le document créer
        input.type = "text"; // définit son type
        input.placeholder = "nouveau contributeur";
        container.appendChild(input); //ajout l'élément au conteneur
        container.appendChild(document.createElement("br")); //ajout l'élément au conteneur avec un <br>
        input.name = "contribution" + inputCount1;
        inputCount1++;
    }

    function deleteInput1() {
        event.preventDefault(); 
        var container = document.getElementById("inputContainer");
        var inputs = container.getElementsByTagName("input");
        if (inputs.length > 0) {
            container.removeChild(inputs[inputs.length - 1]); //supprime le document dans le conteneur
            container.removeChild(container.lastChild); //supprime le saut de ligne
            inputCount1--; //décrémente le compteur d'éléments
        }
    }

    var inputCount = 1; // Variable pour suivre le nombre d'inputs

    function addInput() {
        var container = document.getElementById("textareContainer"); //place l'élément dans une div créer a cette effet
        var input = document.createElement("textarea"); 
        input.type = "textarea";
        input.name = "contribution du partenaire" + inputCount; //inputCount pour générer un nom unique
        input.placeholder = "nouvelles activités";
        container.appendChild(input);
        container.appendChild(document.createElement("br"));
        inputCount++; // Incrémente inputCount à chaque fois qu'un input est crée
    }

    function deleteInput() {
        event.preventDefault(); 
        var container = document.getElementById("textareContainer");
        var inputs = container.getElementsByTagName("textarea");
        if (inputs.length > 0) {
            container.removeChild(inputs[inputs.length - 1]);
            container.removeChild(container.lastChild); 
            inputCount--; // Décrémentez inputCount chaque fois que vous supprimez un input
        }
    }

 $( function() {
    $( "#accordion" ).accordion();
  } );
  $( function() {
  $( "#dialog" ).dialog();
} );
<!-- POur lus de compréhention: la cléf "path" = "path" -->

<?php
$function = $_POST["function"]; // Fonction variable qui lance la fonction "fonction" dans l'ajax.
$function();
function fichier() {
    // Déclaration des variables.
    $id = $_POST["id"];
    $curent_path = $_POST["path"];
    $new_path = $_POST["new_path"];
    $compteur = 0;
    $nom_utilisateur=php_uname("n");
    $dossier_scan = '/home' . $nom;
    

    
    if (isset($_POST["path"])) {
        //$dossier_scan = $curent_path . $id;
        $new_path = $curent_path;
    }
    //$contenu_dossier = scandir($dossier_scan); //Scan le dossier et le retranscrit en tableau.
    $contenu_dossier = scandir($new_path);
    echo "<div class =\"row\">"; // Ajout d'Html en PHP pour crer la première ligne "row".
    // Boucle de lecture du tableau
    foreach ($contenu_dossier as $nom) {
        // Création d'une nouvelle ligne "row" toutes les 6 lignes.
        if ($compteur == 6) {
            echo "</div><div class =\"row\">";
            $compteur = 0;
        }
        // Chache les dossier commençant par ".".
        if ($nom[0] == ".") {
            continue; // Rentre dans la boucle mais ignore la suite de la fonction jusqu'à ne plus trouvé de dossier commençant par "."
        }
        // Corrige les carractères spéciaux de la première variable par la deuxième variable.
        $espace = array(" ", "(", ")", "'");
        $anti_slash = array("\ ", "\(", "\)", "\'");
        $nom = str_replace($espace, $anti_slash, $nom);
        // Différencie la différence entre fichier et dossier avec un boolean.
        // $file = is_dir($curent_path . $id . "/" . $nom);
        // Montre la différence entre fichier et dossier avec un boolean.
        //$file = is_dir($curent_path . $id . "/" . $nom);
        $file = is_dir($new_path . "/" . $nom);
        
        
        
        if ($file == true) {
            $dossier_clicable = "dossier";
            $font_fichier = "<i class=\"fa fa-folder-o fa-5x\" aria-hidden=\"true\"></i>";
            //création de div avec class bootstrap
            echo "<div class=\"text-center " . $dossier_clicable ." col-12 col-md-1 offset-md-1\" id = " . $nom . " >" // Donne l'id
                . $font_fichier // Donne son icone 
                . " <div> " //création de div avec class bootstrap 
                    . "<label>" . $nom . "</label> "
                . "</div><br>" 
           . "</div>";
        } else {
            $font_fichier = "<i class=\"fa fa-file-o fa-5x\" aria-hidden=\"true\"></i>";
            $dossier_clicable = "";
            if ( strlen($nom) > 10){ // Change le nbr de caractères affiché
                $nom = substr($nom, 0, 10) . "...";
            }
            echo "<div class=\"text-center " . $dossier_clicable ." col-12 col-md-1 offset-md-1\" id = " . $nom . " >" 
                . $font_fichier 
                . " <div> "
                    . "<label>" . $nom . "</label> "
                . "</div><br>" 
           . "</div>";
        }             
        // incrémentation des compteurs de création de ligne.
        $compteur++;
        
    }
}
function click() {
    // Déclaration des variables.
    $id = $_POST["id"];
    $curent_path = $_POST["path"];
    $compteur = 0;
    $nom_utilisateur = php_uname("n");
    $dossier_scan = '/home';
    //echo $nom_utilisateur;
    //echo  $dossier_scan;
    // Condition pour déterminer les chemins des dossiers.
    if ($curent_path == null) {
        $curent_path = $dossier_scan . "/" . $id;
        echo $curent_path;
    } else {
        $curent_path = $curent_path . "/" . $id;
        echo $curent_path;
    }
    $contenu_dossier = scandir($curent_path); //Scan le dossier et le retranscrit en tableau.
    echo "<div class =\"row\">"; // Ajout d'Html en PHP pour crer la première ligne "row"
    // Boucle de lecture du tableau
    foreach ($contenu_dossier as $nom) {
        // Création d'une nouvelle ligne "row" toutes les 6 ligne
        if ($compteur == 6) {
            echo "</div><div class =\"row\">";
            $compteur = 0;
        }
        // Chache les dossier commençant par ".".
        if ($nom[0] == ".") {
            continue; // Rentre dans la boucle mais ignore la suite de la fonction jusqu'à ne plus trouvé de dossier commençant par "."
        }
        // Corrige les carractères spéciaux de la première variable par la deuxième variable.
        $espace = array(" ", "(", ")", "'");
        $anti_slash = array("\ ", "\(", "\)", "\'");
        $nom = str_replace($espace, $anti_slash, $nom);
        // Différencie la différence entre fichier et dossier avec un boolean.
        $file = is_dir($curent_path . $id . "/" . $nom);
        if ($file == true) {
            $font_fichier = "<i class=\"fa fa-folder-o fa-5x\" aria-hidden=\"true\"></i>";
        } else {
            $font_fichier = "<i class=\"fa fa-file-o fa-5x\" aria-hidden=\"true\"></i>";
        }
        echo "<div class=\"dossier text-center col-12 col-md-1 offset-md-1\" id = " . $nom . " > " .
                "<div>  $font_fichier </div> " .
                "<label>" . substr($nom, 0, 17) . "</label> <br> " .
                "</div>";
        //création de div avec class bootstrap     // Donne l'id        // Donne son icone         // Change le nbr de caractères affiché
        // incrémentation des compteurs de création de ligne.
        $compteur++;
        //echo $curent_path.$nom;
    }
}
?>

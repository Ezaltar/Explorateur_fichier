var nom_utilisateur = prompt("Veuillez taper votre nom d'utilisateur :");
nom_util();
fichier(); // Appelle de la fonction qui fait que ça marche.

function nom_util() {
        
        
        var newpath = $('#path').attr("placeholder") + "/" + nom_utilisateur;
        $('#path').attr("placeholder", newpath);

}

function fichier() {
        var path = $('#path').attr("placeholder");

        $.ajax({
                url : 'traitement.php', // cible de l'ajax.
                type : 'POST', // Méthode de récupération des données PHP.
                data : {
                        "function" : "fichier",
                        'path' : path
                }, // Clé et donné envoyé a
                // la page PHP.
                success : function(result) { // Les donnée renvoyées par PHP.
                        $(".fichier").html(result); // Affiche dans la class "fichier" situé
                        // dans le HTML.
                        $(".dossier").click(function() { // Fonction pour cliquer.
                                var id = $(this).attr("id");
                                click(id, path);// Récupère l'id des div crééer en PHP.
                        });
                }
        });
}

function click(id, path) {
        var curent_path = $("#path").attr('placeholder');
        var new_path = curent_path + "/" + id;
        $('#path').attr("placeholder", new_path);

        $.ajax({// Requète quand on à cliqué.
                url : 'traitement.php',
                type : 'POST',

                data : {
                        "function" : "fichier",
                        "id" : id,
                        'new_path' : new_path
                },
                success : function(result) {

                        $(".fichier").html(result);
                        $(".dossier").click(function() {
                                var id = $(this).attr("id");

                        });
                        fichier();
                }
        });
        
}

function retour() {

        var path = $('#path').attr("placeholder"); //stock "path" qui est égale à "/home".

        if (path == "/home" +"/"+ nom_utilisateur) { //condition pour empecher le retour.
                alert("retour impossible"); //action.
        }else{
             
                var fin_path = path.substr(-1, 1); // selectionne 1 caractère en partant de la fin

                while (fin_path != "/") { // condition de la boucle.
                        path = path.substring(0, path.length - 1); // retire 1 caractère à "path" 
                        fin_path = path.substr(-1, 1); // selectionne 1 caractère en partant de la fin
                }
                path = path.substring(0, path.length - 1); // elève le slash qui reste après l'opération de la boucle

                $.ajax({// Requète quand on à cliqué.
                        url : 'traitement.php',
                        type : 'POST',

                        data : {
                                "function" : "click",
                                'new_path' : path
                        },
                        success : function(result) {

                                $(".fichier").html(result);
                                $("#path").attr("placeholder", path);
                                fichier(); //rapelle de la fonction fichier.
                        }

                });
        }
}


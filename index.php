<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">


        <title> Explorateur de fichier</title>
        <!-- libaries css-->
        <link type="text/css" rel="stylesheet" href="libraries/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="libraries/font-awesome-4.7.0/css/font-awesome.css"/>

        <!-- libraries js -->        
        <script type="text/javascript" src="libraries/jQuery/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="libraries/tether/dist/js/tether.js"></script>
        <script type="text/javascript" src="libraries/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.js"></script>

        <!-- custom css  -->

        <link type="text/css" rel="stylesheet" href="style.css" />



    </head>

    <body class="couleur_body">

        <!-- navbar -->
        <div class="entete size_nav">
            <div class="container navbar1">
                <div class="row">
                    <button type="submit" id="retour" onclick="retour()" class=" radius couleur_bar police btn btn-secondary col-3"> Retour </button>              
                    <input class="radius couleur_bar police form-control col-9 " id="path" type="text" placeholder="/home">
                </div>    
            </div>

        </div>


        <!-- Dossiers/Fichiers -->

        <div class="container contenu padding">
            <p class="fichier"></p>


        </div>
        <script type="text/javascript" src="javascript.js"></script>

    </body>
 
</html>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Responsive design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Returns The Current PHP File Name  -->
        <title> 
            <?php echo basename($_SERVER['PHP_SELF'], '.php'); ?>   
        </title>

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <!-- Fichier CSS -->
        <link rel="stylesheet" href="public/css/style.css">

        <!-- Font Awesome 4.7 icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- Si utilisateur a désactivé Javascript sur son navigateur on utilise la balise <noscript>
        pour lui afficher le message d'erreur et pour cacher le contenu de notre page  -->
        <noscript>
            <h3>Veuillez activer Javascript sur votre navigateur pour afficher cette page correctement</h3> 
            <style>
                main {display:none;}
            </style>
        </noscript>
        
        <main>
            <!-- PAGE HEAD -->
            <header> 
                <div class="container-xl"> 
                    <!-- Logo Jarditou -->
                    <div class="row py-2">
                        <div class="col-sm-4 col-md-6">
                            <img src="public/image/jarditou_logo.jpg" class="img-fluid" id="pageLogo" alt="logo">
                        </div>
                        <div class="col-sm-8 col-md-6 mt-3 wrapper">
                            <p class="h4" id="pageSlogan"> La qualité depuis 70 ans </p>
                        </div>
                    </div>

                    <!-- Navigation Bar -->
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-info py-3 rounded">
                                <!-- Collapsing The Navigation Bar -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
                                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                                    <ul class="col-12 navbar-nav mr-auto mt-2 mt-lg-0 nav justify-content-center" style="font-size: xx-large">
                                        <li class="nav-item" style="margin-left: 50px;"> 
                                            <a href="index.php" class="nav-link"> <i class="fa fa-home" aria-hidden="true"></i> Acceuil <span class="sr-only">(current)</span> </a> 
                                        </li>
                                        <li class="nav-item" style="margin-left: 50px;"> 
                                            <a href="produits.php" class="nav-link"> <i class="fa fa-list" aria-hidden="true"></i> Produits </a> 
                                        </li>
                                        <li class="nav-item" style="margin-left: 50px;"> 
                                            <a href="about.php" class="nav-link"> <i class="fa fa-question-circle" aria-hidden="true"></i> A propos </a> 
                                        </li>
                                        <li class="nav-item" style="margin-left: 50px;"> 
                                            <a href="contact.php" class="nav-link"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Contact </a> 
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    
                    <!-- Image "Promotion sr lames de terrase" -->
                    <div class="row my-4">
                        <div class="col-12">
                            <img src="public/image/promotion.jpg" class="img-fluid w-100 rounded" alt="promotion">
                        </div>
                    </div>
                </div>    
            </header>
            <!-- PAGE HEAD END -->
    



    
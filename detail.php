<!-- PAGE HEAD -->
<?php
    //Récupération de l'identifiant "pro_id" passé en GET dans le fichier "index.php": <a href="detail.php?pro_id=<?php echo $row->pro_id">
    if(isset($_GET['pro_id']) && !empty($_GET['pro_id']) && is_numeric($_GET['pro_id']))
    {
        // La fonction "trim()" efface les espaces blancs au début et à la fin d'une chaîne.
        // La fonction "htmlspecialchars" rend inoffensives les balises HTML que le visiteur peux rentrer et nous aide d'éviter la faille XSS
        $pro_id = trim(htmlspecialchars((int)$_GET['pro_id']));  // Pour vérifier que $_GET['pro_id'] contient bien un nombre entier, on utilise (int) pour convertir la variable GET en type entier.
    }
    else
    {
        // Bootstrap CSS 4.5.3 import from CDN
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">';
        
        echo"<div class='container-fluid alert alert-danger mt-5' role='alert'>
                <div class='row text-center'>
                    <div class='col-12'>
                        <h3> Veuillez indiquer le numéro de produit ! </h3> 
                    </div> 
                </div>
            </div>";  

        header("refresh:2; url=index.php"); 
        exit;
    }  


    if (file_exists("header.php"))
    {
        include("header.php");
    }
    else
    {
        echo "file 'header.php' n'existe pas";
    }


    // Connection à la base de données 
    require "connection_bdd.php";

    // On construit la requête préparée SELECT en utilisant la méthode prepare(). Les requêtes préparées sont très utiles contre les injections SQL : 
    $requete = $db->prepare("SELECT * FROM produits WHERE pro_id=:pro_id");

    // Association des valeurs aux marqueurs via la méthode "bindParam()" :
    $requete->bindParam(':pro_id', $pro_id);

    // On exécute la requête :
    $requete->execute();

    // Si la requête renvoit un seul et unique résultat, on ne fait pas de boucle while, contrairement à la page index.php !
    // Ici c'est le cas, récupération du résultat de la requête

    $row = $requete->fetch(PDO::FETCH_OBJ);

    //libère la connection au serveur de BDD
    $requete->closeCursor(); 
?>


    <!-- PAGE MAIN CONTENT -->
    <div class="container-xl"> 
        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-8">
                <form  action="#"  method="GET">
                    <div class="text-center">
                        <label for="image"> </label> <br>
                        <img src="<?php echo "public/image/"; echo $row->pro_id; echo "."; echo $row->pro_photo ?>"  alt="produit" style="width:300px;">
                    </div>
                    <br><br>

                    <label for="reference"> Réference : </label> <br>
                    <input type="text"  name="ref_produit"  id="reference"  value=<?php echo $row->pro_ref?>  style="width:90%"  disabled>
                    <br><br>

                    <label for="categorie"> Catégorie : </label> <br>
                    <input type="text"  name="categorie_produit"  id="categorie"  value=<?php echo $row->pro_cat_id?>  style="width:90%"  readonly>
                    <br><br>

                    <label for="libelle"> Libellé : </label> <br>
                    <input type="text"  name="libelle_produit"  id="libelle"  value=<?php echo $row->pro_libelle?>  style="width:90%"  disabled>
                    <br><br>

                    <label for="description"> Description : </label> <br>
                    <input type="text"  name="description_produit"  id="description"  value=<?php echo $row->pro_description?>  style="width:90%"  readonly>
                    <br><br>

                    <label for="prix"> Prix : </label> <br>
                    <input type="text"  name="prix_produit"  id="prix"  value=<?php echo $row->pro_prix?>  style="width:90%"  disabled>
                    <br><br>

                    <label for="stock"> Stock : </label> <br>
                    <input type="text"  name="stock_produit"  id="stock"  value=<?php echo $row->pro_stock?>  style="width:90%"  disabled>
                    <br><br>

                    <label for="couleur"> Couleur : </label> <br>
                    <input type="text"  name="couleur_produit"  id="couleur"  value=<?php echo $row->pro_couleur?>  style="width:90%"  disabled>
                    <br><br>

                    <label for="bloque"> Produit bloqué ? : </label> <br>
                    <input type="radio"  name="bloque_produit"  id="bloque"  value=<?php echo $row->pro_bloque?>  disabled  checked> Oui
                    <input type="radio"  name="bloque_produit"  id="bloque"  value=<?php echo $row->pro_bloque?>  disabled> Non
                    <br><br>

                    <label for="ajout"> Date d'ajout : </label> <br>
                    <input type="text"  name="ajout_produit"  id="ajout"  value=<?php echo $row->pro_d_ajout?>  style="width:90%"  disabled>
                    <br><br>

                    <label for="modif"> Date de modification : </label> <br>
                    <input type="date"  name="modif_produit"  id="modif"  value=<?php echo $row->pro_d_modif?>  style="width:90%"  disabled>
                    <br><br>
                </form>

                <!--  Les boutons  RETOUR,  MODIFIER, SUPPRIMER et DECONNEXION  -->
                <div class="text-center">
                    <?php 
                        if(isset($_SESSION['login']))
                        {
                            echo'<a href="script_deconnexion.php"> 
                                    <button class="p-2 bg-primary text-light rounded"> Déconnecter </button> 
                                </a>';

                            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin")
                            {
                    ?>
                                <a href="modif.php?pro_id=<?php echo $row->pro_id ?>"> 
                                    <button class="py-2 px-4 bg-warning text-light rounded"> Modifier </button> 
                                </a>
                            
                                <a href="delete.php?pro_id=<?php echo $row->pro_id ?>">  
                                    <button class="py-2 px-3 mx-2 bg-danger text-light rounded"> Supprimer </button> 
                                </a>
                    <?php
                            }
                        }
                        else
                        {
                            echo'<a href="inscription.php" class="text-decoration-none"> 
                                    <button class="p-2 bg-dark text-light rounded"> Inscription </button> 
                                </a>';

                            echo'<a href="login.php" class="text-decoration-none"> 
                                    <button class="py-2 px-4 ml-3 bg-success text-light rounded"> Login </button> 
                                </a>'; 
                        }
                    ?> 
                </div>
            </div>
        </div>
    </div>


<!-- PAGE FOOT -->
<?php
    if (file_exists("footer.php"))
    {
        include("footer.php");
    }
    else
    {
        echo "file 'footer.php' n'existe pas";
    }

?>




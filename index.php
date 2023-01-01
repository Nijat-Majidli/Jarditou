<!-- PAGE HEAD -->
<?php
    if (file_exists("header.php"))
    {
        include("header.php");
    }
    else
    {
        echo "file 'header.php' n'existe pas";
    }
?>


<!-- PAGE MAIN CONTENT -->
<div class="container-xl"> 
    <div class="row">
        <?php
            // Connéxion à la base de données 
            require "connection_bdd.php";
            
            // On construit la requête SELECT : 
            $requete = "SELECT * FROM produits";

            // Exécution de la requête via la méthode query() et on met le résultat retourné dans une variable-objet $result
            $result = $db->query($requete)  or  die(print_r($db->errorInfo()));    // Pour repérer l'erreur SQL en PHP on utilise le code die(print_r($db->errorInfo()))     

            // Grace à la méthode rowCount() on peut compter le nombre de lignes retournées par la requête
            $nbLigne = $result->rowCount(); 
            
            if($nbLigne >= 1)
            {
                while ($row = $result->fetch(PDO::FETCH_OBJ))  // Grace à méthode fetch() on choisit le 1er ligne de chaque colonne et la mets dans l'objet $row
                {                                              // Avec la boucle "while" on choisit 2eme, 3eme, etc... lignes de chaque colonne et les mets dans l'objet $row
        ?>          
                    <div class="col-6 col-md-4 col-lg-3 my-3">
                        <div class="card">
                            <img class="card-img-top" src="public/image/<?php echo $row->pro_id; echo "."; echo $row->pro_photo ?>"  alt="imgproduit">
                            <div class="card-body text-center">
                                <h6 class="card-title"> <?php echo $row->pro_libelle; ?> </h6>
                                <p class="card-text"> <?php  echo $row->pro_prix; ?> € </p>
                                <a href="detail.php?pro_id=<?php echo $row->pro_id ?>" class="btn btn-primary"> Détail > </a>
                            </div>
                        </div>
                    </div>
        <?php
                }
        
                $result->closeCursor();  // Sert à finir proprement une série de fetch(), libère la connection au serveur de BDD
            }
        ?>
        
        <!--  Les boutons  INSCRIPTION  et  LOGIN  -->
        <div class="col-12 mt-5 text-center">
            <a href="inscription.php" class="text-decoration-none"> 
                <button class="p-2 bg-dark text-light rounded"> Inscription </button> 
            </a> 
            <a href="login.php" class="text-decoration-none"> 
                <button class="py-2 px-4 ml-3 bg-success text-light rounded"> Login </button> 
            </a> 
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

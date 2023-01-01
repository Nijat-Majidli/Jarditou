<?php
    session_start();  
    // ATTENTION! Il est impératif d'utiliser la fonction session_start() au début de chaque fichier PHP dans 
    // lequel on manipulera la variable superglobale $_SESSION et avant tout envoi de requêtes HTTP, c'est-à-dire avant tout 
    // echo ou quoi que ce soit d'autre : rien ne doit avoir encore été écrit/envoyé à la page web.

    if (file_exists("header.php"))
    {
        include("header.php");
    }
    else
    {
        echo "fichier 'header.php' n'existe pas";
    }
?>


<!-- PAGE MAIN CONTENT -->
<div class="container-xl">
    <div class="row my-5">
        <div class="col">
            <?php
                if (isset($_SESSION['role']) && $_SESSION['role']=='admin')
                {
                    echo '<div class="text-right">
                        <a href="ajout.php"> 
                            <button class="py-2 px-4 bg-success text-light rounded"> Ajouter </button> 
                        </a> 
                        <a href="script_deconnexion.php"> 
                            <button class="py-2 ml-2 bg-danger text-light rounded"> Déconnexion </button> 
                        </a> 
                    </div>';
                }
                else if (isset($_SESSION['role']) && $_SESSION['role']=='client')
                {
                    echo '<div class="text-right">
                        <a href="script_deconnexion.php"> 
                            <button class="py-2 ml-2 bg-danger text-light rounded"> Déconnexion </button> 
                        </a> 
                    </div>';
                }
                else
                {
                    echo '<div class="text-right">
                        <a href="ajout.php"> 
                            <button class="py-2 px-2 bg-dark text-light rounded"> Inscription </button> 
                        </a> 
                        <a href="script_deconnexion.php"> 
                            <button class="py-2 px-4 ml-2 bg-success text-light rounded"> Login </button> 
                        </a> 
                    </div>';
                }
            ?>
           
            <div class="table-responsive mt-3"> 
                <table class="table table-bordered table-striped"> 
                    <thead class="thead-light" >
                        <tr class="font-weight-bolder">
                            <th scope="col"> Photo </th>
                            <th scope="col"> Référence </th>
                            <th scope="col"> Libellé </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Prix </th>
                            <th scope="col"> Stock </th>
                            <th scope="col"> Couleur </th>
                            <th scope="col"> Date_d'ajout </th>
                            <th scope="col"> Date_modification </th>
                            <th scope="col"> Bloqué </th>
                        </tr>
                    </thead>
                    <tbody>         
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
                                <tr>
                                    <td class="table-warning"> 
                                        <img  src="public/image/<?php echo $row->pro_id; echo "."; echo $row->pro_photo ?>"  alt="imgproduit"  class="img-fluid"> 
                                    </td> 
                                    <td> <?php  echo $row->pro_ref; ?> </td>
                                    <td class="table-warning"> 
                                        <a href="detail.php?pro_id=<?php echo $row->pro_id ?>">  <?php echo $row->pro_libelle; ?>  </a>
                                    </td>
                                    <td> <?php  echo $row->pro_description; ?> </td>
                                    <td> <?php  echo $row->pro_prix; ?> </td>
                                    <td> <?php  echo $row->pro_stock; ?> </td>
                                    <td> <?php  echo $row->pro_couleur; ?> </td>
                                    <td> <?php  echo $row->pro_d_ajout; ?> </td>
                                    <td> <?php  echo $row->pro_d_modif; ?> </td>
                                    <td> <?php  echo $row->pro_bloque; ?> </td>
                                </tr>
                        <?php
                            }
                            
                            // Sert à finir proprement une série de fetch(), libère la connection au serveur de BDD
                            $result->closeCursor();
                        }
                        ?>
                    </tbody>  
                </table>
            </div>
        </div>
    </div> 
</div>

<!-- PAGE FOOT -->
<?php
    if (file_exists("header.php"))
    {
        include("footer.php");
    }
    else
    {
        echo "file 'footer.php' n'existe pas";
    }

?>


            
<?php 
    if (isset($this->session->login) && isset($this->session->role) && $this->session->role == "administrateur") 
    {
        echo '<h6 style="margin-left:20px"> Bonjour ',$this->session->role, ' ', $this->session->login, '<br> Vous êtes connecté ! </h6>' ;
    } 
    else    // Pas connecté
    {  
        redirect("Users/login");
    }
?>


<!-- Pour afficher toutes les erreurs en une seule fois via la fonction validation_errors(): -->
<?php echo validation_errors(); ?>  

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Link CSS file -->
        <link rel="stylesheet"  href="CodeIgniter/assets/css/CodeIgniter.css"> 

        <title> Ajouter </title>
    </head>

    
    <body>
        <!-- Formulaire Ajout -->

        <!-- Remarquez la modification de la balise d'ouverture du formulaire (echo form_open()) : ici on a ajouté "_multipart" à la fin pour upload d'un fichier.   
        La ligne "echo form_open_multipart()" génère le code suivant: <form action="http://localhost/ci/index.php/produits/ajouter" method="post">.
        La valeur de l'attribut action a été renseignée automatiquement et renvoie le formulaire vers le même contrôleur/méthode qui a affiché la vue; 
        ce qui signifie que la même méthode sera utilisée pour afficher et traiter le formulaire.
        Il est très important d'utiliser la fonction form_open() car elle applique des mécanismes de sécurité contre les failles XSS et CSRF -->
    
        <div class="container"  style="margin:50px 0 60px 220px">
            <?php echo form_open_multipart(); ?>   <!-- modification de la balise d'ouverture du formulaire  -->

                <div class="form-group">
                    <label for="photo"> Télécharger la photo du produit : </label>
                    <input type="file"  name="pro_photo"  id="photo"  class="form-control">
                </div> 

                <div class="form-group">
                    <label for="ref"> Référence : </label>
                    <input type="text"  name="pro_ref"  id="ref"  class="form-control"  value="<?php echo set_value('pro_ref'); ?>">     <!-- En cas d'erreur pour réafficher les valeurs du formulaire on va mettre dans l'attribut value de chaque champ la fonction set_value(), qui prend en argument l'attribut name-->
                    <?php echo form_error('pro_ref'); ?>   <!--Il est recommandé d'afficher le message d'erreur près du champ concerné avec la fonction form_error(); qui prend en argument le nom du champ (attribut name de l'input) -->
                </div> 
                
                <div class="form-group">
                    <label for="libelle"> Libellé : </label>
                    <input type="text"  name="pro_libelle"  id="libelle"  class="form-control"  value="<?php echo set_value('pro_libelle'); ?>">   
                    <?php echo form_error('pro_libelle'); ?>     
                </div>

                <div class="form-group">
                    <label for="categorie"> Categorie : </label>
                    <select id="categorie"  name="pro_cat_id"  class="form-control"> 
                        <?php
                            // Ici on récupere la clé 'categories' du tableau $aView qui se trouvent dans méthode ajouter() dans controlleur Produits.php
                            foreach ($categories as $row)  // Ici la clé est transformée en variable, on écrit $categories et non pas echo $aView["categories"]
                            {
                        ?>
                                <option value="<?php echo $row->cat_id ?>">  
                                    <?php echo $row->cat_nom ?>  
                                </option> 
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description"> Description : </label>
                    <input type="text"  name="pro_description"  id="description" class="form-control"  value="<?php echo set_value('pro_description'); ?>">   
                    <?php echo form_error('pro_description'); ?>  
                </div>

                <div class="form-group">
                    <label for="prix"> Prix : </label>
                    <input type="text"  name="pro_prix"  id="prix" class="form-control"  value="<?php echo set_value('pro_prix'); ?>">   
                    <?php echo form_error('pro_prix'); ?>  
                </div>

                <div class="form-group">
                    <label for="stock"> Stock : </label>
                    <input type="text"  name="pro_stock"  id="stock" class="form-control"  value="<?php echo set_value('pro_stock'); ?>">   
                    <?php echo form_error('pro_stock'); ?>  
                </div>

                <div class="form-group">
                    <label for="couleur"> Couleur : </label>
                    <input type="text"  name="pro_couleur"  id="couleur" class="form-control"  value="<?php echo set_value('pro_couleur'); ?>">   
                    <?php echo form_error('pro_couleur'); ?>  
                </div>
                
                <label for="bloque"> Produit bloqué ? :  </label>
                <div class="form-group"  style="margin-bottom: 50px">
                    <input type="radio"  name="pro_bloque"  id="bloque"  value="<?php echo set_value('pro_bloque'); ?>">  Oui 
                    <input type="radio"  name="pro_bloque"  id="bloque"  value="<?php echo set_value('pro_bloque'); ?>">  Non
                    <?php echo form_error('pro_bloque'); ?>  
                </div>

                <!-- Bouton AJOUTER  -->
                <!-- Pour voir le code de la fonction "verif" regardez tout en bas de la page -->
                <div>
                    <input type="submit"  value="Ajouter"  onclick="verif()"  style="float:left; margin-left:300px; padding:10px 30px; border-radius:10px; background-color:green; color:white"> 
                </div>
            </form>


            <!-- Les boutons ANNULER et DECONNEXION -->
            <a href="<?php echo site_url("produits/liste");?>">   <!-- On utilise la fonction site_url() pour écrire un lien -->
                <button style="margin-left:50px; padding:10px 30px; border-radius:10px; background-color:red; color:white"> Annuler </button> 
            </a> 

            <a href="<?php echo site_url("users/deconnexion");?>"> 
                <button style="margin:0 0 10px 50px; padding:10px 10px; border-radius:10px; background-color:blue; color:white"> Déconnexion </button> 
            </a> 
        </div>



        <!-- JavaScript Code de la fonction verif() -->
        <script>
            function verif()
            { 
                //Rappel : confirm() -> Bouton OK et Annuler, renvoie true ou false
                var resultat = confirm("Etes-vous certain de vouloir ajouter ce produit ?");

                //alert("retour :" + resultat);

                if (resultat==false)
                {
                    alert("Vous avez annulé les ajouts !");

                    //annule l'évènement par défaut 
                    event.preventDefault();    
                }
            }
        </script>


    </body>
</html>
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
<div class="container-xl my-5 py-5"> 
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8">
            <form  method="post"  action="script_login.php" autocomplete="off">
                <div class="form-group">
                    <label for="username"> Login <sup>*</sup> </label>
                    <input id="username" class="form-control" type="text" name="login" placeholder="Veuillez saisir votre idéntifiant" required>
                </div>
                <div class="form-group">
                    <label for="code"> Mot de passe <sup>*</sup> </label>
                    <input id="code" class="form-control" type="password" name="mdp" placeholder="Veuillez saisir votre mot de passe" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                </div>
                <!--  Le bouton ENTRER -->
                <div class="text-center my-5">
                    <input type="submit" value="Entrer" class="px-4 py-2 bg-success text-light rounded">
                </div> 
            </form>
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
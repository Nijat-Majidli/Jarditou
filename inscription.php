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
    <div class="row justify-content-center border border-info rounded mx-1 px-5 py-4">
        <div class="col-10">
            <p> <sup>*</sup> Ces zones sont obligatoires </p>
            <h1 class="pb-3"> Formulaire d'inscription </h1>
            
            <form  method="post" action="script_inscription.php" autocomplete="off">
                <div class="form-group">
                    <sup>*</sup> <label for="surname"> Nom </label>
                    <input id="surname" type="text" class="form-control" name="nom" onkeyup="verify(this)" required>
                </div>

                <div class="form-group">
                    <sup>*</sup> <label for="name"> Prénom </label>
                    <input id="name" type="text"  class="form-control" name="prenom" onkeyup="verify(this)" required>
                </div>

                <div class="form-group">
                    <sup>*</sup> <label for="mail"> Email </label>
                    <input id="mail" type="email" class="form-control" name="email" placeholder="dave.loper@afpa.fr" onblur="verify(this)" required>
                </div>

                <div class="form-group">
                    <sup>*</sup> <label for="username"> Login </label>
                    <input id="username" type="text" class="form-control" name="login" placeholder="Login doit contenir au moins 8 characters" onblur="verify(this)" required>
                </div>

                <div class="form-group">
                    <sup>*</sup> <label for="code"> Mot de passe </label>
                    <input id="code" type="password" class="form-control" name="mdp" placeholder="Mot de passe doit contenir au moins 8 characters" onblur="verify(this)" required>
                </div>

                <div class="form-group">
                    <sup>*</sup> <label for="confirmer"> Confirmer le mot de passe </label>
                    <input id="confirmer" type="password" class="form-control" name="mdp2" onblur="verify(this)" required>
                </div>

                <!-- bouton VALIDER -->
                <div class="text-center my-4">
                    <input type="submit" value="Valider" class="py-2 px-4 bg-success text-light rounded"> 
                </div>
            </form>
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

            
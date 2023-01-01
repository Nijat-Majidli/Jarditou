            <!-- PAGE FOOT -->
            <footer class="mt-5">
                <div class="container-xl"> 
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4" style="border-radius: 10px;">
                        <!-- Collapsing The Navigation Bar -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="col-12 navbar-nav" style="font-size:x-large">
                                <li class="nav-item" style="margin: 0 50px;">
                                <a class="nav-link" href="#"> Mentions légales <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item" style="margin: 0 50px;">
                                <a class="nav-link" href="#"> Horaires </a>
                                </li>
                                <li class="nav-item" style="margin: 0 50px;">
                                <a class="nav-link" href="#"> Plan du site </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </footer>
            <!-- PAGE FOOT END -->
        </main>

        
        <!-- Codes Javascript/jQuery  -->
        <script>
            // Page "inscription.php" 
            // La fonction verify() sert à vérifier les données saisies par utilisateurs dans le formulaire d'inscription
            function verify(par)
            {
                // On récupére la valeur de l'input:
                let data = $(par).val(); 

                // On récupére le contenu de la balise label:
                let elementLabel = $(par).prev().text().trim();

                // On crée un message d'erreur:
                let errorMessage = '<small style="color:red";>'+elementLabel+' n\'est pas valide !</small>';

                switch (elementLabel)
                {
                    case "Nom":
                        filtre = new RegExp("^[A-Za-z ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$");  // aprés A-Za-z on a ajouté un espace pour autoriser la saisi de l'espace blanc entre les mots
                        break;
                    case "Prénom":
                        filtre = new RegExp("^[A-Za-z ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$");  
                        break;
                    case "Email":
                        filtre = new RegExp("^[a-z0-9._ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+@[a-z]{2,}\.[a-z]{2,4}$");  
                        break;  
                    default:
                        filtre = new RegExp("^[A-Za-z0-9 ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ_&!§£@*',.$;-]{8,}$");  // vérifier le mot de passe
                        break;   
                };
                
                // Vérification la validité de format de tout les données saisi par utilisateur en utilisant la fonction test() de l'objet RegExp (filtre) qui renvoie True or False:      
                let resultat = filtre.test(data);

                if (resultat==true || data.length==0)  
                {
                    $(par).next().remove(); 
                }
                else if (resultat==false)  
                {
                    $(par).next().remove(); 
                    $(par).after(errorMessage); 
                }  


                // On vérifie si la valeur du champ "Mot de passe" est identique à la valeur du champ "Confirmer le mot de passe":
                let password = document.querySelector("#code").value;
                let confirmPassword = document.getElementById("confirmer").value;

                if(password.length>0 && confirmPassword.length>0 && password!=confirmPassword)
                {
                    let message = '<small style="color:red";> Les deux mots de passe ne sont pas identiques !</small>';
                    $(par).next().remove(); 
                    $(par).after(message); 
                }
            };
        </script>


        <!-- Fichier Javascript -->
        <script src="javascript.js"> </script>
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
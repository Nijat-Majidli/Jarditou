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
    <div class="row border border-info p-4 m-3">
      <div class="col">
          <p class="pt-3"> <sup>*</sup> Ces zones sont obligatoires </p>
          <h3 class="pb-3"> Vos Coordonnées </h3>
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput1"> Nom <sup>*</sup> </label>
              <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Veuillez saisir votre nom" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2"> Prénom <sup>*</sup> </label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Veuillez saisir votre prénom" required>
            </div>
          </form>

          <p> Sexe <sup>*</sup> </p>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" required>
            <label class="custom-control-label" for="customRadioInline1"> Féminin </label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" required>
            <label class="custom-control-label" for="customRadioInline2"> Masculin </label>
          </div>
          
          <form class="mt-4">
            <div class="form-group">
              <label for="formGroupExampleInput3"> Date de naissance <sup>*</sup> </label>
              <input type="date" class="form-control" id="formGroupExampleInput3" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput4"> Code postal <sup>*</sup> </label>
              <input type="text" class="form-control" id="formGroupExampleInput4" required>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput5"> Adresse </label>
              <input type="text" class="form-control" id="formGroupExampleInput5">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput6"> Ville </label>
              <input type="text" class="form-control" id="formGroupExampleInput6">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1"> Email <sup>*</sup> </label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="dave.loper@afpa.fr" required>
            </div>
          </form>
          <!-- Votre demande -->
          <h3> Votre demande </h3>
          <form>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Sujet</label>
              <select class="form-control" id="exampleFormControlSelect1">
                    <option> Veuillez sélectionner un sujet </option>
                    <option> Mes commandes </option>
                    <option> Question sur un produit </option>
                    <option> Réclamation </option>
                    <option> Autres </option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1"> Votre question <sup>*</sup> </label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1"> J'accepte le traitement de ce formullaire. </label>
            </div>
            <button type="submit" class="btn btn-success" onclick=controler()> Envoyer </button>
            <button type="reset" class="btn btn-danger"> Annuler </button>
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
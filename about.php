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
    <div class="row justify-content-center my-5 py-3" style="font-family:Arial, Helvetica, sans-serif">
        <div class="col-xl-10">
            <article> 
                <h3> L'entreprise </h3>
                <p> Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme. </p>
                <p> Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés. </p>
                <p> Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie </p>
            </article>  
            <br>
            <article> 
                <h3> Qualité </h3>
                <p> Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet. Vous serez séduit par notre expertise, nos compétences et notre sérieux. </p>
            </article> 
            <br>
            <article> 
                <h3> Devis gratuit  </h3>
                <p> Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum vitae dolore saepe est sequi, ipsam voluptatum accusantium officiis laboriosam praesentium vero, necessitatibus eos id commodi dolorem culpa facilis ab minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
            </article> 

            <!--  Les boutons  INSCRIPTION  et  LOGIN  -->
            <div class="text-center mt-5">
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

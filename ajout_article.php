<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>
<h1 class="titreajoutarticle">Ajouter un article</h1>
<form action="" method="POST" class="formajoutproduit" enctype="multipart/form-data">

    <div>
        <input type="text" id="ajouttitre" name="ajouttitre" placeholder="Titre" class="ajouttitre">
    </div>
    <div>
        <input type="text" id="ajoutcepage" name="ajoutcepage" placeholder="cepage" class="ajoutcepage">
        <input type="text" id="ajoutannee" name="ajoutannee" placeholder="année" class="ajoutannee">
    </div>
    <div>
        <input type="text" id="ajoutpays" name="ajoutpays" placeholder="Pays" class="ajoutpays">
        <input type="text" id="ajoutregion" name="ajoutregion" placeholder="région" class="ajoutregion">
    </div>
    <div>
    <textarea name="ajoutdescription" id="ajoutdescription" rows="8" cols="50">
      Ajoutez la description du produit
    </textarea>  
    </div>
    <div class="form-group">
        <input type="file" name="ajoutimg" id="ajoutimg" accept=".png,.jpeg,.jpg,.gif">
    </div>
    <button type="submit" name="submit-signup" class="btnajout">Ajout</button>
    <button type="submit" name="retour" class="btnretour2">Retour</button>
    <div class="imggrapes1"><img src="asset/img/grapes1.jpg" alt=""></div>


</form>
    


<?php 
    require('asset/footer.php');

?>
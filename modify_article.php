<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');
$sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
    ");
   $idids = ($_GET['id']);
   $idproduit = ($_GET['produitid']);
   $iddescription = ($_GET['descriptionid']);
   $idlocal = ($_GET['localid']);
var_dump($idproduit);

?>
   
<h1 class="titremodifyarticle">Modifier un article</h1>
<form action="modify_article_post.php" method="POST" id="formmodifyproduit" class="formmodifyproduit" enctype="multipart/form-data">

    <div>
        <input type="text" id="modifytitre" name="modifytitre" placeholder="Titre" class="modifytitre">
    </div>
    <div>
        <input type="text" id="modifycepage" name="modifycepage" placeholder="cepage" class="modifycepage">
        <input type="text" id="modifyannee" name="modifyannee" placeholder="année" class="modifyannee">
    </div>
    <div>
        <input type="text" id="modifypays" name="modifypays" placeholder="Pays" class="modifypays">
        <input type="text" id="modifyregion" name="modifyregion" placeholder="région" class="modifyregion">
    </div>
    <div>
    <textarea name="modifydescription" id="modifydescription" rows="8" cols="50">
      Ajoutez la description du produit
    </textarea>  
    </div>
    <div class="form-group">
        <input type="file" name="modifyimg" id="modifyimg" accept=".png,.jpeg,.jpg,.gif">
    </div>
    <input type="hidden" name ="idids" value="<?= $idids; ?> "/>
    <input type="hidden" name ="idproduit" value="<?=  $idproduit ; ?> "/>
    <input type="hidden" name ="localid" value="<?= $iddescription; ?> "/>
    <input type="hidden" name ="iddescription" value="<?= $idlocal;?> ">
    <input type="submit" name="btnmodify" class="btnmodify" value="modifier">
    
    <input type="submit" name="retour" class="btnretour3" value="Retour">
</form>

    <div class="imggrapes1"><img src="asset/img/grapes1.jpg" alt=""></div>


    

<?php 
    require('asset/footer.php');

?>
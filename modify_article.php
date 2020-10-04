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

   $sql2 = $db->query("SELECT * FROM `description` WHERE id = $iddescription");
   $rowdes = $sql2->fetch();

   $sql3 = $db->query("SELECT * FROM `local` WHERE id = $idlocal");
   $rowloc = $sql3->fetch();

   $sql4 = $db->query("SELECT * FROM `produit` WHERE id = $idproduit");
   $rowprod = $sql4->fetch();
?>
   <div class="gen">
<h1 class="titremodifyarticle">Modifier un article</h1>
<form action="modify_article_post.php" method="POST" id="formmodifyproduit" class="formmodifyproduit" enctype="multipart/form-data">

    <div>
        <input type="text" id="modifytitre" name="modifytitre" class="modifytitre" value="<?php echo $rowprod[1];?>">
    </div>
    <div>
        <input type="text" id="modifycepage" name="modifycepage" class="modifycepage" value="<?php echo $rowprod[2];?>">
        <input type="text" id="modifyannee" name="modifyannee" value="<?php echo $rowdes[1];?>" class="modifyannee"> 
    </div>
    <div>
        <input type="text" id="modifypays" name="modifypays" class="modifypays" value="<?php echo $rowloc[1];?>">
        <input type="text" id="modifyregion" name="modifyregion" class="modifyregion" value="<?php echo $rowloc[2];?>">
    </div>
    <div>
    <textarea name="modifydescription" id="modifydescription" rows="8" cols="50">
    <?php echo $rowdes[2];?>
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
</div>


    

<?php 
    require('asset/footer.php');

?>
<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');
    $id = $_GET['id'];
    $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
    ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);


?>
<h1 class="titremodifyarticle">Modifier un article</h1>
<form action="" method="POST" id="formmodifyproduit" class="formmodifyproduit" enctype="multipart/form-data">

    <div>
        <input type="text" id="modifytitre" name=modifytitre" placeholder="Titre" class="modifytitre">
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
    <input type="hidden" name ="id" value="<?php echo $id;?> ">
    <input type="submit" name="btnmodify" class="btnmodify" value="modifier">
    
    <input type="submit" name="retour" class="btnretour3" value="Retour">

    <div class="imggrapes1"><img src="asset/img/grapes1.jpg" alt=""></div>


</form>
    

<?php 
    require('asset/footer.php');

?>
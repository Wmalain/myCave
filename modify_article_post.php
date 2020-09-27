<?php 
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

$sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
    ");
$sql->setFetchMode(PDO::FETCH_ASSOC);

if(isset($_POST['btnmodify'])){

   $idids = ($_POST['idids']);
   $idproduit = ($_POST['idproduit']);
   $iddescription = ($_POST['iddescription']);
   $idlocal = ($_POST['localid']);


    $modifytitre = htmlspecialchars($_POST['modifytitre']);
    $modifycepage = htmlspecialchars($_POST['modifycepage']);
    $modifyannee = htmlspecialchars($_POST['modifyannee']);
    $modifypays = htmlspecialchars($_POST['modifypays']);
    $modifyregion = htmlspecialchars($_POST['modifyregion']);
    $modifydescription = htmlspecialchars($_POST['modifydescription']);
    $modifyimg = ($_FILES['modifyimg']);
    
    if($modifyimg['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($modifyimg['name'], '.'),1));
            
            if(in_array($check_ext, $valid_ext)){
    
            $imgname = uniqid() . '_' . $modifyimg['name'];
            $upload_dir = "./asset/uploads/";
            $upload_name = $upload_dir . $imgname;
            $move_result = move_uploaded_file($modifyimg['tmp_name'], $upload_name);
    
        
                if($move_result){
                    $sth1 = $db->prepare("UPDATE description SET annees=:modifyannee,description=:modifydescription,photo=:modifyimg WHERE id=$iddescription");
       
            $sth1->bindValue(':modifyannee',$modifyannee);
            $sth1->bindValue(':modifydescription',$modifydescription);
            $sth1->bindValue(':modifyimg',$imgname);

            $sth1->execute();
        

            $sth2 = $db->prepare("UPDATE local SET pays=:pays,region=:region WHERE id=$idlocal");
            $sth2->bindValue(':pays',$modifypays);
            $sth2->bindValue(':region',$modifyregion);
      
            $sth2->execute();

            $sth3 = $db->prepare("UPDATE produit SET nom=:modifytitre,cepage=:modifycepage WHERE id=$idproduit");
            $sth3->bindValue(':modifytitre',$modifytitre);
            $sth3->bindValue(':modifycepage',$modifycepage);
      
            $sth3->execute();

               

            header("Location:liste_article.php");
    
}
            }
    }
}

?>
    
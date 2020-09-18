<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

if(isset($_POST['submit-signup'])){
        
    $nom = htmlspecialchars ($_POST['nom']);
    $cepage = htmlspecialchars ($_POST['cepage']);
    $annees = htmlspecialchars ($_POST['annees']);
    $photo= $_FILES['photo'];
    $pays = htmlspecialchars ($_POST['pays']);
    $region = htmlspecialchars ($_POST['region']);
    $user_id = htmlspecialchars ($_SESSION['id']);
    $description = htmlspecialchars ($_POST['description']);
  
  

    if($photo['size'] <= 1000000){

        $valid_ext = array('jpg','jpeg','gif','png');
        $check_ext = strtolower(substr(strrchr($photo['name'], '.'),1));
        
        if(in_array($check_ext, $valid_ext)){

        $imgname = uniqid() . '_' . $photo['name'];
        $upload_dir = "./asset/uploads/";
        $upload_name = $upload_dir . $imgname;
        $move_result = move_uploaded_file($photo['tmp_name'], $upload_name);

    
            if($move_result){
                $sth = $db->prepare("INSERT INTO produit(nom,cepage) VALUES (:nom,:cepage)
                ");
                $sth->bindValue(':nom',$nom);
                $sth->bindValue(':cepage',$cepage);
                                   
                $sth->execute();


                $sth = $db->prepare("INSERT INTO local(pays,region) VALUES (:pays,:region)
                ");
                $sth->bindValue(':pays',$pays);
                $sth->bindValue(':region',$region);
                                   
                $sth->execute();


                $sth = $db->prepare("INSERT INTO description(annees,description,photo) VALUES (:annees,:description,:photo)
                ");
                $sth->bindValue(':annees',$annees);
                $sth->bindValue(':description',$description);
                $sth->bindValue(':photo',$imgname);
                                    
                $sth->execute();
                

                header("Location:ajout_article_post.php");

            }
        }
    }else{
        echo "vérifier le format ou le poid de votre photo";

    }
}
 
    ?>

<h1 class="titreajoutarticle">Ajouter un article</h1>
<form action="ajout_article.php" method="POST" class="formajoutproduit" enctype="multipart/form-data">

    <div>
        <input type="text" id="ajouttitre" name="nom" placeholder="Titre" class="ajouttitre">
    </div>
    <div>
        <input type="text" id="ajoutcepage" name="cepage" placeholder="cepage" class="ajoutcepage">
        <input type="text" id="ajoutannee" name="annees" placeholder="année" class="ajoutannee">
    </div>
    <div>
        <input type="text" id="ajoutpays" name="pays" placeholder="Pays" class="ajoutpays">
        <input type="text" id="ajoutregion" name="region" placeholder="région" class="ajoutregion">
    </div>
    <div>
    <textarea name="description" id="ajoutdescription" rows="8" cols="50">
      Ajoutez la description du produit
    </textarea>  
    </div>
    <div class="form-group">
        <input type="file" name="photo" id="ajoutimg" accept=".png,.jpeg,.jpg,.gif">
    </div>
    <button type="submit" name="submit-signup" class="btnajout">Ajout</button>
    <button type="submit" name="retour" class="btnretour2">Retour</button>
    <div class="imggrapes1"><img src="asset/img/grapes1.jpg" alt=""></div>


</form>
    


<?php 
    require('asset/footer.php');

?>
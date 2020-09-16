<?php 
require('asset/inc/connect.php');
require('asset/inc/function.php');

// if(!empty($_SESSION['id'])){
//     header ("Location:index.php?action=dc");
// }

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
                    

                    header("Location:ajout_article_post_2.php");

                }
            }
        }else{
            echo "vérifier le format ou le poid de votre photo";

        }
    }
     
        ?>


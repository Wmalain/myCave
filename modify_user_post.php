<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

if(isset($_POST['submit-modify-user'])){
   
    $prenom = ($_POST['firstname']);
    $nom = ($_POST['lastname']);
    $email = ($_POST['email']);
    $id = ($_POST['id']);
    

    
                $sth = $db->prepare("UPDATE users SET lastname=:nom,firstname=:prenom,email=:email WHERE id=$id");
                $sth->bindValue(':prenom',$prenom);
                $sth->bindValue(':nom',$nom);
                $sth->bindValue(':email',$email);
  

                $sth->execute();
                header("Location:liste_user.php");
        
}else{
        echo "erreur";
}
?>
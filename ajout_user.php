<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');



if (isset($_POST['submit-signup'])){
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);
    $roles = "2";


    if($sql = $db->query("SELECT * FROM users WHERE email = '$mail'")){
        $compteur = $sql->rowCount();
        if($compteur != 0){
            $message = "<div class ='alert1'> Il y a déja un compte possédant cet e-mail </div>";
        }elseif(!empty($mail) && !empty($mail)){
            if($password1 == $password2){
                $password1 = password_hash($password1, PASSWORD_DEFAULT);
                $sth = $db->prepare("INSERT INTO users (lastname, firstname, email, password, role) VALUES (:lastname, :firstname, :mail, :password1, :roles)");

                $sth->bindValue(':lastname',$lastname);
                $sth->bindValue(':firstname',$firstname);
                $sth->bindValue(':mail',$mail);
                $sth->bindValue(':password1',$password1);
                $sth->bindValue(':roles',$roles);


                
                if($sth->execute()){
                    $message = "<div class ='alert alert-success'> Votre compte a bien été crée </div>";
                }
            }else{
                $message = "<div class ='alert alert-danger'> Les mots de passes ne concordent pas </div>";
            }
        }else{
            $message = "<div class ='alert alert-danger'> Veuillez remplir les champs correspondants </div>";
        }
}else{
    $message = "<div class ='alert alert-danger'> Une erreur vient de se produire.</div>";
}
}
        ?>



<h1 class="titreajoutuser">Ajouter un Utilisateur</h1>


<form action="ajout_user.php" method="POST" class="formajoutuser">

    <div>
        <input type="text" id="lastname" name="lastname" placeholder="Nom" class="username">
        <input type="text" id="firstname" name="firstname" placeholder="Prénom" class="username">
    </div>
    <div>
        <input type="mail" id="mail" name="mail" placeholder="Mail" class="formuser">
    </div>
    <div>
        <input type="password" name="password1" class="form-control" id="password1" placeholder="Entrez votre mot de passe" class="formuser1">
    </div>
    <div>
        <input type="password" name="password2" class="form-control" id="password2" placeholder="confirmez votre mot de passe">
    </div>
    <button type="submit" name="submit-signup" class="btninscription">Inscription</button>
    <button type="submit" name="retour" class="btnretour">Retour</button>
    <div class="imggrapes"><img src="asset/img/grapes1.jpg" alt=""></div>
</form>


<?php 
    require('asset/footer.php');
?>
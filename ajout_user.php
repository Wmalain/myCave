<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>

<h1 class="titreajoutuser">Ajouter un Utilisateur</h1>


<form action="" method="POST" class="formajoutuser">

    <div>
        <input type="text" id="lastname" name="lastname" placeholder="Nom" class="username">
        <input type="text" name="firstname" placeholder="Prénom" class="username">
    </div>
    <div>
        <input type="mail" id="mail" name="mail" placeholder="Mail" class="formuser">
    </div>
    <div>
        <input type="password" name="password1" class="form-control" id="password1" placeholder="Entrez votre mot de passe" class="formuser1">
    </div>
    <div>
        <input type="password2" name="password2" class="form-control" id="password2" placeholder="confirmez votre mot de passe">
    </div>
    <button type="submit" name="submit-signup" class="btninscription">Inscription</button>
    <button type="submit" name="retour" class="btnretour">Retour</button>
    <div class="imggrapes"><img src="asset/img/grapes1.jpg" alt=""></div>
</form>














<?php 
    require('asset/footer.php');

?>
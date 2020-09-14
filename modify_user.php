<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>

<h1 class="titremodifyuser">Modifier un Utilisateur</h1>


<form action="" method="POST" class="formmodifyuser">

    <div>
        <input type="text" id="lastnamemodifiy" name="lastnamemodifiy" placeholder="Nom" class="usernamemodifiy">
        <input type="text" name="firstnamemodifiy" placeholder="Prénom" class="usernamemodifiy">
    </div>
    <div>
        <input type="mail" id="mailmodifiy" name="mailmodifiy" placeholder="Mail" class="formusermodifiy">
    </div>
    <button type="submit" name="submit-modify-user" class="btnmodify">modifier</button>
    <button type="submit" name="retour" class="btnretour">Retour</button>
    <div class="imggrapes1"><img src="asset/img/grapes1.jpg" alt=""></div>
</form>




<?php 
    require('asset/footer.php');

?>
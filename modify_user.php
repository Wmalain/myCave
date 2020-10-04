<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');
$id = $_GET['id'];
$sql = $db->query("SELECT * FROM `users` WHERE id = $id LIMIT 1");
$row = $sql->fetch();
?>
<div class="gen">
<h1 class="titremodifyuser">Modifier un Utilisateur</h1>


<form action="modify_user_post.php" method="POST" class="formmodifyuser">

    <div>
        <input type="text" id="lastnamemodifiy" name="lastname" value=" <?php echo $row[2];?>" class="usernamemodifiy">
        <input type="text" name="firstname" value="<?php echo $row[1];?>" class="usernamemodifiy">
    </div>
    <div>
        <input type="mail" id="mailmodifiy" name="email" value="<?php echo $row[3];?>" class="formusermodifiy">
    </div>
    <input type="hidden" name ="id" value="<?php echo $id; ?> "/>
    <input type="submit" class="btnmodify" name ="submit-modify-user" value="Modifier l'utilisateur"/>
    <input type="submit" name="retour" class="btnretour" value="Retour">

</form>
</div>

<?php 
    require('asset/footer.php');

?>
<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>


<h1 class="titreajoutuser">Liste des Utilisateur</h1>
<a class="alisteuser" href="ajout_user.php"><i class="fas fa-user-plus ajoutuser"></i></a>

<?php
$sql = $db-> query("SELECT * FROM users WHERE role = '2'");

$sql->setFetchMode(PDO::FETCH_ASSOC);
while($row = $sql->fetch()){
    ?>
    <div class="">
        <div class="">
            <p>nom : <?php echo $row['firstname'];?></p>
            <p>prénom : <?php echo $row['lastname'];?></p>
            <p>email: <?php echo $row['email'];?></p>
            <a href="delete_user.php?id=<?= $row['id']?>"><i class="fas fa-trash-alt"></i></a>
         
            <a href="modify_user.php?id=<?= $row['id']?>"><i class="fas fa-user-edit"></i></a>
        </div>
    </div>
    



<?php 
}
    require('asset/footer.php');
?>
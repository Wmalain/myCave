<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>
    <div class="divlistus">
        <h1 class="titreajoutuser">Liste des Utilisateur</h1>
    </div>

    <div class="divlistus2">
        <a class="alisteuser" href="ajout_user.php"><i class="fas fa-user-plus ajoutuser"></i></a>
    </div>

<?php
$sql = $db-> query("SELECT * FROM users WHERE role = '2'");

$sql->setFetchMode(PDO::FETCH_ASSOC);
while($row = $sql->fetch()){
    ?>
        <div class="listusersel">
            <div class="listusersel2">
            <p class="listuserp"> <?php echo $row['firstname'];?></p>
            <p class="listuserp"> <?php echo $row['lastname'];?></p>
            <p class="listuserp listdisplay"> <?php echo $row['email'];?></p>
        </div>
        <div>
            <a class="listusera" href="modify_user.php?id=<?= $row['id']?>"><i class="fas fa-user-edit"></i></a>
            <a class="listusera" href="delete_user.php?id=<?= $row['id']?>"><i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
        <div class="marg"></div>
<?php 
}
    require('asset/footer.php');
?>
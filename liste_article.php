<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');
?>
<div class="divlistus">
<h1 class="titrelistearticle">Liste des articles</h1>
</div>
<div class="divlistus2">
<a class="alistearticle" href="ajout_article.php"><i class="fas fa-wine-bottle ajoutuser"></a></i>
</div>
<?php

tabvin();

?>

  
<?php 
    require('asset/footer.php');
?>

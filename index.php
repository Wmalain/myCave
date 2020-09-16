<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');
?>
<p class="infocon">connexion admin : aaa@aaa.fr / modo: bbb@bbb.fr / mdp : aaa </p>

<h1 class="titreindex">Nos Produits</h1>


<div class="carousel">
<?php
vinafficheall();
?>
  </div>

 


<?php 
    require('asset/footer.php');
?>

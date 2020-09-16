<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>



<!-- fonction pour interdir l'accés au information au non connectés -->
<?php

    if (isset($_GET['id']) && !empty($_GET['id'])){ 
          
            vinaffiche();
    }
    else{
        header("Location:ajout_article_post_2.php");
    } 

        ?>




<?php 
    require('asset/footer.php');

?>
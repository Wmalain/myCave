<?php
require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');

?>


<div class="main">
<?php

    if (isset($_GET['id']) && !empty($_GET['id'])){ 
          
            vinaffiche();
    }
    else{
        header("Location:index.php");
    } 

        ?>

</div>


<?php 
    require('asset/footer.php');

?>
<?php


require('asset/inc/connect.php');
require('asset/inc/function.php');
require('asset/head.php');
require('asset/header.php');


 $id = $_GET['id'];
        $sth = $db->prepare("DELETE FROM users WHERE id = $id");
        $sth->execute();
        header("Location:liste_user.php");

        ?>
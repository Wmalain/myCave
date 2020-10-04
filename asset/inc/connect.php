<?php
    session_start();
//    fin de session pour déconnexion
     if (isset($_GET['logout'])){
         session_destroy();
         header ('Location:index.php');
     }
    // connexion a la bdd
    $servername = 'localhost'; $dbname='mycave';$user='root'; $pass='';
    try{
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $ex){
        echo "Error : " . $ex->getMessage();
    }
?>

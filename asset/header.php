<?php 
require('asset/inc/function.php');
if(isset($_POST['submit-login'])){
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_pass = htmlspecialchars($_POST['user_password']);
    $sql = $db->query("SELECT * FROM users WHERE email = '$user_email'");
    if($row = $sql->fetch()){
            $db_id = $row['id'];
            $db_email = $row['email'];
            $db_pass = $row['password'];
            $db_role = $row['role'];
        if(password_verify($user_pass,$db_pass)){
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;
            $_SESSION['role'] = $db_role;
            $message = "<div > Vous êtes bien connectés </div>";
            // header("Location:profile.php");
        }else{
            $message = "<div> Mot de passe incorrect.</div>";
        }
    }else{
        $message = "<div> Identifiant inconnu.</div>";
    }
}

?>
<header>
    
    <div class="divhead">
        <!-- LOGO -->
        <img class="logohead" src="asset/img/logo1.png" alt="logo">

    <!-- SECTION MODO -->
     <?php
        if (isset($_SESSION['email']) && $_SESSION['role'] == "2"){
        ?>
        <ul class="listadminhead">
        <li class="listadminhead1"><a href="#" class="linkadmin">Gérer Produit</a></li>
            <?php
                if (isset($_SESSION['email'])){
            ?>
            <li class="listadminhead1"><a href="?logout" class="linkadmin">Se déconnecter</a></li>
            </ul>
            <?php
        }
            ?>
        <?php
        // SECTION ADMIN
        }elseif (isset($_SESSION['email']) && $_SESSION['role'] == "1"){
        ?>
        <ul class="listadminhead">
            <li class="listadminhead1"><a href="#" class="linkadmin">Gérer utilisateur</a></li>
            <li class="listadminhead1"><a href="#" class="linkadmin">Gérer Produit</a></li>
            <?php 
                if (isset($_SESSION['email'])){
            ?>
                <li><a href="?logout" class="linkadmin">Se déconnecter</a></li>
                </ul>
            <?php } ?>
        <?php    
        }else{
        ?>
        <!-- SECTION CONNEXION -->
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formcon">
    
        <input class="formheadconnect" type="text" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail...">
        <input class="formheadconnect2" type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe...">
        <button type="submit" name="submit-login" class="btnconnecthead">Connexion</button>
    </div>
       

        

    </form>
        <?php   
 
        }
        ?>
        </nav>

</header>


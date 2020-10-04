<header>
<?php 

// formulaire de connexion
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

        }else{
            // si mdp inconnu
            ?> 
            <div> Mot de passe incorrect.</div>
        <?php }
    }else{
        // si mail inconnu
        ?>
        <div> Identifiant inconnu.</div>
<?php
    }
}

?>
    <div class="divhead">
        <!-- LOGO -->
        <a href="index.php"><img class="logohead" src="asset/img/logo1.png" alt="logo"></a>

    <!-- SECTION MODO autorisation limité -->
     <?php
        if (isset($_SESSION['email']) && $_SESSION['role'] == "2"){
        ?>
        <ul class="listadminhead">
        <li class="listadminhead1"><a href="liste_article.php" class="linkadmin">Gérer Produit</a></li>
            <?php
                if (isset($_SESSION['email'])){
            ?>
            <li class="listadminhead1"><a href="?logout" class="linkadmin">Se déconnecter</a></li>
            </ul>
            <?php
        }

            ?>
        <?php
        // SECTION ADMIN autorisation total
        }elseif (isset($_SESSION['email']) && $_SESSION['role'] == "1"){
        ?>
        <ul class="listadminhead">
            <li class="listadminhead1"><a href="liste_user.php" class="linkadmin">Gérer utilisateur</a></li>
            <li class="listadminhead1"><a href="liste_article.php" class="linkadmin">Gérer Produit</a></li>
            <?php 
                if (isset($_SESSION['email'])){
            ?>
                <li><a href="?logout" class="linkadmin">Se déconnecter</a></li>
                </ul>
            <?php } 
            ?>
        <?php    
        }else{
        ?>
        <!-- Si non connecté alors formulaire de connexion disponible -->
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


<?php
        //  function hydrateids($idproduit, $iddescription, $idlocal){
        //      global $db;
        //      $sth=$db->prepare("INSERT INTO ids (idproduit) VALUES (:idproduit)");
    

        //      $sth->bindValue(':idproduit',$idproduit);
        //      $sth->execute();

        //      $sth=$db->prepare("INSERT INTO ids (iddescription) VALUES (:iddescription)");
    

        //      $sth->bindValue(':iddescription',$iddescription);
        //      $sth->execute();
    
        //      $sth=$db->prepare("INSERT INTO ids (idlocal) VALUES (:idlocal)");
    

        //      $sth->bindValue(':idlocal',$idlocal);
        //      $sth->execute();
    
        //  }
?>

<?php
function vinafficheall(){
        global $db;
  
        $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
        ");

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $sql->fetch()){
            ?>
            <div class="">
                <div class="">
                    <p>Nom du vin : <?= $row['nom'];?></p>
                    <p>cépage : <?= $row['cepage'];?></p>
                    <p>pays : <?= $row['pays'];?></p>
                    <img src="asset/uploads/<?= $row['photo'];?>" alt="">
                    <a href="article.php?id=<?= $row['ids_id'];?>">Voir le produit</a>
                </div>
            </div>
        <?php
        }
}
?>


<?php
function vinaffiche(){
        global $db;
        $ids = $_GET['id'];

        
        $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id WHERE ids.id = $ids
        ");

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $sql->fetch()){
            ?>
            <div class="">
                <div class="">
                    <p>Nom du vin : <?= $row['nom'];?></p>
                    <p>année : <?= $row['annees'];?></p>
                    <p>cépage : <?= $row['cepage'];?></p>
                    <p>pays : <?= $row['pays'];?></p>
                    <p>région : <?= $row['region'];?></p>
                    <p>description : <?= $row['description'];?></p>
                    <img src="asset/uploads/<?= $row['photo'];?>" alt="">
                </div>
            </div>
        <?php
        }
    }

?>
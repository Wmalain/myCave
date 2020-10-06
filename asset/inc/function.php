

<?php
// affiche la totalité des vins
function vinafficheall(){
        global $db;
  
        $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
        ");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $sql->fetch()){
            ?>
            <div class="">
                <div class="vinafficheall">
                    <p></p><?php echo $row['nom'];?></p>
                    <p><?php echo $row['cepage'];?></p>
                    <p><?php echo $row['pays'];?></p>
                    <img class="vinafficheall imgvin" src="asset/uploads/<?php echo $row['photo'];?>" alt="">
                    <a href="article.php?id=<?php echo $row['ids_id'];?>">Voir le produit</a>
                </div>
            </div>
        <?php
        }
}
?>


<?php
// Affiche 1 fin en particulier grace a son id dans la table ids plus d'information utilisé pour la page de présentation d'un vin en particulier.
function vinaffiche(){
        global $db;
        $ids = $_GET['id'];

        
        $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id WHERE ids.id = $ids
        ");

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $sql->fetch()){
            ?>
            <div class="vinaffiche">
                <div class="">
                    <p class="pnom"><?php echo $row['nom'];?></p>
                        <div class="div2">
                            <div class="ance">
                                <p class="pann"><?php echo $row['annees'];?></p>
                                <p class="pcep"><?php echo $row['cepage'];?></p>
                            </div>
                            <div class="ance">
                                <p class="ppay"><?php echo $row['pays'];?></p>
                                <p class="pcep"><?php echo $row['region'];?></p>
                            </div>
                        </div>
                    <p class="pdes"><?php echo $row['description'];?></p>
                    <img src="asset/uploads/<?php echo $row['photo'];?>" alt="">
                </div>
            </div>
        <?php
        }
    }

?>

<?php

function tabvin(){
    // Tableau des vin pour la gestion de ces derniers.
        global $db;
  
        $sql = $db->query("SELECT *, produit.id AS produit_id, description.id AS description_id, local.id AS local_id, ids.id AS ids_id FROM ids LEFT JOIN produit ON ids.idproduit = produit.id LEFT JOIN description ON ids.iddescription = description.id LEFT JOIN local ON ids.idlocal = local.id 
        ");

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $sql->fetch()){
            ?>
            <div class="listusersel">
                <div class="listusersel2">
                    <p class="listuserp"><?php echo$row['nom'];?></p>
                    <p class="listuserp listdisplay"><?php echo $row['annees'];?></p>
                    <p class="listuserp listdisplay"><?php echo $row['pays'];?></p>
                </div>
                <div>
                    <a class="listusera" href="modify_article.php?id=<?php echo $row['ids_id'] . "&produitid=" . $row['produit_id'] . "&descriptionid=" . $row['description_id'] . "&localid=" . $row['local_id'] ?>"><i class="fas fa-edit"></i></a>
                   <a class="listusera" href="supr_article.php?id=<?php echo $row['ids_id'] . "&produitid=" . $row['produit_id'] . "&descriptionid=" . $row['description_id'] . "&localid=" . $row['local_id'] ?>"><i class="fas fa-trash-alt"></i></i></a>
                </div>
            </div>
        <?php
        }
}
?>
<?php
function suprArticle(){
    // Suppression d'un article en particulier
    global $db;
    $id = $_GET['id'];
    $idproduit = $_GET['produitid'];
    $iddescription = $_GET['descriptionid'];
    $idlocal = $_GET['localid'];

    $sth = $db->prepare("DELETE FROM produit WHERE id = :idproduit; 
        DELETE FROM local WHERE id = :idlocal;
        DELETE FROM description WHERE id = :descriptionid;
        DELETE FROM ids WHERE id = :idsid");
    
    $sth->bindValue(':idproduit',$idproduit,PDO::PARAM_INT);
    $sth->bindValue(':idlocal',$idlocal,PDO::PARAM_INT);
    $sth->bindValue(':descriptionid',$iddescription,PDO::PARAM_INT);
    $sth->bindValue(':idsid',$id,PDO::PARAM_INT);
    $sth->execute();
}
?>


<?php

Select * From { toutes les table}
Where client.code_fiscale=client_physique.code_fiscale. // ceci est une jointure entre table client et client physique
And { 2 eme jointure} 
And { 3eme jointure} 


$sth=$dbh->query("SELECT * FROM ids AS a LEFT JOIN produit AS b ON a.idproduit = b.id WHERE id_user=$id")

?>
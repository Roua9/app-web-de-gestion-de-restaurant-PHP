<?php
session_start();
include '../connexion.php';
$client=$_SESSION['id'];
$total=$_SESSION['panier'][1];
$date=date('y-m-d');
//creation du panier
$req_panier = $cnx -> prepare('INSERT INTO paniers (client,total,date_creation)
VALUES (:client, :total, :date)');
//execution requete panier
$req_panier->execute(array('client'=>$client,'total'=>$total, 'date'=>$date)); 
$panier_id=$cnx->lastInsertId();
$commandes=$_SESSION['panier'][3];
foreach($commandes as $commande){

    $quantite=$commande[0];
    $total=$commande[1];
    $id_produit=$commande[4];
//ajouter commande

$req = $cnx -> prepare('INSERT INTO commandes (quantite,total,panier,date_creation,date_modification,produit)
 VALUES (:quantite, :total, :panier, :date, :date, :produit)');
$req->execute(array('quantite'=>$quantite,'total'=>$total , 'panier'=>$panier_id , 'date'=>$date,'date'=>$date,
'produit'=>$id_produit));
}
//supprimer panier
$_SESSION['panier']=null;
header("location:../index.php");
?>
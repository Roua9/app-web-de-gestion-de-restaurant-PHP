<?php
session_start();

//tester si user est connecté
if(!isset($_SESSION['email'])){
    header('location:../login-client.php');
    exit();
}
include '../connexion.php';

$client=$_SESSION['id'];

$id_produit=$_POST['produit'];
$quantite=$_POST['quantite'];

$req = $cnx->prepare("SELECT prix , nom from ajout_pizza where id='$id_produit' ");
$req->execute(array()); 
$produit = $req->fetch(); 

$total=$quantite*$produit['prix'];

$date= date("y-m-d");
if(!isset($_SESSION['panier'])){// panier n'existe pas
$_SESSION['panier']=array($client , 0 , $date , array());// creation de panier
}
$_SESSION['panier'][1]+=$total;
$_SESSION['panier'][3][]= array($quantite , $total , $date , $date , $id_produit , $produit['nom'] );
 
header('location:../panier.php');
// ?>
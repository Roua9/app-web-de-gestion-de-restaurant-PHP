<?php
include 'connexion.php';
$id=$_GET['id'];
$rq = $cnx->prepare("DELETE from ajout_pizza where id=$id");
$rq->execute(array('id'=>$id)); 

if($rq){
    header("location: pizza.php");
}else{
    $erreur="erreur de suppression";
}


?>
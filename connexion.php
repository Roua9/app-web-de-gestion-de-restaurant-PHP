<?php
// Connexion à la bdd
$db_server = "127.0.0.1";
$db_username = "root";
$db_pwd = "";
$db_name = "restaurant";
/*$cnx = new PDO("mysql: host=$db_server; dbname=restaurant", $db_username, $db_pwd);*/

try 
{ 
$cnx = new PDO("mysql: host=$db_server; dbname=restaurant", $db_username, $db_pwd,  
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )); 
} 
catch(Exception $e) 
{ 
 die('Erreur : '.$e->getMessage()); 
}
?>
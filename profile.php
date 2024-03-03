<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Restaurent</title>
</head>

<body>
    <h1> bienvenue <?php echo $_SESSION['email']." ".$_SESSION['prenom'];  ?> </h1>

</body>
</html>

<?php
setcookie('pseudo',$_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
try
{
$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'phpmyadmin', 'sana15');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'message' => $_POST['message']
    ));
header('Location: minichat.php');
 ?>

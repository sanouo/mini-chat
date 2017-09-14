<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mini-Chat</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="favi.ico">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  </head>
  <body>

    <header>
      <h1>Mini-Chat</h1>
    </header>


    <form class="formu" action="minichat_post.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" id="formGroupExampleInput" name="pseudo"  value="<?php echo $_COOKIE['pseudo']; ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="formGroupExampleInput2" name="message" placeholder="message">
      </div>
      <button type="submit" value="Envoyer" class="btn btn-primary">Envoyer</button>
    </form>


<section class="info">


    <?php
    try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'phpmyadmin', 'sana15');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0, 10');
    while ($donnees = $reponse->fetch())
    {
    ?>


    <div class="message">
            <p><?php echo htmlspecialchars($donnees['pseudo']); ?> :
            <?php echo htmlspecialchars($donnees['message']); ?></p>
          </div>

    <?php
}
$reponse->closeCursor();
?>

</section>


  </body>
</html>

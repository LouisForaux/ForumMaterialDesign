<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 10:36
 */
include 'inc/bdd.php';
include 'functions.php'; ?>

<html>
<head>
    <title>Forum</title>
    <meta charset="utf8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

</head>
    <body>
    <?php include 'navbar.php' ?>
    <div class="row">


    <?php  $resultats=$connexion->query("SELECT * FROM categories");
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $resultat = $resultats->fetch() )
    {
    echo '  <div class="col s12 m4">  <div class="card horizontal">
      <div class="card-image">
        <img src="'.$resultat->image.'">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h5>'.$resultat->nom.'</h5>
          <p>'.$resultat->desc.'</p>
        </div>
        <div class="card-action">
          <a href="cat.php?id='.$resultat->id.'">Y aller</a>
        </div>
      </div>
    </div></div>';
    }
    $resultats->closeCursor();?></div>


    <?php include 'footer.php' ?>
    </body>
</html>

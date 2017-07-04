<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 14:37
 */
include "inc/bdd.php";
include "functions.php";
?>

<html>
<head>
    <title>Forum</title>
    <meta charset="utf8" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>

</head>
<body>
<?php include 'navbar.php'; ?>

<h3>Connexion</h3>
<div class="row">
    <form class="col s12 m11" action="process.connexion.php" method="post">
        <div class="row">
            <div class="input-field col s12 m6">
                <input type="text" id="textarea1" class="validate" name="username">
                <label for="textarea1">Pseudo</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="password" id="textarea1" class="validate" name="pass">
                <label for="textarea1">Mot de passe</label>
                <input type="submit"
                       style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                       tabindex="-1" />
            </div>
        </div>
    </form>
</div>

<?php include 'footer.php' ?>
</body>
</html>



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
<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 04/07/17
 * Time: 10:25
 */

//Connexion à la base de données
//(via PDO, utilisez la méthode de votre choix comme le type de base de données de votre choix)
$pdo = new PDO(
    'mysql:host=localhost;dbname=forum', 'forum', 'forum', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//On vérifie que l'utilisateur a bien envoyé les informations demandées
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    //On vérifie que password et password2 sont identiques
    if($_POST["password"] == $_POST["password2"]){
        //On utilise alors notre fonction password_hash :
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        echo $_POST["username"];
        echo $hash;
        //Puis on stock le résultat dans la base de données :
        $query = $pdo->prepare('INSERT INTO user (pseudo, password) VALUES(:username, :password)');
        $query->bindParam(':username', $_POST["username"]);
        $query->bindParam(':password', $hash);
        $query->execute();
        session_start();
        header('Location: connexion.php?inscription=ok');
        exit();
    }else { ?>
        <div class="row" id="alert_box">
            <div class="col s12 m12">
                <div class="card red darken-1">
                    <div class="row">
                        <div class="col s12 m10">
                            <div class="card-content white-text">
                                <p>Les mots de passe ne correspondent pas</p>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    <?php }
} else {
    ?>
    <div class="row" id="alert_box">
        <div class="col s12 m12">
            <div class="card red darken-1">
                <div class="row">
                    <div class="col s12 m10">
                        <div class="card-content white-text">
                            <p>1. Pseudo ne peut être vide</p>
                            <p>2. Mot de passe ne peut être vide</p>
                        </div>
                    </div>
                    <div class="col s12 m2">
                        <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="progress">
        <div class="indeterminate"></div>
    </div>

    <?php
}
?>
<?php include 'footer.php' ?>
</body>
</html>


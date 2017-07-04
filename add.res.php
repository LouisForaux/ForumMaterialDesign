<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 14:34
 */
include "inc/bdd.php";
include 'functions.php';

?>
<?php

//Connexion à la base de données
//(via PDO, utilisez la méthode de votre choix comme le type de base de données de votre choix)
$pdo = new PDO(
    'mysql:host=localhost;dbname=forum', 'forum', 'forum', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
session_start();
//On vérifie que l'utilisateur a bien envoyé les informations demandées
if(isset($_POST["reponse"])){
    //On vérifie que password et password2 sont identiques
        //Puis on stock le résultat dans la base de données :
        $query = $pdo->prepare('INSERT INTO reponses (id_sujet,id_user, content) VALUES(:id, :username, :content)');
        $query->bindParam(':username', $_SESSION["id"]);
        $query->bindParam(':content', $_POST["reponse"]);
        $query->bindParam(':id', $_GET["id"]);
        $query->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
        ?>
    <?php
} ?>
<?php include 'footer.php' ?>
</body>
</html>



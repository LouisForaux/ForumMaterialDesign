<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 14:41
 */
include 'inc/bdd.php';
session_start();
//Formulaire de connexion à la BDD

//Connexion à la base de données
//(via PDO, utilisez la méthode de votre choix comme le type de base de données de votre choix)
$pdo = new PDO(
    'mysql:host=localhost;dbname=forum', 'forum', 'forum', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//Nous vérifions que l'utilisateur a bien envoyé les informations demandées
if(isset($_POST["username"]) && isset($_POST["pass"])){
    //Nous allons demander le hash pour cet utilisateur à notre base de données :
    $query = $pdo->prepare('SELECT password,id FROM user WHERE pseudo = :username');
    $query->bindParam(':username', $_POST["username"]);
    $query->execute();
    $result = $query->fetch();
    $hash = $result["password"];
    $id = $result["id"];
    //Nous vérifions si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
    $correctPassword = password_verify($_POST["pass"], $hash);

    if($correctPassword){
        //Si oui nous accueillons l'utilisateur identifié
        echo "Bienvenu ".$_POST["username"];
        $_SESSION["pseudo"] = $_POST["username"];
        $_SESSION["id"] = $id;
        header('Location: index.php?connexion=ok');
    }else{
        //Sinon nous signalons une erreur d'identifiant ou de mot de passe
        echo "Désolé, mais ".$_POST['username']." est peut-être un mauvais nom d'utilisateur ou alors le mot de passe ne correspond pas à ce que nous avons dans notre base de données";
    }
} else {
    echo '<script>alert("Veuillez remplire tout les champs")</script>';
    header('Location: connexion.php');
}
?>
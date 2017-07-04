<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 04/07/17
 * Time: 12:06
 */
include "inc/bdd.php";
include "functions.php";

// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
?>
<?php

//Connexion à la base de données
//(via PDO, utilisez la méthode de votre choix comme le type de base de données de votre choix)
$pdo = new PDO(
    'mysql:host=localhost;dbname=forum', 'forum', 'forum', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
session_start();
//On vérifie que l'utilisateur a bien envoyé les informations demandées
if(isset($_POST["contenu"])) {
    //On vérifie que password et password2 sont identiques
    //Puis on stock le résultat dans la base de données :
    $query = $pdo->prepare('INSERT INTO topics (id_user, content, title, cat) VALUES( :username, :content, :title, :cat)');
    $query->bindParam(':username', $_SESSION["id"]);
    $query->bindParam(':content', $_POST["contenu"]);
    $query->bindParam(':title', $_POST["title"]);
    $query->bindParam(':cat', $_GET["id"]);
    $query->execute();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}?>

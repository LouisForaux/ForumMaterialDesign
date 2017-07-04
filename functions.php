<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 11:22
 */
function pseudo_id($m) {
    require 'inc/bdd.php';
    // query
    $result = $connexion->prepare("SELECT pseudo FROM user WHERE id= :hjhjhjh");
    $result->bindParam(':hjhjhjh', $m);
    $result->execute();
    $rows = $result->fetch(PDO::FETCH_NUM);
    $pseudo = $rows[0];
    return($pseudo);
}
function pp($m) {
    require 'inc/bdd.php';
    // query
    $result = $connexion->prepare("SELECT picture FROM user WHERE id= :hjhjhjh");
    $result->bindParam(':hjhjhjh', $m);
    $result->execute();
    $rows = $result->fetch(PDO::FETCH_NUM);
    $pseudo = $rows[0];
    return($pseudo);
}
?>
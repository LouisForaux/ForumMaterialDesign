<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 11:14
 */
$VALEUR_hote='localhost';
$VALEUR_port='3306';
$VALEUR_nom_bd='forum';
$VALEUR_user='forum';
$VALEUR_mot_de_passe='forum';
$connexion = new PDO('mysql:host='.$VALEUR_hote.';port='.$VALEUR_port.';dbname='.$VALEUR_nom_bd, $VALEUR_user, $VALEUR_mot_de_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>
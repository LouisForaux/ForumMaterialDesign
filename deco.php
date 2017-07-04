<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 04/07/17
 * Time: 14:03
 */
session_start();
session_destroy();
header('Location: index.php');
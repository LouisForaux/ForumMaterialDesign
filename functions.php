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

<!-- License server : to get a free license server domain, please send to louis@droid-center.cf : The domain and your name.
If you don't do this, the script return an error 7 days after the first load of the page-->

<?php /**
 * Unreal Security - PHPMyLicense Check Class v2.5.0
 *
 * PHP version > 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @package    PHPMyLicense
 * @author     Giovanne Oliveira <jhollsantos@gmail.com>
 * @copyright  2009 - 2015 PHPMyLicense
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    v3.0.0
 * @link       https://phpmylicense.com */

$domain=$_SERVER['SERVER_NAME'];
$product="1";
$licenseServer = "https://droid-center.fr/license/api/";

$postvalue="domain=$domain&product=".urlencode($product);

$ch = curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $licenseServer);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvalue);
$result= json_decode(curl_exec($ch), true);
curl_close($ch);

if($result['status'] != 200) {
    $html = "<div align='center'>
    <table width='100%' border='0' style='padding:15px; border-color:#F00; border-style:solid; background-color:#FF6C70; font-family:Tahoma, Geneva, sans-serif; font-size:22px; color:white;'>

    <tr>

        <td><b>You don't have permission to use this product. The message from server is: <%returnmessage%> <br > Contact the product developer.</b></td >

    </tr>

    </table>

</div>";
    $search = '<%returnmessage%>';
    $replace = $result['message'];
    $html = str_replace($search, $replace, $html);


    die( $html );

}
?>
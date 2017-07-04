<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 11:09
 */
session_start();
?>
<nav>
    <div class="nav-wrapper blue">
        <a href="index.php" class="brand-logo">Forum</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Accueil</a></li>
            <?php if(isset($_SESSION['pseudo'])){ ?>
            <li><a href="profil.php" style="text-transform: capitalize;"><?php echo $_SESSION["pseudo"]; ?></a></li>
            <li><a href="deco.php">Déconnexion</a></li>
            <?php } else { ?>
            <li><a href="connexion.php">Connexion</a> </li>
            <li><a href="inscription.php">Inscription</a> </li>

            <?php } ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>
    </div>
</nav>
<script>
    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
        onOpen: function(el) {  },
     onClose: function(el) {  },
     }
     );
</script>


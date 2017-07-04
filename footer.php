<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 11:11
 */

?>

<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Forum</h5>
                <p class="grey-text text-lighten-4">&copy;Team 42 2017</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Derniers Topics</h5>
                <ul>
                    <?php  $resultats=$connexion->query("SELECT * FROM topics ORDER BY id desc LIMIT 0,4");
                    $resultats->setFetchMode(PDO::FETCH_OBJ);
                    while( $resultat = $resultats->fetch() )

                    { ?>
                            <li><a class="grey-text text-lighten-3" href="sujet.php?id=<?php echo $resultat->id; ?>"><?php echo $resultat->title; ?></a></li>
                    <?php }
                    $resultats->closeCursor();?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            ©2017 Team 42
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>


<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 14:21
 */
session_start();
if($_SESSION['pseudo']) {
if($type=="reponse") { ?>
    <div class="row">
        <form class="col s12 m11" action="add.res.php?id=<?php echo $_GET['id']; ?>" method="post">
            <div class="row">
                <div class="input-field col s12 m11">
                    <textarea id="textarea1" class="materialize-textarea" data-length="1500" name="reponse"></textarea>
                    <label for="textarea1">Répondre au sujet "<?php echo $title; ?>"</label>
                </div>
                <div class="input-field col s12 m1">
                    <input type="submit" value="Envoyer la réponse" class="btn blue darken-4"/>
                </div>
            </div>
        </form>
    </div>

<?php } else {
    if($type=="sujet") { ?>
        <div class="row">
        <form class="col s12 m10" action="add.sujet.php?id=<?php echo $_GET['id']; ?>" method="post">
            <div class="row">
                <div class="input-field col s12 m11">
                    <input id="titre" type="text" class="validate" name="title">
                    <label for="titre">Titre du nouveau sujet</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m11">
                    <textarea id="textarea1" class="materialize-textarea" data-length="1500" name="contenu"></textarea>
                    <label for="textarea1">Contenu du nouveau sujet</label>
                </div>
                <div class="input-field col s12 m1">
                    <input type="submit" value="Poster le sujet" class="btn blue darken-4"/>
                </div>
            </div>
        </form>
    </div>
        <?php
    }

} } else {
    echo '
    <div class="card-panel">
      <span class="blue-text text-darken-2">Veuillez vous connecter pour répondre</span>
    </div>';
} ?>
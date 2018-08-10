<section id="home">
 <div class="home-container">
        <div class="row">
            <div class="col-xs-12">
                <h1><?php echo $post->titre; ?></h1>
            </div>
        </div>
        <div class="row col-sm-8 col-xs-12">
            <form method="post" action="<?php echo ADMIN_URL; ?>home/modifier/<?php echo $post->id; ?>">
                <?php
                if(isset($erreur)) :
                if($erreur) :
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="message erreur"><?php echo $erreur; ?></div>
                    </div>
                </div>
                <?php
                else :
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="message confirmation">Votre article a été modifié !</div>
                    </div>
                </div>
                <?php
                endif;
                endif;
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" name="titre" placeholder="Titre *" value="<?php echo $post->titre; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <textarea name="contenu" placeholder="Corps de l'article *"><?php echo str_replace("<br />", "", $post->contenu); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" value="Modifier!">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
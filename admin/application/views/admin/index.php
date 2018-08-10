<section id="home">
    <div class="home-container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Publier un article !</h1>
            </div>
        </div>
        <div class="row col-sm-8 col-xs-12">
            <form method="post" action="<?php echo ADMIN_URL; ?>home/post" enctype="multipart/form-data">
                <?php
                if(isset($erreurs)) :
                if($erreurs) :
                foreach($erreurs as $erreur) :
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="message erreur"><?php echo $erreur; ?></div>
                    </div>
                </div>
                <?php
                endforeach;
                else :
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="message confirmation">Votre article a été publié !</div>
                    </div>
                </div>
                <?php
                endif;
                endif;
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="titre" placeholder="Titre *" value="<?php if(isset($_POST["titre"])) echo $_POST["titre"]; ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="file" name="file">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <textarea name="contenu" placeholder="Corps de l'article *"><?php if(isset($_POST["contenu"])) echo $_POST["contenu"]; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" value="Post!">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        jQuery(".home").addClass('menu-active');
    });
</script>
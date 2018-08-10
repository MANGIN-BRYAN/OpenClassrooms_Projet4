<section id="home">
    <div class="home-container article-container">
     <div class="container article">
      <div class="row">
            <form method="post" action="<?php echo URL; ?>home/search">
                <div class="col-sm-10">
                    <input type="text" name="query" placeholder="Rechercher un article...">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="button pressed" value="OK!">
                </div>
            </form>
        </div>
        <div class="row">
            <article>
                <div class="col-sm-5">
                    <img src="<?php echo ASSEST_URL; ?>public/img/<?php echo $article->image; ?>" alt="<?php echo $article->image; ?>">
                </div>
                <div class="col-sm-7">
                    <p class="date">Posted <time datetime="<?php echo $article->publication; ?>"><?php echo formattage_date($article->publication); ?></time></p>
                    <h4><?php echo $article->titre; ?></h4>
                    <p><?php echo $article->contenu; ?></p>
                </div>
            </article>
        </div>
    </div>
</section>
    <div class="container commentaires">
        <div class="row">
            <div class="col-xs-12">
                <h3>Commentaires (<?php echo $nb_commentaires; ?>)</h3>
            </div>
        </div>
        <?php
        foreach($commentaires as $commentaire) :
        ?>
        <div class="row commentaire">
            <div class="col-xs-12">
                <p class="date">Publié par <?php echo $commentaire->pseudo; ?> le <time datetime="<?php echo $commentaire->publication; ?>"><?php echo formattage_date($commentaire->publication); ?></time> :</p>
                <p><?php echo $commentaire->commentaire; ?></p>
            </div>
        </div>
        <?php
        endforeach;
        if(isset($_SESSION["membre"])) :
        ?>
        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="<?php echo URL; ?>home/commenter/<?php echo $article->id; ?>">
                    <?php
                    if(isset($erreur)) :
                    if($erreur) :
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message erreur"><?= $erreur ?></div>
                        </div>
                    </div>
                    <?php
                    else :
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message confirmation">Votre commentaire a été publié</div>
                        </div>
                    </div>
                    <?php
                    endif;
                    endif;
                    ?>
                    <textarea name="commentaire" placeholder="Votre commentaire *"></textarea>
                    <input type="submit" value="Commenter">
                </form>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
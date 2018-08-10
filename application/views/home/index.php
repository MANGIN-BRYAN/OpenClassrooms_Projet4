	<section id="home">
	    <div class="home-container">
	      <h1>Bienvenue sur mon blog</h1>
	      <h2>Ce blog est encore en construction</h2>
	      <a href="#about" class="btn-get-started">Commençons</a>
	    </div>
	</section><!-- #home -->

	    <div class="container article">
        <div class="row">
            <form method="post" action="<?php echo URL; ?>home/search">
                <div class="col-sm-10">
                    <input type="text" name="query" placeholder="Rechercher un article..." value="<?php if(isset($_POST["query"])) echo $_POST["query"] ?>">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="pressed button" value="OK!">
                </div>
            </form>
        </div>
        
        <?php
                    if(isset($_POST["query"])) :
        ?>
        
        <div class="row">
            <div class="col-xs-12">
                <h1>Les résultats de votre rechercher avec "<?= $_POST["query"] ?>"</h1>
            </div>
        </div>
        <?php
        endif;
        ?>
        <div class="row">
            
            <?php
                foreach($articles as $article) :
            ?>
            
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="<?php echo ASSEST_URL; ?>public/img/<?php echo $article->image; ?>" alt="<?php echo $article->image; ?>">
                    <p class="date">Publié <time datetime="<?php echo $article->publication; ?>"><?php echo formattage_date($article->publication); ?></time></p>
                    <h1><?php echo $article->titre; ?></h1>
                    <p><?php echo $article->accroche; ?>...</p>
                    <a href="<?php echo URL; ?>home/get/<?php echo $article->id; ?>">Lire l'article</a>
                </article>
            </div>
            
            <?php
                 endforeach;
            ?>

        </div>
       
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            jQuery(".home").addClass('menu-active');
        });
    </script>
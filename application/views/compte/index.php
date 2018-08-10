 <section id="home">
    <div class="home-container hero-container">
      <div class="row">
            <div class="col-xs-12">
                <h1>Welcome <?php echo $infos->pseudo; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>Email : <?php echo $infos->email; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1>Last comments !</h1>
            </div>
        </div>
        <?php
        foreach($commentaires as $commentaire) :
        ?>
        <div class="row commentaire">
            <div class="col-xs-12">
                <p class="date">Posted on the article "<?php echo $commentaire->titre; ?>" le <time datetime="<?php echo $commentaire->publication; ?>"><?php echo formattage_date($commentaire->publication); ?></time> :</p>
                <p><?php echo $commentaire->commentaire; ?></p>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
  </section><!-- #hero -->
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            jQuery(".account").addClass('menu-active');
        });
    </script>
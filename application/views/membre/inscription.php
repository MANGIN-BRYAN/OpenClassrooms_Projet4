  <section id="home">
    <div class="home-container">
       <div class="row">
            <div class="col-sm-12">
                <h3>Inscription sur MY SUPER BLOG !</h3>
            </div>
        </div>
        <div class="row col-sm-6 col-xs-12">
        <form method="post" action="<?php echo URL; ?>inscription/register">
            <?php
            if(isset($erreurs)) :
            if($erreurs) :
            foreach($erreurs as $erreur) :
            ?>
            <div class="row">
                <div class="message erreur"><?php echo $erreur ?></div>
            </div>
            <?php
            endforeach;
            else :
            ?>
            <div class="row">
                <div class="message confirmation">Votre inscription a été prise en compte!</div>
            </div>
            <?php
            endif;
            endif;
            ?>
            <div>
                <input type="text" name="pseudo" placeholder="Pseudo *" value="<?php if(isset($_POST["pseudo"])) echo $_POST["pseudo"] ?>">
            </div>
            <div>
                <input type="text" name="email" placeholder="Email *" value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>">
            </div>
            <div>
                <input type="text" name="emailconf" placeholder="Vérification de l'Email *" value="<?php if(isset($_POST["emailconf"])) echo $_POST["emailconf"] ?>">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de Passe *">
            </div>
            <div>
                <input type="password" name="passwordconf" placeholder="Vérification du Mot de passe *">
            </div>
            <div>
                <input type="submit" class="button pressed" value="Je veux m'abonner!">
            </div>
        </form>
    </div>
    </div>
  </section><!-- #hero -->

    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            jQuery(".register").addClass('menu-active');
        });
    </script> 
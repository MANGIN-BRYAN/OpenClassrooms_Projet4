 <section id="home">
    <div class="home-container">
      <div class="row">
        <h3>LogIn !</h3>
    </div>
    <div class="row col-sm-6 col-xs-12">
        <form method="post" action="<?php echo URL; ?>connexion/login">
            <?php
            if(isset($erreur)) :
            ?>
            <div>
                <div class="col-sm-12">
                    <div class="message erreur"><?= $erreur ?></div>
                </div>
            </div>
            <?php
            endif;
            ?>
            <div>
                <input type="text" name="pseudo" placeholder="Pseudo *" value="<?php if(isset($_POST["pseudo"])) echo $_POST["pseudo"] ?>">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe *">
            </div>
            <div>
                <input type="submit" class="button pressed" value="Me connecter!">
            </div>
        </form>
    </div>
    </div>
  </section><!-- #hero -->

    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            jQuery(".login").addClass('menu-active');
        });
    </script>
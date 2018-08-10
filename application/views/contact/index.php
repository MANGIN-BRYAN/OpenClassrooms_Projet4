<section id="home">
    <div class="home-container contact-container">
      <div class="row">
            <div class="col-xs-12">
                <h3>Contact me !</h3>
            </div>
        </div>
      <div class="row col-sm-8 col-xs-12">
        <form method="post" action="<?php echo URL; ?>contact/sendContact">
            
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
                    <div class="message confirmation">Votre message has been sent !</div>
                </div>
            </div>
            
                <?php
                     endif;
                     endif;
                ?>
            
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="nom" placeholder="Your name *" value="<?php if(isset($_POST["nom"])) echo $_POST["nom"] ?>">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="email" placeholder="Your email *" value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="texte" placeholder="How can I help you ? *"><?php if(isset($_POST["texte"])) echo $_POST["texte"] ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" value="Send!">
                </div>
            </div>
        </form>
      </div>
    </div>
  </section>
  <script type="text/javascript">
      jQuery(document).ready(function( $ ) {
          jQuery(".contact").addClass('menu-active');
      });
  </script>
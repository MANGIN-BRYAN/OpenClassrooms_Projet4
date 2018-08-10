 <section id="home">
    <div class="home-container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Anciens articles !</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table>
                    <?php
                    foreach($posts as $post) :
                    ?>
                    <tr>
                        <td><?php echo $post->titre; ?></td>
                        <td><a href="<?php echo ADMIN_URL; ?>home/get/<?php echo $post->id; ?>"  class="glyphicon glyphicon-pencil"></a></td>
                        <td><a href="<?php echo ADMIN_URL; ?>home/supprimer/<?php echo $post->id; ?>" class="glyphicon glyphicon-remove"></a></td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        jQuery(".posts").addClass('menu-active');
    });
</script>
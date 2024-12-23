<?php
/*
Template Name: Empty Page Template
*/
?>

<?php get_header( 'custom' ); ?>

<div class="content">
    <?php
    // Just output content without any other conditions
    the_content();
    ?>
</div>

<?php

get_footer( 'custom' );

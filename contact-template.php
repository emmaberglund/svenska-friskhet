<?php
/* Template Name: Kontakt*/

get_header();

?>
<?php global $post; ?>
<div class="header-image-page" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header-image-page')[0]; ?>);">
    <h1 class="header-text-news"><?php echo get_the_title(); ?></h1>
</div>
<div class="container">
    <div class="contact-container">
        <?php
        if(have_posts()) :
            while (have_posts()) : the_post();
            ?>

            <div class="row">
                <div class="twelve columns text-divider3">
                    <p><?php the_content();?></p>
                </div>
            </div>
            <div class="row contact-info contact-form">
                <div class="four columns contact">
                    <?php dynamic_sidebar('Address'); ?>
                </div>

                    <div class="four columns contact">
                        <?php dynamic_sidebar('Email'); ?>
                    </div>


                    <div class="four columns contact">
                        <?php dynamic_sidebar('Phone'); ?>
                    </div>

            </div>
            <div class="row fixed-image-section">
                <div class="picture-divider">
                    <div class="fixed-image">
                        <?php
                        $content = get_the_content();
                        //get the images and print them
                        $images = get_the_images($content);
                        if (isset($images)) {
                            foreach($images as $image) {
                                if(isset($image[0])){
                                    echo $image[0];
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>

            <?php

        endwhile;

        else :
            echo "No content available!";

        endif;

        get_footer(); ?>

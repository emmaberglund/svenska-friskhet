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

            <div class="row" style="display: flex;justify-content: center;">
                <div class="twelve columns text-divider3">
                    <p><?php the_content();?></p>
                </div>
            </div>

            <?php
            // Get the page as an Object
            $contact =  get_page_by_title('Kontakt');


            //replace post_parent value with your portfolio page id:
            $args=array(
                'post_type' => 'page',
                'post_parent' => $contact->ID,
                'post_status' => 'publish',
                'posts_per_page' => 3
            );

            $my_query = null;
            $my_query = new WP_Query($args);
            ?>
            <div class="news-container contact-boxes">
            <?php
                //echo "<pre>"; print_r($my_query); echo "</pre>";
                if( $my_query->have_posts() ) { ?>
                    <div class="row">
                    <?php echo''; // Här kan man skriva en rubrik
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <div class="three columns news">
                                <div class="news-image" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($page['ID']), 'large')[0]; ?>);"></div>
                                <!-- <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                                    <path d="M0,0C0,0,0,180,0,180C0,180,90,130,90,130C90,130,180,180,180,180C180,180,180,0,180,0C180,0,0,0,0,0" style="fill:#ffffff"></path>
                                    <path d="M0,0C0,0,0,50,0,50C0,50,90,70,90,70C90,70,180,50,180,50C180,50,180,0,180,0C180,0,0,0,0,0" style="fill:#ffffff"></path>
                                    <desc>Created with Snap</desc><defs></defs></svg> -->
                                <div class="caption">
                                <h4><?php the_title(); ?></h4>
                                <?php
                                global $more; $more = false;
                                ?>
                                <?php the_content('Read on....');?>
                                </div>
                                <!-- <div class="button-div">
                                    <input class="view-button" type="button" value="Läs mer" onclick="location.href='<?php the_permalink() ?>';">
                                </div> -->
                            </div>
                     <?php
                    endwhile;
                }
                wp_reset_query();  // Restore global post data stomped by the_post().
                ?>
                </div>

        </div>
    </div>
</div>
<!-- <div class="row fixed-image-section">
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

</div> -->

<?php

endwhile;

else :
    echo "No content available!";

endif;

get_footer(); ?>

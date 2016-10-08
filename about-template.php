<?php
/*
Template Name: Om
*/
get_header();

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];




if(have_posts()) :
    while (have_posts()) : the_post();

        ?>
        <main>
            <div class="container">
                <div class="header-image" id="header-image-about" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header-image')[0]; ?>);">
                    <div class="row about text-divider" id="text-divider1">
                        <div class="six columns">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/gear.png" class="icon">
                            <?php dynamic_sidebar('About Us - The Company'); ?>
                        </div>
                        <div class="six columns">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/goals.png" class="icon">
                            <?php dynamic_sidebar('About Us - Vision'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns picture-divider">
                            <?php dynamic_sidebar('About Us - Picturedivider'); ?>
                        </div>
                    </div>

                </div>
                    <div class="row">
                        <div class="twelve columns text-divider2">
                            <?php dynamic_sidebar('About Us - Team'); ?>
                        </div>
                    </div>



                <div class="row">

                <?php


                $pages = get_pages(array('child_of'=> $post->ID ,'sort_order'=> 'asc', 'sort_column' => 'menu_order'));
                ?>

                    <?php
                    $i = 0;
                    $j = 0;
                    $k = 0;
                    foreach ($pages as $page) {
                        $content = $page->post_content;
                        $content = apply_filters( 'the_content', $content );

                    ?>

                    <label for="person">
                    <div class="workers four columns">
                        <input type="checkbox" >

                            <div class ="workers-image" id="person-<?php echo $i++; ?>" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'large')[0]; ?>);">
                            <h3><?php echo $page->post_title; ?></h3>
                            <span class="worker-title"><?php echo $content; ?>
                            </span></div>
                        <div class="block-over" id="block-<?php echo $j++; ?>">
                                <span class="close">&#x2613</span>
                                <?php echo $content; ?>
                        </div>
                    </div>
                    </label>


                    <?php if(1==2) {?>
                </div>

            <?php }

            }
            ?>

            </div>
        </main>
        <div class="row">
            <div class="twelve columns text-divider">
                <?php dynamic_sidebar('Work with Us'); ?>
            </div>
        </div>
    <?php
    endwhile;


else :
    echo "No content available!";

endif;


get_footer();
?>

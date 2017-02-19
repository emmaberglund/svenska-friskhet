<?php
/*
Template Name: Städtyper
*/
get_header();

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];


if(have_posts()) :
    while (have_posts()) : the_post();


?>

        <div class="header-image-page" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header-image-page')[0]; ?>);">
            <h1 class="header-text-news"><?php echo get_the_title(); ?></h1>
        </div>
<main>

    <div class="container cleaning-types">
        <div class="row">
            <div class="three columns sub">
                <?php
                if($post->post_parent)
                    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
                else
                    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
                if ($children) { ?>

                    <!-- Sub Menu -->
                    <div class="submenu hidden-mobile" id="submenu">
                        <ul>
                            <?php echo $children; ?>
                        </ul>
                    </div> <!-- / Sub Menu -->

                <?php } ?>
            </div>
            <div class="nine columns news-text">
                <?php wpb_list_child_pages(); ?>
                <?php the_content();?></p>
            </div>
        </div>



<?php


        $pages = get_pages(array('child_of'=> $post->ID ,'sort_order'=> 'asc', 'sort_column' => 'menu_order'));
        ?>

                <div class="row">
                    <?php
                    foreach ($pages as $page) {
                        ?>

                          <?php if(1==2) {?>
                                </div>

                          <?php }

                    }
                    ?>

 </div>
        </main>

    <?php
    endwhile;

else :
    echo "No content available!";

endif;

get_footer();
?>

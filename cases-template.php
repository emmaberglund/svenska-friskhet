<?php
/*
Template Name: Cases
*/
?>
<?php
get_header();

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
if(have_posts()) :
    while (have_posts()) : the_post();
?>

<?php global $post; ?>
<div class="header-image-page" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header-image-page')[0]; ?>);">

</div>
    <main class="cases">
        <div class="cases-container">
            <div class="row">
                <div class="twelve columns text-divider3">
                    <p><?php the_content();?></p>
                </div>
            </div>

            <?php


            $pages = get_pages(array('child_of'=> $post->ID ,'sort_order'=> 'asc', 'sort_column' => 'menu_order'));
            ?>

            <div class="row">

                <?php
                $count=1;
                foreach ($pages as $page) {
                        ?>


                        <div class="case-item small">
                            <!--<div class="case-overlay"></div>-->
                            <div class="case-img" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'medium')[0]; ?>);" >
                            </div>
                            <!--<h2 class="case-title"><?php //echo $case->post_title; ?></h2>-->

                        </div>

                            <?php


                            $count++;

                        }

                        ?>
                    </div>
                </div>
            </main>


                <?php
                endwhile;

            else :
                echo "No content available!";

            endif;

            get_footer();
            ?>

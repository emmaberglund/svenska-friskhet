<?php get_header(); ?>
<?php
    if(have_posts()) :
        while (have_posts()) : the_post(); ?>
<?php global $post;
    //get the content of the current post inside the loop
    $content = get_the_content();
?>
<div class="header-image" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header-image')[0]; ?>);">
</div>
<?php
$pages = get_pages(array('child_of'=> $post->ID ,'sort_order'=> 'asc', 'sort_column' => 'menu_order'));
?>
<div class="container">
    <div class="row">
          <div class="twelve columns text-divider3">
              <?php
              //print the text without images:
              echo $content;
                ?>
          </div>
      </div>
    <?php
    // Get the page as an Object
    $news =  get_page_by_title('Nyheter');
    //replace post_parent value with your portfolio page id:
    $args=array(
        'post_type' => 'page',
        'post_parent' => $news->ID,
        'post_status' => 'publish',
        'posts_per_page' => 4
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    ?>
    <div class="news-container">
    <?php
        //echo "<pre>"; print_r($my_query); echo "</pre>";
        if( $my_query->have_posts() ) { ?>
            <div class="row">
            <?php echo''; // Här kan man skriva en rubrik
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="three columns news" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($page['ID']), 'large')[0]; ?>);">
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            <path d="M0,0C0,0,0,180,0,180C0,180,90,130,90,130C90,130,180,180,180,180C180,180,180,0,180,0C180,0,0,0,0,0" style="fill:#ffffff"></path>
                            <path d="M0,0C0,0,0,50,0,50C0,50,90,70,90,70C90,70,180,50,180,50C180,50,180,0,180,0C180,0,0,0,0,0" style="fill:#ffffff"></path>
                            <desc>Created with Snap</desc><defs></defs></svg>
                        <div class="caption">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        <?php
                        global $more; $more = false;
                        ?>
                        <?php the_content('Read on....');?>
                        </div>
                        <div class="button-div">
                            <input class="view-button" type="button" value="Läs mer" onclick="location.href='<?php the_permalink() ?>';">
                        </div>
                    </div>
             <?php
            endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        </div>
    </div>
    <?php
    // Get the page as an Object
    $news =  get_page_by_title('Om');
    //replace post_parent value with your portfolio page id:
    $args=array(
        'post_type' => 'page',
        'post_parent' => $news->ID,
        'post_status' => 'publish',
        'posts_per_page' => 1
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    ?>
    <div class="about-the-company">
    <?php
        //echo "<pre>"; print_r($my_query); echo "</pre>";
        if( $my_query->have_posts() ) { ?>
            <div class="row">
            <?php echo''; // Här kan man skriva en rubrik
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="caption">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        <?php
                        global $more; $more = false;
                        ?>
                        <?php the_content();?>
                        </div>
             <?php
            endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        </div>
    </div>
    <div class="projects-container">
        <?php
        $project =  get_page_by_title('Projekt');
        //replace post_parent value with your portfolio page id:
        $args=array(
            'post_type' => 'page',
            'post_parent' => $project->ID,
            'post_status' => 'publish',
            'posts_per_page' => 4
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        //echo "<pre>"; print_r($my_query); echo "</pre>";
        if( $my_query->have_posts() ) {
            echo''; // Här kan man skriva en rubrik
            ?>
            <div class="row">
            <?php
            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="three columns project">
                        <div class="project-icon">
                            <?php echo get_the_post_thumbnail( $page['ID'], array(60, 60)  ); ?>
                        </div>
                                <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                                <?php
                                global $more; $more = false;
                                ?>
                                <?php the_content('Read on....');?>
                    </div>
                <?php
                endwhile;
            }
            wp_reset_query();  // Restore global post data stomped by the_post().
            ?>
        </div>
        </div>
        <div class="row fixed-image-section">
            <div class="picture-divider">
                <div class="fixed-image">
                    <?php
                    //get the images and print them
                    $images = get_the_images($content);
                    foreach($images as $image) {
                        echo $image[0];
                    }
                    ?>
                </div>
        </div>
        <?php
        // Set up the objects needed
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => -1 ));
        // Get the page as an Object
        $cases =  get_page_by_title('Cases');
        $casesPage = get_post($cases);
        // Filter through all pages and find Portfolio's children
        $cases_children = get_page_children( $cases->ID, $all_wp_pages );
        ?>
        <div class="cases-container">
            <div class="row">
                    <?php
                    $count=1;
                    foreach ($cases_children as $case) {
                        if($count <= 8){
                        ?>
                    <div class="case-item">
                        <!--<div class="case-overlay"></div>-->
                        <div class="case-img" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($case->ID), 'medium')[0]; ?>);" >
                        </div>
                        <!--<h2 class="case-title"><?php //echo $case->post_title; ?></h2>-->
                    </div>
                    <?php if($count % 4 == 0) {
                        ?>
            </div>
                  <div class="row">
                      <?php }
                      $count++;
                  }
              }
                  wp_reset_query();
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
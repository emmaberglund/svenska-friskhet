<?php

function add_my_script() {
    wp_enqueue_script(
        'script', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/script.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}

add_action( 'wp_enqueue_scripts', 'add_my_script' );

//adds new css-files

function wpt_theme_styles(){
    wp_enqueue_style( 'skeleton_css', get_template_directory_uri() . '/css/skeleton.css');
    wp_enqueue_style( 'style-new', get_template_directory_uri() . '/css/style-new.css');
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

}

add_action('wp_enqueue_scripts', 'wpt_theme_styles' );

add_theme_support( 'post-thumbnails' );

//Function for formatting content
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}


//function to remove images from content
function remove_img_from_content($content) {

  //remove all images form content
  $content = preg_replace("/<img[^>]+\>/i", "", $content);

  return $content;

}

//function to get images
function get_the_images($content) {

     //$matches will be an array with all images
     preg_match_all("/<img[^>]+\>/i", $content, $matches);
     return $matches;

}



function our_widgets_init(){
    register_sidebar([
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-headline">',
        'after_title' => '</h4>'
    ]);
     register_sidebar([
        'name' => 'Slogan',
        'id' => 'Slogan'
    ]);
    register_sidebar([
        'name' => 'Address',
        'id' => 'address'
    ]);
    register_sidebar([
        'name' => 'Email',
        'id' => 'email'
    ]);
     register_sidebar([
        'name' => 'Phone',
        'id' => 'phone'
    ]);
          register_sidebar([
        'name' => 'Logo in footer',
        'id' => 'logoinfooter'
    ]);
}

add_action('widgets_init', 'our_widgets_init');

// Creating the widget

class wpb_widget extends WP_Widget {

    function __construct() {
parent::__construct(
// Base ID of your widget

'wpb_widget',

// Widget name will appear in UI

__('Workers', 'wpb_widget_domain'),

// Widget description

array( 'description' => __( 'Camillas custom WorkersWidget', 'wpb_widget_domain' ), )

);

}
// Creating widget front-end

// This is where the action happens

    public function widget( $args, $instance ) {

$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes

echo $args['before_widget'];

if ( ! empty( $title ) )

echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output


function form( $instance )
{
    $headline   = esc_attr( isset( $instance['headline'] ) ? $instance['headline'] : '' );
    $image_id   = esc_attr( isset( $instance[$this->image_field] ) ? $instance[$this->image_field] : 0 );
    $blurb      = esc_attr( isset( $instance['blurb'] ) ? $instance['blurb'] : '' );

    $image      = new WidgetImageField( $this, $image_id );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'headline' ); ?>"><?php _e( 'Headline:' ); ?>
            <input class="widefat" id="<?php echo $this->get_field_id( 'headline' ); ?>" name="<?php echo $this->get_field_name( 'headline' ); ?>" type="text" value="<?php echo $headline; ?>" />
        </label>
    </p>
    <div>
        <label><?php _e( 'Image:' ); ?></label>
        <?php echo $image->get_widget_field(); ?>
    </div>
    <p>
        <label for="<?php echo $this->get_field_id( 'blurb' ); ?>"><?php _e( 'Blurb:' ); ?>
            <input class="widefat" id="<?php echo $this->get_field_id( 'blurb' ); ?>" name="<?php echo $this->get_field_name( 'blurb' ); ?>" type="text" value="<?php echo $blurb; ?>" />
        </label>
    </p>
<?php
}

echo $args['after_widget'];

}

// Widget Backend

    public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {

$title = $instance[ 'title' ];

}

else {

$title = __( 'New title', 'wpb_widget_domain' );

}

// Widget admin form

?>

<p>

    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

</p>

<?php

}
// Updating widget replacing old instances with new

    public function update( $new_instance, $old_instance ) {

$instance = array();

$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

return $instance;

}

} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );

}
add_action( 'widgets_init', 'wpb_load_widget' );

//



//navigation menu

register_nav_menus([
    'primary' => 'Primary Menu',
    'footer' => 'Footer Menu'


]);


//adds image settings in admin-panel
    add_theme_support('post-thumbnails');
    add_image_size('small_thumbnail', 180, 120, true);
    add_image_size('banner_image', 960, 320, true);


// add new imagesize
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'new-size', 314, 314, true ); //(cropped)
    add_image_size( 'header-image', 2500, 2000, true );
    add_image_size( 'header-image-page', 2000, 500, true );

}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
    $addsizes = array(
        "new-size" => __( "New Size"),
        "header-image" => __("Header image"),
        "header-image-page" => __("Header Image Page")
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}


add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '">Läs mer >></a>';
}

/* ---- CUSTOMIZING CODE ---- */

//Front-page

function logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'logo' ); // Add setting for logo uploader

    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'logo' ),
        'section'  => 'title_tagline',
        'settings' => 'logo',
    ) ) );
}
add_action( 'customize_register', 'logo_customize_register' );

function tcx_register_theme_customizer( $wp_customize ) {

    $wp_customize->add_setting(
        'tcx_menu_color',
        array(
            'default'     => '#fff'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color',
            array(
                'label'      => __( 'Menu Color', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_menu_color'
            )
        )
    );

    $wp_customize->add_setting(
        'tcx_menu_color_hover',
        array(
            'default'     => '#FFC0CB'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color_hover',
            array(
                'label'      => __( 'Menu Color Hover', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_menu_color_hover'
            )
        )
    );

    $wp_customize->add_setting(
        'tcx_section_color',
        array(
            'default'     => '#86e9cb'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'section_color',
            array(
                'label'      => __( 'Section Color', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_section_color'
            )
        )
    );

}
add_action( 'customize_register', 'tcx_register_theme_customizer' );

//End of customizing front-page

function wpb_list_child_pages() {

    global $post;

    if ( is_page() && $post->post_parent )

        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
    else
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

    if ( $childpages ) {

        $string = '<ul>' . $childpages . '</ul>';
    }

    return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

//CSS part of customization
function tcx_customizer_css() {
  ?>
    <style type="text/css">
        nav ul li a { color: <?php echo get_theme_mod( 'tcx_menu_color' ); ?>; }
        nav ul li a:hover { color: <?php echo get_theme_mod( 'tcx_menu_color_hover' ); ?>; }
        .introduction { background-color: <?php echo get_theme_mod( 'tcx_section_color' ); ?>; }
    </style>
  <?php
}
add_action( 'wp_head', 'tcx_customizer_css' );



?>

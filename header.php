<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset')?>">
        <meta name="viewport" content="width=device-width">
        <style>html {margin-top: 0;}</style>
        <title>
            <?php
                wp_title('|', true, 'right'); //echoar ut till höger om namnet
                bloginfo('name'); //webpage name
            ?>
        </title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <?php wp_head(); ?>
    </head>

<body>
    <header id="header">
        <?php if ( get_theme_mod( 'logo' ) ) : ?>
            <a href="<?php bloginfo('wpurl'); ?>">
                <h1 style="background-image:url('<?php echo get_theme_mod( 'logo' ); ?>');" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display') ); ?>" id="logo">

                    <?php bloginfo( 'name' ); ?>
                </h1>
            </a>


        <?php else : ?>

            <a href="<?php bloginfo('wpurl'); ?>">
                <h1>
                    <?php bloginfo( 'name' ); ?></h1>
                </a>

            <?php endif; ?>

                <!-- <img id="show-menu" src="<?php bloginfo('template_directory'); ?>/images/menu_button.png"> -->



                <nav id="desktop-menu" class="main-nav">
                    <div class="responsive-menu">
                        <?php wp_nav_menu([

                            'theme_location' => 'primary'

                        ]); ?>
                    </div>
                </nav>








    </header>

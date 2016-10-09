<footer>
    <div class="row">
        <div class="twelve columns footer1">
            <div class="overlay" onClick="style.pointerEvents='none'"></div>
            <?php dynamic_sidebar('FooterMap'); ?>
        </div>
    </div>
    <div class="row footer">
        <div class="four columns">
            <?php dynamic_sidebar('Address'); ?>
        </div>
        <div class="four columns social">
            <?php dynamic_sidebar('Social Media'); ?>
        </div>
        <div class="four columns">
            <?php dynamic_sidebar('Email and phone'); ?>
        </div>
    </div>

    <div class="row copy">
        <div class="twelve columns">
            <p>&copy; <?php bloginfo('author');?> <?php the_time('Y');?></p>
        </div>
    </div>



</footer>





     <?php wp_footer(); ?>
    </body>
</html>

<footer>
    <div class="row footer">
        <div class="four columns">
            <?php dynamic_sidebar('Address'); ?>
        </div>
        <div class="four columns">
            <?php dynamic_sidebar('Email'); ?>
        </div>
          <div class="four columns">
            <?php dynamic_sidebar('Phone'); ?>
        </div>
         <div class="four columns">
            <?php dynamic_sidebar('Logo in footer'); ?>
        </div>
    </div>

    <div class="row copy">
        <div class="twelve columns">
            <p>&copy; <?php bloginfo('author');?></p>
        </div>
    </div>



</footer>





     <?php wp_footer(); ?>
    </body>
</html>

<?php
/* Template Name: Kontakt*/

if(isset($_POST['submit'])) { $flag=1; if($_POST['yourname']=='') { $flag=0; echo "Skriv in ditt namn<br>"; }
else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['yourname'])) { $flag=0; echo "Skriv in ett giltigt namn<br>"; } if($_POST['email']=='') { $flag=0; echo "Skriv in din e-mail<br>"; }
else if(!preg_match("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})^", $_POST['email'])) { $flag=0; echo "Skriv in en giltig e-mail<br>";}
if($_POST['subject']=='') { $flag=0; echo "Skriv in ett ämne<br>"; }
if($_POST['message']=='') { $flag=0; echo "Skriv ett meddelande"; }
if ( empty($_POST) ) { print 'Tyvärr gick ditt meddelande inte att skicka.'; exit; }
else {
    if($flag==1) {wp_mail(get_option('admin_email'),trim($_POST[yourname])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST[message])),"From: ".trim($_POST[yourname])." <".trim($_POST[email]).">rnReply-To:".trim($_POST[email])); echo "Ditt meddelande har skickats!"; } } }

get_header();

?>
<?php global $post; ?>
<div class="header-image-page" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'header-image-page')[0]; ?>);">
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
                    <?php dynamic_sidebar('Contact 1'); ?>
                </div>
                <div class="four columns form">
                    <h2>Kontakta oss</h2>



                        <form method="post" id="contactus_form"><input placeholder="Namn" type="text" name="yourname" id="yourname" rows="1" value="">
                            <input placeholder="E-post" type="text" name="email" id="email" rows="1" value="">
                            <input placeholder="Ämne" type="text" name="subject" id="subject" rows="1" value="">
                            <textarea  placeholder="Meddelande" name="message" id="message"></textarea><br>
                            <input type="submit" name="submit" id="submit" value="Skicka">
                        </form>
                    </div>
                    <div class="four columns contact">
                        <?php dynamic_sidebar('Contact 2'); ?>
                    </div>
                </div>
            </div>
            <div class="row fixed-image-section">
                <div class="picture-divider">
                    <div class="fixed-image">
                        <?php
                        $content = get_the_content();
                        //get the images and print them
                        $images = get_the_images($content);
                        foreach($images as $image) {
                            echo $image[0];
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

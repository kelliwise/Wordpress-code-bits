<?php   


/* ------------ Creat Custom Login page (remove WP logo, use WF logo) -------------------- */


// change login page logo for a child theme. Add the logo image to the child theme's /images directory
// logo image should be no bigger than 323 pixels wide by 67 pixels high
// for using this with a parent theme, the code should change to:
// background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {background-image:url('<?php echo get_bloginfo( 'stylesheet_directory' ) ?>/images/login-logo.png'); 
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/* --------------- End Custom Login -------------------------- */
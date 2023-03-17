<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sukach Eugene">
    <meta name="description" content="Site of TheBox Company">
    <meta name="keywords" content="architect, building, project">

    <!-- Custom CSS rules -->


    <!-- Slick slider -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" /> -->

    <!-- Google fonts -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->

    <!-- Font awesome -->

    <!-- <script src="https://kit.fontawesome.com/3f554732dc.js" crossorigin="anonymous"></script> -->

    <?php do_action ('wp_head') ?>
</head>

<body>

    <header>
        <div class="container">
            <div class="header-elements">

                <?php
                $logoImg = get_field('logo_image', 'options');
                $logoTitleItalic = get_field('logo_title_italic_text', 'options');
                $logoTitleNormal = get_field('logo_title_normal_text', 'options');
                ?>

                <div class="logo">
                    <img src="<?php echo esc_url($logoImg['url']); ?>" alt="<?php echo esc_attr($logoImg['alt']); ?>" title="<?php echo esc_url($logoImg['title']); ?>" />
                    <p class="company-name"><span class="italic"> <?php echo $logoTitleItalic; ?></span> <?php echo $logoTitleNormal; ?> </p>
                </div>

                <?php
                wp_nav_menu(array('theme_location' => 'header-menu'));
                ?>
            </div>

            
        </div>

    </header>
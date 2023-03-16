<footer>

    <?php
    $logoImg = get_field('logo_image', 'options');
    $logoTitle = get_field('logo_title', 'options');
    $phoneNumber = get_field('phone_number', 'options');
    ?>

    <p> <?php echo $phoneNumber; ?> </p>

    <img src="<?php echo esc_url($logoImg['url']); ?>" alt="<?php echo esc_attr($logoImg['alt']); ?>" title="<?php echo esc_url($logoImg['title']); ?>" />
    <p> <?php echo $logoTitle; ?> </p>



    <div class="container">
        <div class="footer-elements">

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





</footer>

<?php

wp_footer();
?>

</body>

</html>
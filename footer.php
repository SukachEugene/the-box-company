<footer>

    <?php
    $adress = get_field('adress', 'options');
    $phoneNumber = get_field('phone_number', 'options');
    $email = get_field('email', 'options');
    $logoImg = get_field('logo_image', 'options');
    $logoTitleItalic = get_field('logo_title_italic_text', 'options');
    $logoTitleNormal = get_field('logo_title_normal_text', 'options');

    ?>

    <div class="container">
        <div class="footer-elements">

            <div class="footer-left-part">

                <p class="footer-caption"><span class="footer-caption-fix">Address:</span><a href="<?php echo esc_url($adress['url']); ?>" target="<?php echo esc_attr($adress['target']); ?>"> <?php echo $adress['title']; ?> </a></p>
                <p class="footer-caption"><span class="footer-caption-fix">Phone:</span><a href="tel:+<?php echo preg_replace('~\D~', '', $phoneNumber); ?>"><?php echo $phoneNumber ?></a></p>
                <p class="footer-caption"><span class="footer-caption-fix">Email:</span><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                <div class="logo">
                    <img src="<?php echo esc_url($logoImg['url']); ?>" alt="<?php echo esc_attr($logoImg['alt']); ?>" title="<?php echo esc_url($logoImg['title']); ?>" />
                    <p class="company-name"><span class="italic"> <?php echo $logoTitleItalic; ?></span> <?php echo $logoTitleNormal; ?> </p>
                </div>
            </div>

            <div class="footer-right-part">

                <div>
                    <p class="footer-caption">Newsletter:</p>

                    <div class="footer-subscribe-form">
                        <?php
                        $form = get_field('subscribe_form', 'options');

                        echo do_shortcode($form);
                        ?>
                    </div>
                </div>

                <div>

                    <p class="footer-caption">Social:</p>

                    <div class="footer-social-media-icons">

                        <?php
                        $social_media = get_field('social_media_links', 'options');

                        foreach ($social_media as $media) :
                            $name = $media['name'];
                            $url = $media['url'];
                        ?>

                            <a href="<?php echo $url ?>" target="<?php echo $url ?>"><i class="<?php echo $name ?>"></i></a>

                        <?php endforeach; ?>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="footer-bottom-part">
        <div class="container">
            <p>TheBox Company © 2022. All Rights Reserved</p>
        </div>
    </div>






</footer>

<?php

wp_footer();
?>

</body>

</html>
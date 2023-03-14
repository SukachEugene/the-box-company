<?php
get_header()
?>

<section>

</section>

<section class="section-two">
    <div class="container">
        <div class="section-two-content">

            <?php $field = get_field_object('our_reputations'); ?>

            <h2> <?php echo $field['label']; ?> </h2>
            <div class="section-two-articles-container">

                <?php
                if (have_rows('our_reputations')) {

                    while (have_rows('our_reputations')) {
                        the_row();

                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                ?>
                        <div class="section-two-article">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                            <h3><?php echo $title ?></h3>
                            <p><?php echo $description ?></p>

                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>


<section class="section-three">
    <div class="container">
        <div class="section-three-content">
            <?php
            $title = get_field('about_us_title');
            $image = get_field('about_us_image');
            $description = get_field('about_us_description');
            $link = get_field('about_us_link');
            ?>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">

            <div class="section-three-text">
                <h2> <?php echo $title; ?> </h2>
                <p> <?php echo $description; ?> </p>
                <a class="blue" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo $link['title']; ?> </a>
            </div>

        </div>
    </div>
</section>

<section class="section-four">
    <div class="container">
        <div class="section-four-content">
            <?php
            $title = get_field('services_title');
            ?>

            <h2> <?php echo $title; ?> </h2>
            <div class="section-four-content-grid">
                <?php

                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );

                $services = new WP_Query($args);

                while ($services->have_posts()) {

                    $services->the_post();

                    $post_id = get_the_ID();
                    $image = get_field('image');
                ?>

                    <div class="section-four-article">
                        <div class="section-four-container">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                        </div>
                        <h3> <?php the_title(); ?> </h3>
                    </div>
                <?php
                }
                wp_reset_postdata();
                ?>


            </div>
        </div>
    </div>
</section>

<section>

</section>

<section class="section-six">
    <div class="container">
        <div class="section-six-content">
            <div>
                <?php
                $title = get_field('consultation_title');
                $text = get_field('consultation_text');
                $phoneNumber = get_field('phone_number', 'options');
                $link = get_field('consultation_link');
                ?>

                <h3><?php echo $title ?></h3>
                <p><?php echo $text ?> <a href="tel:+<?php echo preg_replace('~\D~', '', $phoneNumber); ?>"><?php echo $phoneNumber ?></a></p>
            </div>
            <a>Button</a>

        </div>
    </div>
</section>




<?php
get_footer();
?>
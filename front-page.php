<?php
get_header()
?>


<section class="section-one" id="home">

    <div class="slider-one">

        <?php
        $featured_posts = get_field('projects_show_in_top');
        $mainTitle = get_field('projects_title');

        if ($featured_posts) :

            foreach ($featured_posts as $element) :

                $id = $element->ID;
                $title = $element->post_title;
                $image = get_field('image', $id);
                $slogan = get_field('slogan', $id);
        ?>
                <div class="slider-one-element" data-title="<?php echo $title ?>" data-link="<?php the_permalink() ?>" style="background-image: url('<?php echo $image['url']; ?>');>">

                    <div class="container-left">

                        <div class="slider-one-element-content">

                            <h1> <?php echo $slogan ?> </h1>

                        </div>
                    </div>
                </div>

        <?php
            endforeach;
        endif;
        ?>

        <div class="slider-one-nav">
            <h3><?php echo $mainTitle ?></h3>
            <a id="slider-one-link" href=""></a>
            <div class="slider-one-nav-buttons">
                <button class="slider-one-nav-button pointer slide-prev slick-arrow" aria-label="Previous" type="button" style="">
                    <img class="left-arrow" src="<?php echo get_theme_file_uri() . '/images/left_arrow.svg' ?>" title="" alt="">
                    <span>Back</span>
                </button>
                <button class="slider-one-nav-button pointer slide-next slick-arrow" aria-label="Next" type="button" style="">
                    <span>Next</span>
                    <img class="right-arrow" src="<?php echo get_theme_file_uri() . '/images/right_arrow.svg' ?>" title="" alt="">
                </button>
            </div>
        </div>

    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="section-two-content">

            <?php $field = get_field_object('our_reputations'); ?>

            <h2> <?php echo $field['label']; ?> </h2>
            <div class="section-two-articles-container">

                <?php

                $array = get_field('our_reputations');

                if ($array) :
                    foreach ($array as $element) :

                        $title = $element['title'];
                        $image = $element['image'];
                        $description = $element['description'];
                ?>
                        <div class="section-two-article">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                            <h3><?php echo $title ?></h3>
                            <p><?php echo $description ?></p>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>

            </div>
        </div>
    </div>
</section>

<section class="section-three" id="about-us">
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

<section class="section-four" id="services">
    <div class="container">
        <div class="section-four-content">
            <?php
            $title = get_field('services_title');
            ?>

            <h2> <?php echo $title; ?> </h2>
            <div class="section-four-content-grid">
                <?php

                $services = get_posts(array(
                    'post_type' => 'services',
                    'posts_per_page' => -1
                ));

                if ($services) :

                    foreach ($services as $element) :

                        $id = $element->ID;
                        $image = get_field('image', $id);
                ?>
                        <div class="section-four-article">
                            <div class="section-four-container">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                            </div>
                            <h3> <?php the_title(); ?> </h3>
                        </div>
                <?php
                    endforeach;
                endif
                ?>

            </div>
        </div>
    </div>
</section>

<section class="section-five">
    <div class="container">
        <div class="section-five-content">

            <?php $field = get_field('our_goals'); ?>

            <div class="section-five-goals-container">

                <?php foreach ($field as $value) : ?>

                    <?php
                    $image = $value['image'];
                    $number = $value['number'];
                    $description = $value['text'];
                    $position = $value['icon_position'];
                    ?>

                    <div class="section-five-article">
                        <img class="<?php echo $position ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                        <div class="section-five-article-text">
                            <h3><?php echo $number ?></h3>
                            <p><?php echo $description ?></p>
                        </div>
                    </div>

                <?php endforeach;
                ?>
            </div>


            <div class="section-five-text-container">
                <?php
                $title = get_field('goals_title');
                $text = get_field('goals_text');
                $link = get_field('goals_link');
                ?>

                <h3> <?php echo $title; ?> </h3>
                <p> <?php echo $text; ?> </p>
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"> <?php echo $link['title']; ?> </a>

            </div>

        </div>
    </div>

</section>

<?php
$banner = get_field('consultation_banner');
?>
<section class="section-six" style="background-image: url('<?php echo $banner['url']; ?>');">
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
                <p><?php echo $text ?> <a class="underlined" href="tel:+<?php echo preg_replace('~\D~', '', $phoneNumber); ?>"><?php echo $phoneNumber ?></a></p>
            </div>
            <a class="section-six-button pointer" href="#consultation-form"><?php echo $link['title']; ?></a>

        </div>
    </div>
</section>

<section class="section-seven" id="projects">
    <div class="container">

        <?php
        $title = get_field('all_projects_title');
        ?>

        <h2> <?php echo $title ?></h2>

        <div class="section-seven-content">

            <div class="projects-block-filters-container">

                <p class="filter-name active" data-filter="all">All</p>

                <?php

                $args = array(
                    'post type' => 'projects',
                    'hide_empty' => '1',
                    'orderby' => 'description',
                    'order'   => 'ASC'
                );

                $categories = get_categories($args);

                foreach ($categories as $category) :
                    $name = $category->name;
                    $slug = $category->slug;

                ?>

                    <p class="filter-name" data-filter="<?php echo ($slug) ?>"><?php echo $name ?></p>

                <?php endforeach ?>

            </div>

            <div class="projects-block-elements-container">

                <div class="slider-two projects-block-slides-container">

                    <?php
                    $projects = get_posts(array(
                        'post_type' => 'projects',
                        'posts_per_page' => -1
                    ));

                    if ($projects) :

                        foreach ($projects as $element) :

                            $id = $element->ID;
                            $title = $element->post_title;
                            $thumbnail = get_the_post_thumbnail($id);
                            $post_categories = get_the_category($id);
                            $location = get_field('location', $id);


                            if ($post_categories) :

                                $slugs = '';

                                foreach ($post_categories as $category) :
                                    $slug = $category->slug;

                                    if ($category == $post_categories[0]) {
                                        $slugs .= $slug;
                                    } else {
                                        $slugs .= " ";
                                        $slugs .= $slug;
                                    }

                                endforeach;
                            endif;
                    ?>

                            <div class="projects-block-element <?php echo $slugs ?>" data-filter="<?php echo $slugs ?>">
                                <div class="projects-block-element-image">
                                    <?php echo $thumbnail ?>
                                </div>
                                <div class="projects-block-element-description">
                                    <h4><?php echo $title ?></h4>
                                    <p><?php echo $location ?></p>

                                </div>
                            </div>

                    <?php
                        endforeach;
                    endif;
                    ?>

                </div>

                <div class="slider-two-nav-buttons">
                    <button class="slider-two-nav-button pointer slide-prev2 slick-arrow" aria-label="Previous" type="button" style="">
                        <img class="left-arrow" src="<?php echo get_theme_file_uri() . '/images/left_arrow.svg' ?>" title="" alt="">
                        <span>Back</span>
                    </button>
                    <button class="slider-two-nav-button pointer slide-next2 slick-arrow" aria-label="Next" type="button" style="">
                        <span>Next</span>
                        <img class="right-arrow" src="<?php echo get_theme_file_uri() . '/images/right_arrow.svg' ?>" title="" alt="">
                    </button>
                </div>

            </div>
        </div>

    </div>
</section>

<section class="section-eight">

    <div class="container">
        <div class="section-eight-content" id="consultation-form">
            <?php
            $title = get_field('contact_title');
            $description = get_field('contact_description');
            $form = get_field('contact_form');
            ?>

            <h2> <?php echo $title ?></h2>

            <p class="section-eight-description"> <?php echo $description ?> </p>
            <div class="section-eight-form-container">
                <?php
                echo do_shortcode($form);
                ?>
            </div>
        </div>
    </div>

</section>


<?php
get_footer();
?>
<footer>

    <?php
    $logoImg = get_field('logo_image', 'options');
    $logoTitle = get_field('logo_title', 'options');
    $phoneNumber = get_field('phone_number', 'options');
    ?>

    <p> <?php echo $phoneNumber; ?> </p>

    <img src="<?php echo esc_url($logoImg['url']); ?>" alt="<?php echo esc_attr($logoImg['alt']); ?>" title="<?php echo esc_url($logoImg['title']); ?>" />
    <p> <?php echo $logoTitle; ?> </p>


</footer>

<?php
// wp_footer();
?>

</body>

</html>
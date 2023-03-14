
<?php
get_header();
?>

<p>Front Page11111</p>


<section class="section-two">
    <div class="container">
        <div class="section-two-content">

        </div>
    </div>
</section>


<?php



$field = get_field_object('our_reputations');
?>
<p><?php echo $field['label']; ?></p>

<?php


if( have_rows('our_reputations') ) {

    while( have_rows('repeater_field_name') ) {
        the_row();

        $simage = get_sub_field('image');
        $simage = get_sub_field('title');
        $simage = get_sub_field('description');
    }

} else {
    // Do something...
}

?>



<?php
get_footer();
?>
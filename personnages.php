<?php
// Template Part: Carrousel des Personnages

$args = array(
    'post_type' => 'characters',
    'posts_per_page' => -1,
    'meta_key'  => '_main_char_field',
    'orderby'   => 'meta_value_num',
);
$characters_query = new WP_Query($args);
?>

<div class="swiper-container characters-carousel">
    <div class="swiper-wrapper">
        <?php
        if ($characters_query->have_posts()) :
            while ($characters_query->have_posts()) : $characters_query->the_post();
                ?>
                <div class="swiper-slide character-slide">
                    <figure>
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                        <figcaption><?php the_title(); ?></figcaption>
                    </figure>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

    <!-- Navigation Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <!-- Pagination Dots -->
    <div class="swiper-pagination"></div>
</div>

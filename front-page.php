<?php

get_header();
?>

<?php  $query = new WP_Query([
    'category_name' => get_theme_mod('clean_home_category'),
]) ?>
<?php if(is_front_page() && get_theme_mod('clean_home_category')): ?>
    <div id="fh5co-portfolio">

        <!-- Начало цикла Post -->
        <?php if ($query->have_posts()):  $i = 1;?>

            <?php while ($query->have_posts()): ?>

                <?php $query->the_post(); ?>

                <!-- Сами посты-->
                <?php if(has_post_thumbnail()){
                    $img_url = get_the_post_thumbnail_url();
                }else {
                    $img_url = 'https://picsum.photos/1280/864';
                } ?>

                <div class="fh5co-portfolio-item <?php if($i % 2 == 0) echo 'fh5co-img-right'; ?>">
                    <div class="fh5co-portfolio-figure animate-box" style="background-image: url(<?php echo $img_url?>);"></div>
                    <div class="fh5co-portfolio-description">
                        <h2><?php the_title() ?></h2>
                        <?php the_content('') ?>
                        <p><a href="<?php the_permalink() ?>" class="btn btn-primary"><?php _e('read more', 'clean') ?></a></p>
                    </div>
                </div>

                <?php $i++; endwhile; ?>

        <?php else: ?>
            <?php echo _e('Нет постов'); ?>
            <!-- Если постов нет -->
        <?php endif;  ?>

        <?php wp_reset_postdata(); ?>

        <!-- Конец цикла Post -->
    </div>
    <?php endif; ?>


<?php
get_footer();

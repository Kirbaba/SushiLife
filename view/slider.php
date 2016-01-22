<?php if ($my_query->have_posts()) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <div class="main__carousel--item">
        <?= get_the_post_thumbnail(); ?>
    </div>

<?php endwhile;
}
wp_reset_query(); ?>
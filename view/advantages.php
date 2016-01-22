<?php if ($my_query->have_posts()) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="advantages__icon">
            <?= get_the_post_thumbnail(); ?>
        </div>
        <div class="advantages__title">
            <h4><?php the_title(); ?></h4>
        </div>
        <div class="advantages__desc">
            <p><?php the_content(); ?></p>
        </div>
    </div>

<?php endwhile;
}
wp_reset_query(); ?>
<div class="tab-content">

    <?php
    $args = array(
        'type' => 'post',
        'child_of' => 0,
        'parent' => '',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => 0,
        'hierarchical' => 1,
        'exclude' => '1',
        'include' => '31,32,33',
        'number' => 0,
        'taxonomy' => 'category',
        'pad_counts' => false
    );
    $categories = get_categories($args);
    if ($categories) {
        foreach ($categories as $cat) { ?>

            <div role="tabpanel" class="tab-pane posts-pane" id="tab-<?= $cat->term_id ?>">

                <?php $posts = get_posts(array(
                    'numberposts' => -1, // тоже самое что posts_per_page
                    'offset' => 0,
                    'category' => $cat->term_id,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'post',
                    'post_status' => 'publish'
                ));
                foreach ($posts as $post) {
                    setup_postdata($post); ?>

                    <a href="<? echo get_the_permalink($post->ID); ?>" class="news-category__item">
                        <?php if (has_post_thumbnail()): ?>
                        <span class="news-category__item--thumb">
                            <?php {
                                echo get_the_post_thumbnail($post->ID, '100%', array('class' => 'alignleft'));
                            } ?>
                        </span>
                        <?php endif; ?>
                        <span class="news-category__item--desc">
                            <h3><?php the_title(); ?></h3>
                            <p> <?php content(20); ?></p>
                            <span class="news-category__item--desc--date"><? echo the_time('j.m.Y'); ?></span>
                        </span>
                    </a>
                <?php }
                wp_reset_postdata();

                ?>
            </div>
        <?php }} ?>

    <div role="tabpanel" class="tab-pane posts-pane active" id="tab-all">
        <?php $posts = get_posts(array(
            'numberposts' => -1, // тоже самое что posts_per_page
            'offset' => 0,
            'category' => '31,32,33',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish'
        ));
        foreach ($posts as $post) {
            setup_postdata($post); ?>
            <a href="<? echo get_the_permalink($post->ID); ?>" class="news-category__item">
                <?php if (has_post_thumbnail()): ?>
                    <span class="news-category__item--thumb">
                                    <?php {
                                        echo get_the_post_thumbnail($post->ID, '100%', array('class' => 'alignleft'));
                                    } ?>
                                </span>
                <?php endif; ?>
                <span class="news-category__item--desc">
            <h3><?php the_title(); ?></h3>
            <p> <?php content(20); ?></p>
            <span class="news-category__item--desc--date"><? echo the_time('j.m.Y'); ?></span>
        </span>
            </a>
        <?php }
        wp_reset_postdata();

        ?>
    </div>
</div>

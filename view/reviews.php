<?php if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>

        <div class="reviews__carousel__item">
            <div class="reviews__carousel__item--img">
                <?= get_the_post_thumbnail(get_the_ID()); ?>
            </div>
            <h3><?= get_the_title(get_the_ID()); ?></h3>
            <div class="reviews__carousel__item--rating">
                <?php $rating = get_post_meta(get_the_ID(), "rating", 1); ?>
                <ul>
                    <?php for($i = 0; $i < 5; $i++){ ?>

                        <?php if($i < $rating){ ?>
                            <li class="page-coments--rating__item is-active" ></li>
                        <?php }else{ ?>
                            <li class="page-coments--rating__item" ></li>
                        <?php }?>

                    <?php } ?>
                </ul>
            </div>
            <p><?= get_the_content(get_the_ID()); ?></p>
            <small><?= get_the_date('j.m.Y'); ?></small>
        </div>

    <?php endwhile; }
wp_reset_query(); ?>
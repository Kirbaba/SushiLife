<?php if ($my_query->have_posts()) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>

        <div class="page-coments__item">
            <div class="page-coments--title">
                <h3><?= the_title(); ?></h3>
            </div>
            <div class="page-coments--rating">
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

            <div class="page-coments--img">
                <?= get_the_post_thumbnail(get_the_ID()); ?>
            </div>
            <div class="page-coments--text">
                <p><?= the_content(); ?></p>
            </div>
            <div class="page-coments--date">
                <small><?= get_the_date(); ?></small>
            </div>
        </div>

    <?php endwhile;
}
wp_reset_query(); ?>
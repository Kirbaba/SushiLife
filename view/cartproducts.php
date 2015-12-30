<?php foreach($posts as $post){ ?>

    <div class="basket__content--item">
        <a href="<?= get_the_permalink($post->ID); ?>" class="basket__content--item--title"><?= get_the_title($post->ID); ?></a>
        <span class="basket__content--item--weight"><?php echo get_post_meta($post->ID, "weight", 1); ?></span>
        <span class="basket__content--item--qt"><?php echo get_post_meta($post->ID, "count", 1); ?></span>
        <div class="basket__content--item--pricebox">
            <p class="basket__content--item--pricebox--price"><span class="cart_price"><?= $products->{$post->ID}->price ?></span> грн</p>
            <div class="basket__content--item--pricebox--counter">
                <a href="#" class="minus"><i class="fa fa-minus"></i></a>
                <p class="counter" data-value="<?= $products->{$post->ID}->count ?>"><?= $products->{$post->ID}->count ?></p>
                <a href="#" class="plus"><i class="fa fa-plus"></i></a>
            </div>
            <a href="#" class="basket__content--item--clear"><i class="fa fa-times"></i></a>
        </div>
        <?= get_the_post_thumbnail($post->ID); ?>
    </div>

<?php } ?>
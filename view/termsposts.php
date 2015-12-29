<?php foreach($myposts as $post){ ?>

<div class="categoryitems__item">
    <a href="<?= get_the_permalink($post->ID); ?>"><?= get_the_title($post->ID); ?></a>
    <?= get_the_post_thumbnail($post->ID); ?>
    <div class="categoryitems__item--numbs">
        <span class="categoryitems__item--weight"><?php echo get_post_meta($post->ID, "weight", 1); ?></span>
        <span class="categoryitems__item--qt"><?php echo get_post_meta($post->ID, "count", 1); ?></span>
    </div>
    <div class="categoryitems__item--price">
        <span class="categoryitems__item--price--num"><?php echo get_post_meta($post->ID, "price", 1); ?></span>
        <span>грн</span>
    </div>
    <button class="categoryitems__item--buybtn" data-id="<?= $post->ID ?>">Заказать</button>
    <p class="categoryitems__item--composition">
        <?php
        $ingredients = get_the_terms($post->ID,'ingredients');
        foreach($ingredients as $key => $item){
            if($key == (count($ingredients) - 1)){
                echo $item->name.'. ';
            }else{
                echo $item->name.', ';
            }
        }
        ?>
    </p>
</div>
<?php } ?>
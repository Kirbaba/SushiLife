<?php
foreach($posts as $item){?>
    <div class="categoryitems__item">
        <a href="<?= get_the_permalink($item->ID); ?>"><?= get_the_title($item->ID); ?></a>
        <?= get_the_post_thumbnail($item->ID); ?>
        <div class="categoryitems__item--numbs">
            <span class="categoryitems__item--weight"><?php echo get_post_meta($item->ID, "weight", 1); ?></span>
            <span class="categoryitems__item--qt"><?php echo get_post_meta($item->ID, "count", 1); ?></span>
        </div>
        <div class="categoryitems__item--price">
            <span class="categoryitems__item--price--num"><?php echo get_post_meta($item->ID, "price", 1); ?></span>
            <span>грн</span>
        </div>
        <button class="categoryitems__item--buybtn" data-id="<?= $item->ID ?>">Заказать</button>
        <p class="categoryitems__item--composition">
            <?php
            $ingredients = get_the_terms($item->ID,'ingredients');
            foreach($ingredients as $key => $value){
                if($key == (count($ingredients) - 1)){
                    echo $value->name.'. ';
                }else{
                    echo $value->name.', ';
                }
            }
            ?>
        </p>
    </div>
<?php } ?>
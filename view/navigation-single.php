<h1 class="navigationtabs--title"><?= $term->name; ?><sup><?= $count ?></sup></h1>
<ul class="nav nav-pills  navigationtabs--tabs">
    <?php foreach($childs as $child){ ?>
        <li><a href="<?php echo get_term_link($term->term_id); ?>#tab-<?= $child->term_id ?>" class="productsForTerm" data-id="<?= $child->term_id ?>" href="#tab-<?= $child->term_id ?>" aria-controls="#tab-<?= $child->term_id ?>" ><?= $child->name ?></a></li>
    <?php } ?>
    <li class="active"><a href="<?php echo get_term_link($term->term_id); ?>#tab-all" aria-controls="all" class="productsForTerm" data-id="<?= $term->term_id ?>">Все</a></li>
</ul>
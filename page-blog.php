<?php get_header(); ?>
<section class="navigationtabs news-category__navs">
    <div class="col-lg-12">
        <h1 class="navigationtabs--title"><?php the_title(); ?></h1>
        <ul class="nav nav-pills navigationtabs--tabs">
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

            foreach($categories as $cat){ ?>
                <li><a href="#tab-<?= $cat->term_id ?>" aria-controls="#tab-<?= $cat->term_id ?>"  data-toggle="tab"><?= $cat->name ?></a></li>
            <?php } }?>
            <li class="active"><a href="#tab-all" aria-controls="#tab-all"  data-toggle="tab">Все</a></li>
        </ul>
    </div>
</section>

<section class="news-category__wrap">
    <?php get_template_part('view/tabs-article'); ?>
</section>
<?php get_footer(); ?>
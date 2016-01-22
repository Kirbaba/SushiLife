<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="col-lg-12">
    <section class="navigationtabs news-category__navs">
        <div class="col-lg-12">
            <h1 class="navigationtabs--title"> Новости </h1>
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
                    <li><a href="<?php echo get_page_link(92); ?>#tab-<?= $cat->term_id ?>" aria-controls="#tab-<?= $cat->term_id ?>"  ><?= $cat->name ?></a></li>
                <?php } }?>
            <li class="active"><a href="<?php echo get_page_link(92); ?>#tab-all" aria-controls="#tab-all"  >Все</a></li>
       </ul>
        </div>
    </section>

    <section class="post">
        <div class="container">
            <div class="col-lg-12">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>

    </section>
<?php endwhile; ?>
<?php  endif;?>


<?php get_footer(); ?>
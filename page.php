<?php get_header(); ?>
<div class="col-lg-12">
    <section class="templatepage">
        <div class="col-lg-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h1 class="navigationtabs--title"><?php the_title(); ?></h1>
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <?php if ( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('full', array('class'=>'new-img-pr')); ?>
                    <?php  endif;?>
                    <?php the_content(); ?>
                </div> 
            <?php endwhile; ?>
            <?php  endif;?> 
        </div>
    </section>
</div>
<?php get_footer(); ?>


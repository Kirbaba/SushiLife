<h1 class="navigationtabs--title"><?= $term->name; ?><sup><?= $count ?></sup></h1>
<ul class="nav nav-pills  navigationtabs--tabs">
    <?php foreach($childs as $child){ ?>
        <li><a href="#<?= $child->slug ?>" class="productsForTerm" data-id="<?= $child->term_id ?>" href="#<?= $child->slug ?>" aria-controls="<?= $child->slug ?>" role="tab" data-toggle="tab" ><?= $child->name ?></a></li>
    <?php } ?>
    <li class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="pill" class="productsForTerm" data-id="<?= $term->term_id ?>">Все</a></li>
</ul>
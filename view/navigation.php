<h1 class="navigationtabs--title"><?= $term->name; ?><sup><?= $count ?></sup></h1>
<ul class="nav nav-pills navigationtabs--tabs">
    <?php foreach($childs as $child){ ?>
        <li><a href="#" class="productsForTerm" data-id="<?= $child->term_id ?>"><?= $child->name ?></a></li>
    <?php } ?>
    <li class="active"><a href="#" class="productsForTerm" data-id="<?= $term->term_id ?>">Все</a></li>
</ul>
<div class="container">
    <h1>Рекомендуемые товары</h1>
    <form action="/wp-admin/admin.php?page=recommend" method="post">
    <?php

    $myposts = get_posts(array(
            'post_type' => 'product',
            'pots_per_page' => -1,)
    );

    foreach ($myposts as $mypost) {

        if(in_array_r($mypost->ID, $ids)){
            echo '<p><input type="checkbox" name="recommended[]" checked value="'.$mypost->ID.'">'.$mypost->post_title.'</p>';
        }else{
            echo '<p><input type="checkbox" name="recommended[]" value="'.$mypost->ID.'">'.$mypost->post_title .' </p>';
        }
    }

    ?>
    <input type="submit" value="Сохранить">
    </form>
</div>
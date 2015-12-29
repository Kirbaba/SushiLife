<?php

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR . '/lib/Parser.php';

function add_style(){
    wp_enqueue_style( 'my-bootstrap-extension', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_style( 'font-ewesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css', array(), '1');
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1');
    wp_enqueue_style( 'igor', get_template_directory_uri() . '/css/style-igor.css', array(), '1');
}

function add_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'readmore', get_template_directory_uri() . '/js/readmore.min.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1', 1);
    wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');
    wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js', array(), '1');
    wp_enqueue_script( 'carouFredSel-js', 'jquery.carouFredSel.js', array(), '1');
    
}

function add_admin_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    wp_enqueue_script('admin',get_template_directory_uri() . '/js/admin.js', array(), '1');
    wp_enqueue_style( 'my-bootstrap-extension-admin', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_style( 'my-style-admin', get_template_directory_uri() . '/css/admin.css', array(), '1');
}

add_action('admin_enqueue_scripts', 'add_admin_script');
add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
    ,'format' => ''
    ,'current' => max( 1, get_query_var('paged') )
    ,'total' => $wp_query->max_num_pages
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}

function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');

if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'post-thumbnails' );

/*-------------------------------------------------PRODUCTION---------------------------------------------------------*/

// Review Post type
add_action('init', 'product_register');
function product_register() {

    $labels = array(
        'name' => _x('Товары', 'post type general name'),
        'singular_name' => _x('Товар', 'post type singular name'),
        'add_new' => _x('Добавить товар', 'review'),
        'add_new_item' => __('Добавить новый товар'),
        'edit_item' => __('Редактировать товар'),
        'new_item' => __('Новый товар'),
        'view_item' => __('Посмотреть товар'),
        'search_items' => __('Найти товар'),
        'not_found' =>  __('Ничего не найдено'),
        'not_found_in_trash' => __('В корзине пусто'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => null,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
    );

    register_post_type( 'product' , $args );
}
// Custom menu
function add_menu_taxonomies() {

    register_taxonomy('menu', 'product', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Категории товаров', 'taxonomy general name' ),
            'singular_name' => _x( 'Категория товаров', 'taxonomy singular name' ),
            'search_items' =>  __( 'Поиск категорий' ),
            'all_items' => __( 'Все категории' ),
            'parent_item' => __( 'Родитель' ),
            'parent_item_colon' => __( 'Родитель:' ),
            'edit_item' => __( 'Редактировать категорию' ),
            'update_item' => __( 'Обновить категорию' ),
            'add_new_item' => __( 'Добавить новую категорию' ),
            'new_item_name' => __( 'Новое название категории' ),
            'menu_name' => __( 'Категории товаров' ),
        ),

        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'menu', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action( 'init', 'add_menu_taxonomies', 0 );
// Custom ingredients taxonomy
function add_ingredients_taxonomies() {

    register_taxonomy('ingredients', 'product', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Ингредиенты', 'taxonomy general name' ),
            'singular_name' => _x( 'Ингредиенты', 'taxonomy singular name' ),
            'search_items' =>  __( 'Поиск ингредиентов' ),
            'all_items' => __( 'Все ингредиенты' ),
            'parent_item' => __( 'Родитель' ),
            'parent_item_colon' => __( 'Родитель:' ),
            'edit_item' => __( 'Редактировать ингредиент' ),
            'update_item' => __( 'Обновить ингредиент' ),
            'add_new_item' => __( 'Добавить новый ингредиент' ),
            'new_item_name' => __( 'Новое название ингредиента' ),
            'menu_name' => __( 'Ингредиенты' ),
        ),

        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'ingredients', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action( 'init', 'add_ingredients_taxonomies', 0 );

function extraFieldsMenuWeight($post)
{
    ?>
    <p>
        <span>Вес: </span>
        <input type="text" name='extra[weight]' value="<?php echo get_post_meta($post->ID, "weight", 1); ?>">
    </p>
    <?php
}

function extraFieldsMenuCount($post)
{
    ?>
    <p>
        <span>Количество: </span>
        <input type="text" name='extra[count]' value="<?php echo get_post_meta($post->ID, "count", 1); ?>">
    </p>
    <?php
}

function extraFieldsMenuPrice($post)
{
    ?>
    <p>
        <span>Цена (только цифры): </span>
        <input type="text" name='extra[price]' value="<?php echo get_post_meta($post->ID, "price", 1); ?>">
    </p>
    <?php
}

function myExtraFieldsMenu()
{
    add_meta_box('extra_weight', 'Вес', 'extraFieldsMenuWeight', 'product', 'normal', 'high');
    add_meta_box('extra_count', 'Количество', 'extraFieldsMenuCount', 'product', 'normal', 'high');
    add_meta_box('extra_price', 'Цена', 'extraFieldsMenuPrice', 'product', 'normal', 'high');
}

add_action('add_meta_boxes', 'myExtraFieldsMenu', 1);

add_action('save_post', 'myExtraFieldsUpdate', 10, 1);

/* Сохраняем данные, при сохранении поста */
function myExtraFieldsUpdate($post_id)
{
    if (!isset($_POST['extra'])) return false;
    foreach ($_POST['extra'] as $key => $value) {
        if (empty($value)) {
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

/*CUSTOM SINGLES*/
function get_custom_single_template($single_template) {
    global $post;

    $terms = get_the_terms($post->ID, 'menu');
    if($terms && !is_wp_error( $terms )) {
        //Make a foreach because $terms is an array but it supposed to be only one term
        $single_template = TM_DIR . '/single-menu.php';
    }

    return $single_template;
}
add_filter( "single_template", "get_custom_single_template" ) ;

//navigation menu for terms
function termsMenu($id){
    //prn($id);
    $term = get_term($id['id']);
   // prn($term);
    $cat_terms = get_term_children( $id['id'], 'menu' );
    //prn($cat_terms);
    $childTerms = [];

    foreach($cat_terms as $termId){
        $childTerms[] = get_term($termId);
    }
    //prn($childTerms);
    $num = 0;

    foreach($childTerms as $t){
       $num += $t->count;
    }
   // prn($num);
    $parser = new Parser();
    $parser->render(TM_DIR . '/view/navigation.php', ['term' => $term, 'childs' => $childTerms, 'count' => $num]);
}

add_shortcode('terms', 'termsMenu');

function getTermPosts($id){
    //prn($id);
    $taxonomies = get_term_children( $id['id'], get_queried_object()->taxonomy);

    $myposts = get_posts(array(
            'post_type' => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => get_queried_object()->taxonomy,
                    'field' => 'id',
                    'terms' => $taxonomies)
            ))
    );

    $parser = new Parser();
    $parser->render(TM_DIR . '/view/termsposts.php', ['myposts' => $myposts]);
}

add_shortcode('termsposts', 'getTermPosts');
/*---------------------------------------------END PRODUCTION---------------------------------------------------------*/
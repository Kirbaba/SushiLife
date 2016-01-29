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
    wp_enqueue_style( 'stars', get_template_directory_uri() . '/css/rating.min.css', array(), '1');
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
    wp_enqueue_script( 'cart-js', get_template_directory_uri() . '/js/cart.js', array(), '1');
    wp_enqueue_script( 'rating-js', get_template_directory_uri() . '/js/rating.min.js', array(), '1');
    wp_enqueue_script( 'stars-js', get_template_directory_uri() . '/js/stars.js', array(), '1');

    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
//after wp_enqueue_script
    wp_localize_script( 'jquery', 'path', $translation_array );
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


function generateNumber($length = 8){
    $chars = '0123456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
/*--------------------------------------------- МЕНЮ НАВИГАЦИИ -------------------------------------------------------*/

function theme_register_nav_menu() {
    register_nav_menus( array(
        'primary' => 'Меню в шапке',
        'footer_menu' => 'Меню в подвале',
        'footer_client' => 'Для клиента в подвале',
        'footer_about' => 'Про Суши в подвале',

    ) );
    //register_nav_menu( 'primary', 'Главное меню' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

/*-------------------------------------------- КОНЕЦ МЕНЮ НАВИГАЦИИ --------------------------------------------------*/

/*------------------------------------------------ НАСТРОЙКИ ТЕМЫ ----------------------------------------------------*/
/*3 телеофна*/
add_action('customize_register', function($customizer){
    /*Меню настройки контактов*/
    $customizer->add_section(
        'contacts_section',
        array(
            'title' => 'Настройки контактов',
            'description' => 'Контакты',
            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'phone_textbox',
        array('default' => '067 681 22 66')
    );
    $customizer->add_setting(
        'works_textbox',
        array('default' => 'Пн-Чт с 10:00 до 24:00')
    );
    $customizer->add_setting(
        'weekend_textbox',
        array('default' => 'Пт-Cб, с 11:00 до 00:00')
    );


    $customizer->add_control(
        'phone_textbox',
        array(
            'label' => 'Телефон',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'works_textbox',
        array(
            'label' => 'Время работы (будни)',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'weekend_textbox',
        array(
            'label' => 'Время работы (вых.)',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );


    /*Меню настройки контактов*/
    $customizer->add_section(
        'social_section',
        array(
            'title' => 'Социальные сети',
            'description' => 'Соц. сети',
            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'fb_textbox',
        array('default' => 'fb.com')
    );
    $customizer->add_setting(
        'inst_textbox',
        array('default' => 'instagram.com')
    );
    $customizer->add_setting(
        'vk_textbox',
        array('default' => 'vk.com')
    );

    $customizer->add_control(
        'fb_textbox',
        array(
            'label' => 'Facebook',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'inst_textbox',
        array(
            'label' => 'Instagram',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'vk_textbox',
        array(
            'label' => 'VK',
            'section' => 'social_section',
            'type' => 'text',
        )
    );

});

/*---------------------------------------------- КОНЕЦ НАСТРОЕК ТЕМЫ -------------------------------------------------*/

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
function termsMenu($atts){
    $scatts = shortcode_atts( array(
        'id' => '0',
        'single' => '0',
    ), $atts );
    //prn($scatts);

    $term = get_term($scatts['id'], 'menu');
    //prn($term);
    if($term->parent != 0){
        $term = get_term($term->parent,'menu');
    }
    //prn($term);
    $cat_terms = get_term_children( $term->term_id, 'menu' );
   // prn($cat_terms);
    $childTerms = [];

    foreach($cat_terms as $termId){
        $childTerms[] = get_term($termId, 'menu');
    }
    //prn($childTerms);
    $num = 0;

    if(!empty($childTerms)){
        foreach($childTerms as $t){
            $num += $t->count;
        }
    }else{
        $num = $term->count;
    }

   // prn($num);
    $parser = new Parser();
    if($scatts['single']!=0){
        $parser->render(TM_DIR . '/view/navigation-single.php', ['term' => $term, 'childs' => $childTerms, 'count' => $num]);
    }else{
        $parser->render(TM_DIR . '/view/navigation.php', ['term' => $term, 'childs' => $childTerms, 'count' => $num]);
    }

}

add_shortcode('terms', 'termsMenu');

function getTermPosts($id){
    //prn($id);
    $taxonomies = get_term_children( $id['id'], get_queried_object()->taxonomy);
    //prn($taxonomies);
    $taxonomies[] = $id['id'];
   // prn($taxonomies);
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

//navigation menu for terms
function tabsPosts($id){
    //prn($id);
    $taxonomies = get_term_children( $id['id'], get_queried_object()->taxonomy);

    // prn($num);
    $parser = new Parser();
    $parser->render(TM_DIR . '/view/tabs.php', ['terms' => $taxonomies, 'allterm' => $id['id']]);
}

add_shortcode('tabsposts', 'tabsPosts');
/*---------------------------------------------END PRODUCTION---------------------------------------------------------*/

/*------------------------------------------------- CART -------------------------------------------------------------*/

add_action('wp_ajax_addToCart', 'addToCart');
add_action('wp_ajax_nopriv_addToCart', 'addToCart');
add_action('wp_ajax_delFromCart', 'delFromCart');
add_action('wp_ajax_nopriv_delFromCart', 'delFromCart');
add_action('wp_ajax_getFromCart', 'getFromCart');
add_action('wp_ajax_nopriv_getFromCart', 'getFromCart');
add_action('wp_ajax_sendOrder', 'sendOrder');
add_action('wp_ajax_nopriv_sendOrder', 'sendOrder');
add_action('wp_ajax_updateCount', 'updateCart');
add_action('wp_ajax_nopriv_updateCount', 'updateCart');

function addToCart()
{
    $id = $_POST['id'];
    $price = $_POST['price'];

    if (isset($_COOKIE['cartCookie'])) {
        $cookie = $_COOKIE['cartCookie'];
        $cookie = stripslashes($cookie);
        $cookie = json_decode($cookie);
        //prn($cookie);
        if (!empty($cookie->$id)) {
            $cookie->{$id}->count = $cookie->{$id}->count + 1;
            //$cookie->{$id}->price = $cookie->$id->price + $price;
        } else {
            $cookie->$id = array('count' => 1, 'price' => $price);
        }
        // prn($cookie);
        $jsonData = json_encode($cookie);
    } else {
        $newCookie = array(
            $id => array('count' => 1, 'price' => $price)
        );
        //prn($newCookie);
        $jsonData = json_encode($newCookie);
    }

    setcookie("cartCookie", $jsonData, time() + 86400, '/');
    // prn($newCookie);
    die();
}

function delFromCart()
{
    $id = $_POST['id'];
    //prn($id);
    if (isset($_COOKIE['cartCookie'])) {
        if(isset($_POST['all'])){
            setcookie("cartCookie", '', time() + 86400, '/');
        }else{
            $cookie = $_COOKIE['cartCookie'];
            $cookie = stripslashes($cookie);
            $cookie = json_decode($cookie);
            //prn($cookie);

            if (isset($cookie->{$id})) {
                unset($cookie->{$id});
            }
            // prn($cookie);
            $arr = (array) $cookie;
            $jsonData = json_encode($cookie);
            if(!empty($arr)){
                // echo "not empty";
                setcookie("cartCookie", $jsonData, time() + 86400, '/');
            }else{
                // echo "empty";
                setcookie("cartCookie", '', time() + 86400, '/');
            }


        }
    }
    // prn($newCookie);
    die();
}

function getFromCart(){
    if (isset($_COOKIE['cartCookie'])) {

        $cookie = $_COOKIE['cartCookie'];
        $cookie = stripslashes($cookie);
        $cookie = json_decode($cookie);
         //prn($cookie);

        $postIds = [];
        foreach($cookie as $key => $product){
            $postIds[] = $key;
        }

        $postIds  = implode(',',$postIds );
        //prn($postIds);
        $posts = get_posts(array(
            'post_type' => 'product',
            'include'   => $postIds,
        ));
         //prn($posts);

        $parser = new Parser();
        echo $parser->render(TM_DIR . '/view/cartproducts.php', ['products' => $cookie,'posts' => $posts]);

        die();
    }
}

function updateCart(){
    $id = $_POST['id'];
    $count = $_POST['count'];

    if (isset($_COOKIE['cartCookie'])) {
        $cookie = $_COOKIE['cartCookie'];
        $cookie = stripslashes($cookie);
        $cookie = json_decode($cookie);
        //prn($cookie);
        if (!empty($cookie->$id)) {
            $cookie->{$id}->count = $count;
            //$cookie->{$id}->price = $price;
        }
        //prn($cookie);
        $jsonData = json_encode($cookie);
    }

    setcookie("cartCookie", $jsonData, time() + 86400, '/');
    //prn($_COOKIE['cartCookie']);
    die();
}

function sendOrder(){
    global $wpdb;
    if (isset($_COOKIE['cartCookie'])) {
        $cookie = $_COOKIE['cartCookie'];
        $cookie = stripslashes($cookie);
        //идшники, кол-во и цена
        $cookie = json_decode($cookie);

        //вытаскиваем товары
        $postIds = [];
        foreach($cookie as $key => $product){
            $postIds[] = $key;
        }

        $postIds  = implode(',',$postIds );
        $posts = get_posts(array(
            'post_type' => 'product',
            'include'         => $postIds,
        ));

        $admin_email = get_option('admin_email');

        //вытаскиваем данные о заказчике
        $date = time();
        $phone = $_POST['phone'];
        $total = $_POST['total'];
        $orderdata = '';

        if(isset($_POST['adv'])){
            $address = $_POST['address'];
            $homenum = $_POST['homenum'];
            $porchnum = $_POST['porchnum'];
            $housing = $_POST['housing'];
            $aptnum = $_POST['porchnum'];
            $floor = $_POST['floor'];
            $comment = $_POST['comment'];

            $orderdata = 'Адрес: '.$address.'; № дома: '.$homenum.'; № подъезда: '.$porchnum.'; Корпус: '.$housing.'; № квартиры: '.$aptnum.'; № этажа: '.$floor.'; Коментарий: '.$comment;
        }

        $orderId = generateNumber(5);

        $product = [];

        foreach($posts as $key => $item){
            $product[] = array(
                'id' => $item->ID,
                'name' => $item->post_title,
                'count' => $cookie->{$item->ID}->count,
                'price' => $cookie->{$item->ID}->price,
            );
        };


        $wpdb->insert('orders',array(
            'order_key' => $orderId,
            'product' => json_encode($product),
            'total' => $total,
            'phone' => $phone,
            'data' => $orderdata,
            'order_dt' => $date,
        ));

        $str = 'Номер заказа: ' . $orderId . ' <br>';
        $str .= 'Телефон для связи: ' . $phone . ' <br>';
        $str .= 'Товары : ';

        $total = 0;
        foreach($product as $item){
            $total += $item['price'];
            $str .= "<br>Название: ".$item['name'];
            $str .= "<br>Количество: ".$item['count'];
            $str .= "<br>Цена: ".$item['price']."<br>";
        };

        if(!empty($orderdata)){
            $str .= 'О доставке: '.$orderdata.' </br>';
        }

        $str .= 'Итого : '.$total;

        mail($admin_email, "Заказ с сайта", $str, "Content-type: text/html; charset=UTF-8\r\n");
       // mail('sushilife2@gmail.com', "Заказ с сайта", $str, "Content-type: text/html; charset=UTF-8\r\n");
        echo $orderId;
        die();
    }

}
/*----------------------------------------------- END CART -----------------------------------------------------------*/

/*------------------------------------------- СТРАНИЦА ЗАКАЗОВ -------------------------------------------------------*/

function registerOrdersPage(){
    add_menu_page(
        'Заказы', 'Заказы', 'manage_options', 'orders', 'adminOrdersPage', '', 190
    );
}

function adminOrdersPage(){
    global $wpdb;
    $parser = new Parser();

    if(isset($_GET['del'])){
        $wpdb->delete( 'orders', ['id'=>$_GET['del']] );
    }

    $orders = $wpdb->get_results("SELECT * FROM `orders`", ARRAY_A);

    $parser->render(TM_DIR . '/view/admin/orders.php', ['orders' => $orders]);
}

add_action( 'admin_menu', 'registerOrdersPage' );

/*----------------------------------------- КОНЕЦ СТРАНИЦЫ ЗАКАЗОВ ---------------------------------------------------*/

/*------------------------------------------------ REVIEWS -----------------------------------------------------------*/

add_action('init', 'myCustomInitReviews');

function myCustomInitReviews()
{
    $labels = array(
        'name' => 'Отзывы', // Основное название типа записи
        'singular_name' => 'Отзывы', // отдельное название записи типа Book
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'view_item' => 'Посмотреть отзыв',
        'search_items' => 'Найти отзыв',
        'not_found' => 'Отзывов не найдено',
        'not_found_in_trash' => 'В корзине отзывов не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Отзывы'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor','thumbnail')
    );
    register_post_type('reviews', $args);
}

function extraFieldsReviewsRating($post)
{
    ?>
    <p>
        <span>Оценка (от 1 до 5): </span>
        <input type="text" name='extra[rating]' value="<?php echo get_post_meta($post->ID, "rating", 1); ?>">
    </p>
    <?php
}

function myExtraFieldsReviews()
{
    add_meta_box('extra_weight', 'Оценка', 'extraFieldsReviewsRating', 'reviews', 'normal', 'high');
}

add_action('add_meta_boxes', 'myExtraFieldsReviews', 1);

function reviewShortcode($atts)
{
    $scatts = shortcode_atts( array(
        'page' => '0'
    ), $atts );
    $args = array(
        'post_type' => 'reviews',
        'post_status' => 'publish',
        'posts_per_page' => 6);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser();
    if($scatts['page'] =='0'){
        $parser->render(TM_DIR . '/view/reviews.php', ['my_query' => $my_query]);
    }else{
        $parser->render(TM_DIR . '/view/reviews-all.php', ['my_query' => $my_query]);
    }

}

add_shortcode('reviews', 'reviewShortcode');

add_action( 'wp_ajax_addreview', 'addReview' );
add_action( 'wp_ajax_nopriv_addreview', 'addReview' );

function addReview()
{
    //Sanitize input data using PHP filter_var().
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $phone = $_POST["phone"];
    $rating = $_POST["rating"];
    $message = $_POST["message"];

    $post_data = array(
        'post_title'    => $name,
        'post_content'  => $message,
        'post_status'   => 'draft',
        'post_author'   => 1,
        'post_type'     => 'reviews',
    );
    $post_id = wp_insert_post( $post_data );
    update_post_meta($post_id, 'rating', $rating);

    if($_FILES['file_attach']){
        $image = wp_upload_bits($_FILES['file_attach']['name'], null, file_get_contents($_FILES['file_attach']['tmp_name']));
        generate_Featured_Image($image['url'],$post_id);
    }

    $adminMail = get_option('admin_email');

    $str = "С вашего сайта оставили отзыв:<br>";
    $str .= 'Имя: '.$name.' <br>';
    $str .= 'Email: '.$mail.' <br>';
    $str .= 'Телефон: '.$phone.' <br>';
    $str .= 'Рейтинг: '.$rating.' <br>';
    $str .= 'Отзыв : '.$message.' <br>';

    mail($adminMail, "Письмо с сайта Суши", $str, "Content-type: text/html; charset=UTF-8\r\n");

    $output = json_encode(array('message'=>'Спасибо за отзыв!'));
    die($output);
}

function generate_Featured_Image($image_url, $post_id){
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    set_post_thumbnail( $post_id, $attach_id );
}
/*----------------------------------------------- END REVIEWS --------------------------------------------------------*/

 /*MINIMIZED CONTENT*/ 
function content($num) { 
    $theContent = get_the_content(); 
    $output = preg_replace('/<img[^>]+./','', $theContent);
    $output = preg_replace('/<a[^>]+./','', $output);
    $output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
    $output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output ); 
    $limit = $num+1; 
    $content = explode(' ', $output, $limit); 
    array_pop($content); 
    $content = implode(" ",$content)."..."; 
    echo $content; 
}

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

/*------------------------------------------- СТРАНИЦА ЗАКАЗОВ -------------------------------------------------------*/

function registerRecommendPage(){
    add_menu_page(
        'Рекомендуемые товары', 'Рекомендуемые товары', 'manage_options', 'recommend', 'adminRecommendPage', '', 190
    );
}

function adminRecommendPage(){
    global $wpdb;
    $parser = new Parser();


    if($_POST){
        $wpdb->query('TRUNCATE TABLE recommend');
        //prn($_POST);
        foreach($_POST['recommended'] as $item){
            $wpdb->insert(
                'recommend',
                array( 'post_id' => $item ),
                array(  '%d' )
            );
        }
    }

    $ids = $wpdb->get_results("SELECT * FROM `recommend`", ARRAY_A);

    $parser->render(TM_DIR . '/view/admin/recommend.php', ['ids' => $ids]);
}

add_action( 'admin_menu', 'registerRecommendPage' );

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

function recommendedSC(){
    global $wpdb;

    $ids = $wpdb->get_results("SELECT * FROM `recommend`", ARRAY_A);
    //prn($ids);
    $data = [];
    foreach ($ids as $id) {
        $data[] = get_post($id['post_id']);
    }

    $parser = new Parser();
    $parser->render(TM_DIR . '/view/recommended.php', ['posts' => $data]);
}

add_shortcode('recommended', 'recommendedSC');

/*----------------------------------------- КОНЕЦ СТРАНИЦЫ ЗАКАЗОВ ---------------------------------------------------*/
/*-------------------------------------------- СЛАЙДЕР НА ГЛАВНОЙ ----------------------------------------------------*/

add_action('init', 'myCustomInitSlider');

function myCustomInitSlider()
{
    $labels = array(
        'name' => 'Картинки на главной', // Основное название типа записи
        'singular_name' => 'Фотографии', // отдельное название записи типа Book
        'add_new' => 'Добавить фотографию',
        'add_new_item' => 'Добавить новую фотографию',
        'edit_item' => 'Редактировать фотографию',
        'new_item' => 'Новая фотография',
        'view_item' => 'Посмотреть фотографию',
        'search_items' => 'Найти фотографию',
        'not_found' => 'Фотографий не найдено',
        'not_found_in_trash' => 'В корзине фотографий не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Слайдер на главной'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('thumbnail')
    );
    register_post_type('slider', $args);
}

//вывод картинок на главной
function sliderShortcode()
{
    $args = array(
        'post_type' => 'slider',
        'post_status' => 'publish',
        'posts_per_page' => -1);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser();
    $parser->render(TM_DIR . '/view/slider.php', ['my_query' => $my_query]);
}

add_shortcode('slider', 'sliderShortcode');

/*------------------------------------ КОНЕЦ СЛАЙДЕР НА ГЛАВНОЙ ------------------------------------------------------*/
/*-------------------------------------------- ПРЕИЩМУЩЕСТВА ---------------------------------------------------------*/

add_action('init', 'myCustomInitAdvantages');

function myCustomInitAdvantages()
{
    $labels = array(
        'name' => 'Преимущества', // Основное название типа записи
        'singular_name' => 'Преимущества', // отдельное название записи типа Book
        'add_new' => 'Добавить преимущество',
        'add_new_item' => 'Добавить новое преимущество',
        'edit_item' => 'Редактировать преимущество',
        'new_item' => 'Новое преимущество',
        'view_item' => 'Посмотреть преимущество',
        'search_items' => 'Найти преимущество',
        'not_found' => 'Преимуществ не найдено',
        'not_found_in_trash' => 'В корзине преимуществ не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Преимущества'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('thumbnail','title','editor')
    );
    register_post_type('advantages', $args);
}

//вывод картинок на главной
function advShortcode()
{
    $args = array(
        'post_type' => 'advantages',
        'post_status' => 'publish',
        'posts_per_page' => -1);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser();
    $parser->render(TM_DIR . '/view/advantages.php', ['my_query' => $my_query]);
}

add_shortcode('advantages', 'advShortcode');

/*-------------------------------------- КОНЕЦ ПРЕИМУЩЕСТВ -----------------------------------------------------------*/
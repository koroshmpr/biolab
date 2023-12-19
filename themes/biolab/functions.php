<?php
/** * Enqueue scripts and styles. */
//require get_theme_file_path('/inc/filter-route.php');
require get_theme_file_path('/inc/search-route.php');
function enqueue_custom_js_on_product_page() {
    if (is_product()) {
        global $product;
        $product_price = $product->get_price();
        wp_localize_script('product-quantity-script', 'productData', array(
            'productPrice' => $product_price,
        ));
    }
}

add_action('woocommerce_before_single_product', 'enqueue_custom_js_on_product_page');

function theme_scripts()
{
    wp_enqueue_style('font', get_template_directory_uri() . '/public/fonts/yekanBakh/fontface.css', array(), null);
    wp_enqueue_script('jquery-ui-sortable');
    // Add preload attributes to the enqueued font
    wp_style_add_data('font', 'preload', true);
    wp_style_add_data('font', 'as', 'font');

    // Pass variables to script
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array(), true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/public/js/app.js', array(), true);

    wp_localize_script('main-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_localize_script('main-js', 'jsData', array('root_url' => get_site_url(), 'nonce' => wp_create_nonce('my-nonce')));
}

add_action('wp_enqueue_scripts', 'theme_scripts');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
/** * Sets up theme defaults and registers support for various WordPress features. * * Note that this function is hooked into the after_setup_theme hook, which * runs before the init hook. The init hook is too late for some features, such * as indicating support for post thumbnails. */
function theme_setup()
{
    add_theme_support('custom-logo', array('height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true,));
    register_nav_menu('headerMenuLocation', 'منوی اصلی');
    register_nav_menu('headerSecondMenuLocation', 'منوی هدر دوم');
    register_nav_menu('topHeaderMenuLocation', 'منوی گوشی');
    register_nav_menu('footerLocationOne', 'منوی اول فوتر');
    register_nav_menu('footerLocationTwo', 'منوی دوم فوتر');
    register_nav_menu('footerLocationThree', 'منوی سوم فوتر');
    register_nav_menu('navigationLocation', 'منو نویگیشن');
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'theme_setup');
/** * Register widget area.
 * * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/** * @snippet
 * Add Inline Field Error Notifications @ WooCommerce Checkout * @how-to
 * Get CustomizeWoo.com FREE * @sourcecode
 * https://businessbloomer.com/?p=86570 * @author
 * Rodolfo Melogli * @compatible
 * WooCommerce 3.5.4 * @donate $9
 * https://businessbloomer.com/bloomer-armada/
 */
//add_action('woocommerce_before_single_product_summary', 'bbloomer_new_badge_shop_page', 3);
/** * Custom template tags for this theme. */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);


//require get_template_directory() . '/inc/template-tags.php';
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{
    // Check function exists.
    if (function_exists('acf_add_options_page')) {
        $parent = acf_add_options_page(array('page_title' => __('Theme General Settings'),
            'menu_title' => __('Theme Settings'), 'redirect' => false,));
        $child = acf_add_options_page(array('page_title' => __('Contact and Social'), 'menu_title' => __('Contact and Social'), 'parent_slug' => $parent['menu_slug'],));
    }
}

function add_menu_link_class($classes, $item, $args)
{
    if (isset($args->link_class)) {
        $classes['class'] = $args->link_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
//populate gravity form
/** * Populate ACF select field options with Gravity Forms */
function acf_populate_gf_forms_ids($field)
{
    if (class_exists('GFFormsModel')) {
        $choices = [];
        foreach (\GFFormsModel::get_forms() as $form) {
            $choices[$form->id] = $form->title;
        }
        $field['choices'] = $choices;
    }
    return $field;
}

add_filter('acf/load_field/name=gravity_choices', 'acf_populate_gf_forms_ids');
// helper function to find a menu item in an array of items
function wpd_get_menu_item($field, $object_id, $items)
{
    foreach ($items as $item) {
        if ($item->$field == $object_id) {
            return $item;
        }
    }
    return false;
}

/*--Offset Pre_Get_Posts pagination fix--*///
add_action('pre_get_posts', 'myprefix_query_offset', 1);
function myprefix_query_offset(&$query)
{
    if ($query->is_home() && !$query->is_main_query()) {
        return;
    }
    $offset = 3;
    $ppp = get_option('posts_per_page');
    if ($query->is_paged) {
        $page_offset = $offset + (($query->query_vars['paged'] - 1) * $ppp);
        $query->set('offset', $page_offset);
    } else {
        if ($query->is_home() && $query->is_main_query()) {
            $query->set('offset', $offset);
        }
    }
}

add_filter('found_posts', 'myprefix_adjust_offset_pagination', 1, 2);
function myprefix_adjust_offset_pagination($found_posts, $query)
{
    $offset = 3;
    if ($query->is_home()) {
        return $found_posts - $offset;
    }
    return $found_posts;
}

/** * Remove emoji CDN hostname from DNS prefetching hints. * * @param array $urls URLs to print for resource hints. * @param string $relation_type The relation type the URLs are printed for. * * @return array Difference betwen the two arrays. */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array($emoji_svg_url));
    }
    return $urls;
}

add_filter('is_xml_preprocess_enabled', 'wpai_is_xml_preprocess_enabled', 10, 1);
function wpai_is_xml_preprocess_enabled($is_enabled)
{
    return false;
}

// table of contents/** * Automatically add IDs to headings such as <h2></h2> */
function auto_id_headings($content)
{
    $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function ($matches) {
        if (!stripos($matches[0], 'id=')) {
            $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title($matches[3]) . '">' . $matches[3] . $matches[4];
        }
        return $matches[0];
    }, $content);
    return $content;
}

add_filter('the_content', 'auto_id_headings');
function get_toc($content)
{
    // get headlines
    $headings = get_headings($content, 1, 6);
    // parse toc
    ob_start();
    echo "<div class='table-of-contents'>";
    echo "<!-- Table of contents by webdeasy.de -->";
    parse_toc($headings, 0, 0);
    echo "</div>";
    return ob_get_clean();
}

function parse_toc($headings, $index, $recursive_counter)
{
    // prevent errors
    if ($recursive_counter > 60 || !count($headings)) return;
    // get all needed elements
    $last_element = $index > 0 ? $headings[$index - 1] : NULL;
    $current_element = $headings[$index];
    $next_element = NULL;
    if ($index < count($headings) && isset($headings[$index + 1])) {
        $next_element = $headings[$index + 1];
    }
    // end recursive calls
    if ($current_element == NULL) return;
    // get all needed variables
    $tag = intval($headings[$index]["tag"]);
    $id = $headings[$index]["id"];
    $classes = isset($headings[$index]["classes"]) ? $headings[$index]["classes"] : array();
    $name = $headings[$index]["name"];
    // element not in toc
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("nitoc", $current_element["classes"])) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
        return;
    }
    // parse toc begin or toc subpart begin
    if ($last_element == NULL) echo "<ul class='list-unstyled'>";
    if ($last_element != NULL && $last_element["tag"] < $tag) {
        for ($i = 0; $i < $tag - $last_element["tag"]; $i++) {
            echo "<ul class=''>";
        }
    }
    // build li class
    $li_classes = "";
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) $li_classes = " class='bold'";
    // parse line begin
    echo "<li" . $li_classes . ">";
    // only parse name, when li is not bold
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) {
        echo $name;
    } else {
        echo "<a class='' href='#" . $id . "'>" . $name . "</a>";
    }
    if ($next_element && intval($next_element["tag"]) > $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }
    // parse line end
    echo "</li>";
    // parse next line
    if ($next_element && intval($next_element["tag"]) == $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }
    // parse toc end or toc subpart end
    if ($next_element == NULL || ($next_element && $next_element["tag"] < $tag)) {
        echo "</ul>";
        if ($next_element && $tag - intval($next_element["tag"]) >= 2) {
            echo "</li>";
            for ($i = 1; $i < $tag - intval($next_element["tag"]); $i++) {
                echo "</ul>";
            }
        }
    }
    // parse top subpart
    if ($next_element != NULL && $next_element["tag"] < $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }
}

function get_headings($content, $from_tag = 1, $to_tag = 6)
{
    $headings = array();
    preg_match_all("/<h([" . $from_tag . "-" . $to_tag . "])([^<]*)>(.*)<\/h[" . $from_tag . "-" . $to_tag . "]>/", $content, $matches);
    for ($i = 0; $i < count($matches[1]); $i++) {
        $headings[$i]["tag"] = $matches[1][$i];
        // get id
        $att_string = $matches[2][$i];
        preg_match("/id=\"([^\"]*)\"/", $att_string, $id_matches);
        $headings[$i]["id"] = $id_matches[1];
        // get classes
        $att_string = $matches[2][$i];
        preg_match_all("/class=\"([^\"]*)\"/", $att_string, $class_matches);
        for ($j = 0; $j < count($class_matches[1]); $j++) {
            $headings[$i]["classes"] = explode(" ", $class_matches[1][$j]);
        }
        $headings[$i]["name"] = strip_tags($matches[3][$i]);
    }
    return $headings;
}

// TOC (from webdeasy.de)
function toc_shortcode()
{
    return get_toc(auto_id_headings(get_the_content()));
}

add_shortcode('TOC', 'toc_shortcode');
//estimated reading time
function reading_time()
{
    ob_start();
    the_content();
    $content = ob_get_clean();
    $readingtime = ceil(sizeof(explode(" ", utf8_decode($content))) / 200);
    return $readingtime;
}

function track_post_views($post_id)
{
    if (!isset($_COOKIE['post_viewed_' . $post_id])) {
        $current_views = get_post_meta($post_id, 'post_views', true);
        if ($current_views == '') {
            $current_views = 0;
        }
        $new_views = $current_views + 1;
        update_post_meta($post_id, 'post_views', $new_views);
        setcookie('post_viewed_' . $post_id, 'true', time() + 3600 * 24, '/');
    }
}

function save_rating() {
    if(isset($_POST['post_id']) && isset($_POST['rating_value'])) {
        $post_id = $_POST['post_id'];
        $rating_value = $_POST['rating_value'];
        $total_ratings = get_post_meta($post_id, 'total_ratings', true);
        $total_rating_value = get_post_meta($post_id, 'total_rating_value', true);
        if(!$total_ratings) {
            $total_ratings = 0;
        }
        if(!$total_rating_value) {
            $total_rating_value = 0;
        }
        update_post_meta($post_id, 'rating_value', $rating_value);
        update_post_meta($post_id, 'total_ratings', ++$total_ratings);
        update_post_meta($post_id, 'total_rating_value', ($total_rating_value + $rating_value));
    }
    wp_die();
}

add_action('wp_ajax_save_rating', 'save_rating');
add_action('wp_ajax_nopriv_save_rating', 'save_rating');
function modify_search_query($query) {
    if (!is_admin() && $query->is_search) {
        // Modify the query as needed
    }
}
add_action('pre_get_posts', 'modify_search_query');

function load_more_posts_scripts() {
    global $wp_query; // Ensure that $wp_query is global
//    wp_enqueue_script('load-more-posts', get_template_directory_uri() . '/js/load-more-posts.js', array('jquery'), '1.0', true);
    wp_enqueue_script('load-more-posts', get_template_directory_uri() . '/wp-content/themes/biolab/js/load-more-posts.js', array('jquery'), '1.0.1702627133', true);

    wp_localize_script('load-more-posts', 'load_more_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'posts' => json_encode($wp_query->query_vars),
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));
}
add_action('wp_enqueue_scripts', 'load_more_posts_scripts');


function load_more_posts_ajax_handler(){
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    $loop = new WP_Query( $args );

    if( $loop->have_posts() ) :
        while( $loop->have_posts() ): $loop->the_post();
            get_template_part('template-parts/blog/title-side-image_big');
        endwhile;
    endif;

    wp_reset_postdata();

    die();
}

add_action('wp_ajax_loadmore', 'load_more_posts_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'load_more_posts_ajax_handler');

function custom_post_type_args( $args, $post_type ) {
    // Change 'project' to the slug of your custom post type
    if ( 'portfolio' === $post_type ) {
        // Set the with_front parameter to false
        $args['rewrite']['with_front'] = false;
    }
    if ( 'services' === $post_type ) {
        // Set the with_front parameter to false
        $args['rewrite']['with_front'] = false;
    }
    return $args;
}

// Add this code to your theme's functions.php or in a custom plugin

// Register custom REST API endpoint for catalog submissions
function register_catalog_endpoint() {
    register_rest_route('custom/v1', '/catalogues/', array(
        'methods'  => 'POST',
        'callback' => 'handle_catalog_submission',
        'permission_callback' => function () {
            return current_user_can('manage_options');
        },
    ));
}

// Hook to register the custom REST API endpoint
add_action('rest_api_init', 'register_catalog_endpoint');

function handle_catalog_submission_action() {
    check_admin_referer('catalog_form_nonce', 'catalog_nonce');

    // Process form data
    if (isset($_POST['name'], $_POST['pages'])) {
        // Get form data
        $key_value = uniqid(); // Generate a unique key
        $name = sanitize_text_field($_POST['name']);
        $pages = intval($_POST['pages']);

        // Process and save the cover and catalogue files as needed
        $cover = ''; // Placeholder for cover image URL
        $catalogue = ''; // Placeholder for catalogue file URL

        if (isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])) {
            $cover_file = $_FILES['cover'];
            $cover = sanitize_text_field(wp_upload_bits($cover_file['name'], null, file_get_contents($cover_file['tmp_name']))['url']);
        }

        if (isset($_FILES['catalogue']) && !empty($_FILES['catalogue']['tmp_name'])) {
            $catalogue_file = $_FILES['catalogue'];
            $catalogue = sanitize_text_field(wp_upload_bits($catalogue_file['name'], null, file_get_contents($catalogue_file['tmp_name']))['url']);
        }

        // Insert data into the database or perform necessary actions
        global $wpdb;
        $table_name = $wpdb->prefix . 'vendors_catalogues';

        $wpdb->insert(
            $table_name,
            array(
                'key_value' => $key_value,
                'name' => $name,
                'pages' => $pages,
                'cover' => $cover,
                'catalogue' => $catalogue,
            ),
            array('%s', '%s', '%d', '%s', '%s')
        );
        echo 'با موفقیت ثبت شد';
    } else {
        // Handle form validation errors or provide feedback
        wp_die('Form data is missing or invalid.');
    }
}

add_action('admin_post_handle_catalog_submission', 'handle_catalog_submission_action');
add_action('admin_post_nopriv_handle_catalog_submission', 'handle_catalog_submission_action');
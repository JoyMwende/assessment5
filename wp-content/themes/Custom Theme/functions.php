<?php

function customtheme_script_enqueue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/custom/custom.css', [], '1.0.1', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/custom/custom.js', [], '1.0.1', true);

    //Bootstrap
    wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');
    wp_enqueue_style('bootstrapcss');

    wp_register_script('jsbootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
    wp_enqueue_script('jsbootstrap');
}

add_action('wp_enqueue_scripts', 'customtheme_script_enqueue');

//add header and footer menu
function customtheme_theme_setup()
{
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}

//add navwalker
if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('init', 'customtheme_theme_setup');


/**
 * THEME SUPPORT
 */

 add_theme_support('custom-background');
 add_theme_support('custom-header');
 add_theme_support('post-thumbnails');

 add_theme_support('post-formats', ['aside', 'image', 'video', 'gallery']);


//creating custom post type
function food_post_type(){
    $labels = [
        'name' => 'Foods',
        'singular_name' => 'Food',
        'add_new' => 'Add Food Item',
        'all_items' => 'All Foods',
        'add_new_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Food',
        'not_found' => 'No Items Found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Item'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability' => 'post',
        'hierarchical' => false,
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ],
        'taxonomies' => [
            'category',
            'post_tag',
            'menu_position' => 5,
            'exclude_from_search' => false
        ]
    ];

    register_post_type('food', $args);
    //portfolio is going to create the slug for permalink and $args is going to create the post type
}
add_action('init', 'food_post_type');

// CUSTOM TAXONOMY
function group_custom_taxonomy()
{
    $labels = [
        'name' => 'Groups',
        'singular_name' => 'Group',
        'search_items' => 'Search Groups',
        'all_items' => 'All Groups',
        'parent_item' => 'Parent Group',
        'parent_item_colon' => 'Parent Group',
        'edit_item' => 'Edit Group',
        'update_item' => 'Update Group',
        'add_new_item' => 'Add New Group',
        'new_item_name' => 'New Group Name',
        'menu_name' => 'Groups'
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'Group'
        ]
    ];

    register_taxonomy('Group', ['food'], $args);

    // NON-HIERARCHICAL TAXONOMY
    register_taxonomy('Fibre', ['food'], [
        'hierarchical' => false,
        'label' => 'Fibre',
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'fibre'
        ]
    ]);
}

add_action('init', 'group_custom_taxonomy');

// CUSTOM TERM FUNCTION

function customterm_get_terms($postID, $term)
{
    $termslist = wp_get_post_terms($postID, $term);

    $i = 0;

    $output = '';

    foreach ($termslist as $term) {
        $i++;

        if ($i > 1) {
            $output .= ', ';
        }
        $output .= '<a href="' . get_term_link($term) . '" >' . $term->name . '</a>';
    }

    return $output;
}
?>
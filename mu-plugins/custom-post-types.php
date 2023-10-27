<?php
/**
 * Plugin Name:  Brand taxonomy
 * Plugin URI:   https://drivdigital.no
 * Description:  Force a brand taxonomy to thrive
 * Version:      1.0.0
 */

class brand_taxonomy {
    // Nope. brand is still a taxonomy
    static function setup() {
        add_action( 'init', __CLASS__ . '::product_brand', 15 );
        add_shortcode( 'brands', __CLASS__ . '::list_brands_by_letter', 1 );
    }

    /**
     * Product Brand
     * hooked on 'init'
     */
    static function product_brand() {
        $labels = array(
            'name'                       => _x( 'برندها', 'Taxonomy General Name', 'brand-mu-plugin' ),
            'singular_name'              => _x( 'برند', 'Taxonomy Singular Name', 'brand-mu-plugin' ),
            'menu_name'                  => __( 'برند', 'brand-mu-plugin' ),
            'all_items'                  => __( 'همه برندها', 'brand-mu-plugin' ),
            'parent_item'                => __( 'برند والد', 'brand-mu-plugin' ),
            'parent_item_colon'          => __( 'برند والد:', 'brand-mu-plugin' ),
            'new_item_name'              => __( 'نام برند جدید', 'brand-mu-plugin' ),
            'add_new_item'               => __( 'افزودن برند جدید', 'brand-mu-plugin' ),
            'edit_item'                  => __( 'ویرایش برند', 'brand-mu-plugin' ),
            'update_item'                => __( 'به‌روزرسانی برند', 'brand-mu-plugin' ),
            'view_item'                  => __( 'مشاهده برند', 'brand-mu-plugin' ),
            'separate_items_with_commas' => __( 'برندها را با کاما جدا کنید', 'brand-mu-plugin' ),
            'add_or_remove_items'        => __( 'افزودن یا حذف برندها', 'brand-mu-plugin' ),
            'choose_from_most_used'      => __( 'از پراستفاده‌ترین‌ها انتخاب کنید', 'brand-mu-plugin' ),
            'popular_items'              => __( 'برندهای محبوب', 'brand-mu-plugin' ),
            'search_items'               => __( 'جستجو در برندها', 'brand-mu-plugin' ),
            'not_found'                  => __( 'یافت نشد', 'brand-mu-plugin' ),
        );

        $rewrite = array(
            'slug'         => _x( 'brand', 'Taxonomy slug', 'brand-mu-plugin' ),
            'with_front'   => true,
            'hierarchical' => false,
        );

        $capabilities = array(
            'manage_terms' => 'manage_product_terms',
            'edit_terms'   => 'edit_product_terms',
            'delete_terms' => 'delete_product_terms',
            'assign_terms' => 'assign_product_terms',
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'rewrite'           => $rewrite,
            'capabilities'      => $capabilities,
        );

        register_taxonomy( 'brand', array( 'product' ), $args );
    }

    // Shortcode function to output a list of the brands
    static function list_brands_by_letter( $atts ) {

        $atts = shortcode_atts(
            [ 'title' => __( 'Our Brands', 'brand-mu-plugin' ) ],
            $atts, 'brands' );

        $args     = [ 'hide_empty' => false ]; // Hide brands with no products
        $taxonomy = 'brand';
        $tags     = get_terms( $taxonomy, $args );
        $count    = wp_count_terms( $taxonomy, $args );
        $list     = '';
        $groups   = [];

        if ( $tags && is_array( $tags ) ) {
            // Group tags by their first letter
            foreach ( $tags as $tag ) {
                $first_letter = mb_substr( $tag->name, 0, 1, 'utf-8' );
                $first_letter = mb_strtoupper( $first_letter, 'UTF-8' );
                $groups[ $first_letter ][] = $tag;
            }

            // If we have groups available...
            if ( ! empty( $groups ) ) {
                $list .= '<div class="brand__aphabet cf">';
                $list .= '<div class="brand__aphabet--heading cf">';
                $list .= '<h2 class="brand--title">' . $atts['title'] . '</h2>';
                $list .= '<span class="brand--count">' . sprintf( __( 'Showing %d brands', 'brand-mu-plugin' ) , $count ) . '</span>';
                $list .= '</div>';
                // List each letter and their tags
                foreach ( $groups as $letter => $tags ) {
                    $list .= '<ul class="brand__group">';
                    $title = apply_filters( 'the_title', $letter );
                    if ( is_numeric( $title ) ) { $title = '123'; }
                    $list .= '<li class="brand__group--letter letter__is__' . $title . '">' . $title . '</li>';
                    foreach ( $tags as $tag ) {
                        $name = apply_filters( 'the_title', $tag->name );
                        $link = get_term_link( $tag, 'brand' );
                        $list .= '<li class="brand__group--item">';
                        $list .= '<a href="' . $link . '" class="term-name">' . $name . '</a>';
                        $list .= '</li>';
                    }
                    $list .= '</ul>';
                }
                $list .= '';
                $list .= '</div>';
                $list .= '<script>jQuery(function($){ $( ".brand__group" ).equalise(); });</script>';
            }
        } else {
            // If there are no brands, we need to output a message saying sorry
            $list .= '<div class="brand--empty">' . __( 'No brands are available', 'brand-mu-plugin' ) . '</div>';
        }

        return $list;
    }
}

brand_taxonomy::setup();
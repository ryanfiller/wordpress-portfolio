<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */
 // Set up the objects needed
 $my_wp_query = new WP_Query();
 $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));


$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
// Filter through all pages and find Portfolio's children
$page_children = get_page_children( $post->ID, $all_wp_pages );
$context['page_children'] = $page_children;
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );

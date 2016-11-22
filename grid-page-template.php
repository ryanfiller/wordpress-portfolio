<?php
/**
 * Template Name: Grid Page
 * Description: A full width grid page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
// Get post type project
'post_type' => 'work',
// Get all posts
'posts_per_page' => -1,
// Order by post date
'orderby' => array(
    'date' => 'DESC'
));

$terms = get_terms( array(
    'taxonomy' => 'portfolio_category',
    'hide_empty' => true,
) );

$context['projects'] = Timber::get_posts( $args );

$context['terms'] = $terms;

Timber::render( array( 'page-' . $post->post_name . '.twig', 'page-grid.twig' ), $context );

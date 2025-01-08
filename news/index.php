<?php
/*
Plugin Name: News Plugin
Plugin URI: https://luckadomena.pl/
Description: A simple plugin to display news.
Version: 1.0
Author: Luceq
Author URI: https://luckadomena.pl/
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Load functions.php
require_once(plugin_dir_path(__FILE__) . 'functions.php');

// Function to display news
function display_news() {
// Query for the latest blog posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
);
$query = new WP_Query($args);
// Check if there are any posts to display
if ($query->have_posts()) {
    echo '<div class="container">';
    while ($query->have_posts()) {
        $query->the_post();
        echo '<div class="news__box">';
        echo '<div class="content">';
        echo '<h2>' . get_the_title() . '</h2>';
        echo '<span>' . get_the_excerpt() . '</span>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>No news found.</p>';
}

// Restore original Post Data
wp_reset_postdata();
}

// Shortcode to display news
function news_shortcode() {
    ob_start();
    display_news();
    return ob_get_clean();
}
add_shortcode('news', 'news_shortcode');
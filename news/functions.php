<?php
// Enqueue styles and scripts
function news_plugin_enqueue_assets() {
    // Enqueue the stylesheet
    wp_enqueue_style('news-plugin-style', plugins_url('style.css', __FILE__));

    // Enqueue the script
    wp_enqueue_script('news-plugin-script', plugins_url('script.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'news_plugin_enqueue_assets');
?>
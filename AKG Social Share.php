<?php
/**
 * Plugin Name: AKG Social Share
 * Plugin URI: https://github.com/AKGarmsiri/AKG-Social-Share
 * Description: A simple plugin to let you share your posts on social media wherever you want with a shortcode.
 * Version: 1.1
 * Author: Amir Karimi Garmsiri
 * Author URI: https://www.amirkarimi.ir
 */

function akg_social_share_shortcode($atts) {
    // Get post permalink
    $post_permalink = get_permalink();

    // Create social media sharing URLs
    $facebook_url = 'https://www.facebook.com/sharer.php?u=' . urlencode($post_permalink);
    $twitter_url = 'https://twitter.com/intent/tweet?url=' . urlencode($post_permalink);
    $linkedin_url = 'https://www.linkedin.com/shareArticle?url=' . urlencode($post_permalink);
    $whatsapp_url = 'https://api.whatsapp.com/send?text=' . urlencode($post_permalink);
    $instagram_url = 'https://www.instagram.com/share?url=' . urlencode($post_permalink);

    // Shortcode attributes
    extract(shortcode_atts(array(
        'facebook' => 'yes',
        'twitter' => 'yes',
        'linkedin' => 'yes',
        'whatsapp' => 'yes',
        'instagram' => 'yes',
    ), $atts));

    // Output social media sharing links
    $output = '<div class="akg-social-share">';
    if ($facebook == 'yes') {
        $output .= '<a href="' . esc_url($facebook_url) . '" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a>';
    }
    if ($twitter == 'yes') {
        $output .= '<a href="' . esc_url($twitter_url) . '" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>';
    }
    if ($linkedin == 'yes') {
        $output .= '<a href="' . esc_url($linkedin_url) . '" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>';
    }
    if ($whatsapp == 'yes') {
        $output .= '<a href="' . esc_url($whatsapp_url) . '" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a>';
    }
    if ($instagram == 'yes') {
        $output .= '<a href="' . esc_url($instagram_url) . '" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('akg_social_share', 'akg_social_share_shortcode');

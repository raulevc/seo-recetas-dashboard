<?php
function seo_recetas_gemini_call($prompt) {
    $api_key = get_option('seo_recetas_gemini_key');
    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $api_key;

    $body = json_encode(['contents' => [['parts' => [['text' => $prompt]]]]]);

    $response = wp_remote_post($url, [
        'body' => $body,
        'headers' => [ 'Content-Type' => 'application/json' ]
    ]);

    if (is_wp_error($response)) return null;
    $result = json_decode(wp_remote_retrieve_body($response), true);
    return $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
}

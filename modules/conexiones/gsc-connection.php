<?php
if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';

function seo_recetas_get_gsc_data($startDate, $endDate) {
    $property = SEO_RECETAS_GSC_PROPERTY;

    $client = new Google_Client();
    $client->setAuthConfig(plugin_dir_path(__FILE__) . '/credentials.json');
    $client->addScope('https://www.googleapis.com/auth/webmasters.readonly');

    $service = new Google_Service_SearchConsole($client);

    $request = new Google_Service_SearchConsole_SearchAnalyticsQueryRequest([
        'startDate' => $startDate,
        'endDate' => $endDate,
        'dimensions' => ['query'],
        'rowLimit' => 10
    ]);

    $response = $service->searchanalytics->query($property, $request);

    $resultados = [];
    if ($response->getRows()) {
        foreach ($response->getRows() as $row) {
            $resultados[] = [
                'query' => $row->getKeys()[0],
                'clicks' => $row->getClicks(),
                'impressions' => $row->getImpressions()
            ];
        }
    }

    return $resultados;
}

// Submenú de prueba en el dashboard
add_action('admin_menu', function() {
    add_submenu_page(
        'seo-recetas-dashboard',
        'Test GSC',
        'Test GSC',
        'manage_options',
        'seo-recetas-test-gsc',
        'seo_recetas_test_gsc_page'
    );
});

function seo_recetas_test_gsc_page() {
    echo '<div class="wrap"><h1>Prueba de conexión a Google Search Console</h1>';

    $startDate = date('Y-m-d', strtotime('-7 days'));
    $endDate = date('Y-m-d');

    $datos = seo_recetas_get_gsc_data($startDate, $endDate);

    if (!empty($datos)) {
        echo '<table class="widefat"><thead><tr><th>Query</th><th>Clics</th><th>Impresiones</th></tr></thead><tbody>';
        foreach ($datos as $dato) {
            echo '<tr><td>' . esc_html($dato['query']) . '</td><td>' . esc_html($dato['clicks']) . '</td><td>' . esc_html($dato['impressions']) . '</td></tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<p>No se encontraron datos o la API no respondió.</p>';
    }

    echo '</div>';
}

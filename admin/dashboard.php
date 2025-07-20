<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_menu', function() {
    add_menu_page(
        'SEO Recetas Dashboard',
        'SEO Recetas',
        'manage_options',
        'seo-recetas-dashboard',
        'seo_recetas_dashboard_main',
        'dashicons-chart-pie',
        60
    );

    add_submenu_page('seo-recetas-dashboard', 'SEO AI Sugerencias', 'SEO AI Sugerencias', 'manage_options', 'seo-recetas-seo-ai', 'seo_recetas_seo_ai');
    add_submenu_page('seo-recetas-dashboard', 'Extractor de Recetas', 'Extractor de Recetas', 'manage_options', 'seo-recetas-extractor', 'seo_recetas_extractor');
    add_submenu_page('seo-recetas-dashboard', 'Generador de Etiquetas', 'Generador de Etiquetas', 'manage_options', 'seo-recetas-tags', 'seo_recetas_tags');
    add_submenu_page('seo-recetas-dashboard', 'Configuración', 'Configuración', 'manage_options', 'seo-recetas-config', 'seo_recetas_config');
});

function seo_recetas_dashboard_main() { echo '<h1>SEO Recetas Dashboard</h1>'; }
function seo_recetas_seo_ai() { echo '<h1>SEO AI Sugerencias</h1>'; }
function seo_recetas_extractor() { echo '<h1>Extractor de Recetas</h1>'; }
function seo_recetas_tags() { echo '<h1>Generador de Etiquetas</h1>'; }
// function seo_recetas_config() { echo '<h1>Configuración</h1>'; }

function seo_recetas_config() {
    if (isset($_POST['seo_recetas_debug'])) {
        update_option('seo_recetas_debug', $_POST['seo_recetas_debug']);
        echo '<div class="updated"><p>Debug actualizado.</p></div>';
    }

    $debug_activo = get_option('seo_recetas_debug', false);
    ?>

    <h1>Configuración</h1>
    <form method="post">
        <label>
            <input type="checkbox" name="seo_recetas_debug" value="1" <?php checked($debug_activo, 1); ?> />
            Activar debug exclusivo del plugin
        </label>
        <br><br>
        <input type="submit" value="Guardar ajustes" class="button button-primary" />
    </form>

    <?php
}

function seo_recetas_log($mensaje) {
    $debug_activo = get_option('seo_recetas_debug', false);

    if ($debug_activo) {
        $archivo_log = WP_CONTENT_DIR . '/debug-seo-recetas.log';
        $hora = date('Y-m-d H:i:s');
        $mensaje_formateado = "[SEO Recetas] {$hora} - {$mensaje}\n";
        error_log($mensaje_formateado, 3, $archivo_log);
    }
}
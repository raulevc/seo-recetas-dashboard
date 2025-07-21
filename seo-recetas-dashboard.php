<?php
/*
Plugin Name: SEO Recetas Dashboard
Description: Plugin unificado de SEO, interlinking, extractor y automatización para recetas.
Version: 1.6.1
Author: Raúl E. Villanueva Caro
GitHub Plugin URI: https://github.com/raulevc/seo-recetas-dashboard
*/

defined('ABSPATH') or die('Sin acceso directo');

// Cargar archivos principales
// Cargar archivos principales
require_once plugin_dir_path(__FILE__) . 'admin/dashboard.php';
require_once plugin_dir_path(__FILE__) . 'admin/config.php';

// Cargar módulos
require_once plugin_dir_path(__FILE__) . 'modules/extractor/extractor.php';
require_once plugin_dir_path(__FILE__) . 'modules/seo-sugerencias/seo-sugerencias.php';
require_once plugin_dir_path(__FILE__) . 'modules/tag-generator/tag-generator.php';
require_once plugin_dir_path(__FILE__) . 'modules/interlinking/interlinking.php';
require_once plugin_dir_path(__FILE__) . 'modules/conexiones/auth-settings.php';
require_once plugin_dir_path(__FILE__) . 'modules/conexiones/gemini-connection.php';
require_once plugin_dir_path(__FILE__) . 'modules/conexiones/gsc-connection.php';
require_once plugin_dir_path(__FILE__) . 'config-local.php';

// Helpers
require_once plugin_dir_path(__FILE__) . 'includes/helpers.php';


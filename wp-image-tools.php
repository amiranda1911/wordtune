<?php
/**
 * @package WebTools
 * @version 0.01ALPHA
 */
/*
/*
Plugin Name: WordTune
Plugin URI:  https://amiranda.dev.br/wordtune
Description: Otimizador de arquivos para wordpress.
Version:     0.01ALPHA
Author:      Anderson Miranda
Author URI:  https://amiranda.dev.br/
License:     GPL2
*/

define( 'IMAGE_TOOLS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Impede o acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

require_once IMAGE_TOOLS__PLUGIN_DIR.'admin.php';
require_once IMAGE_TOOLS__PLUGIN_DIR.'functions.php';

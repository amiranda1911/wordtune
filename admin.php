<?php
    function wordtune_plugin_page_menu_callback () {
        ?>
        <div class="wrap">
            <h2>WordTune plug-in</h2>
        </div>

        <form method="post" action="options.php">
            <?php settings_fields( 'wordtune_options' ); ?>
            <?php do_settings_sections( 'wordtune-plugin-menu' ); ?>
            <input type="submit" class="button-primary" value="Salvar">
        </form>
        <?php
    }

    function wordtune_add_menu () {
        add_menu_page("WordTune",
        "WordTune",
        "manage_options",
        "wordtune-plugin-menu",
        "wordtune_plugin_page_menu_callback",
        "");
    }

    add_action('admin_menu', 'wordtune_add_menu');

    function wordtune_conf_init () {
        add_settings_section(
            "wordtune_section_options",
            "Opçoes do Plugin",
            "wordtune_section_image_callback",
            "wordtune-plugin-menu");

        add_settings_field(
        "wordtune_image_maxsize_option",
        "Tamanho maximo da imagem",
        "wordtune_image_maxsize_callback",
        "wordtune-plugin-menu",
        "wordtune_section_options");

        register_setting(
            'wordtune_options',
            'wordtune_image_maxsize_option',
            'sanitize_text_field'
        );
    }

    function wordtune_section_image_callback () {
        echo '<p>Insira o valor maximo de tamanho do arquivo em Kb</p>';
    }
    
    function wordtune_image_maxsize_callback () {
        $option = get_option('wordtune_image_maxsize_option');
        echo '<input type="number" id="wordtune_image_maxsize_option" name="wordtune_image_maxsize_option" value="' . esc_attr($option) . '" />';
    }

    add_action('admin_init', 'wordtune_conf_init');
?>

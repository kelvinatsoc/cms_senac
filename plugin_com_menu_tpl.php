<div class="wrap">
    <h1>Configuração do Meu plug-in</h1>

    <form method="post" action="options.php">

        <?php
        settings_fields('configs-exemplo');
        do_settings_sections('configs-exemplo');
        ?>
        <label for="api-token">Token da API</label>
        <input type="text" id="api-token" name="api-token" value="<?php echo get_option('api-token'); ?>">

        <label for="api-url">URL da API</label>
        <input type="text" id="api-url" name="api-url" value="<?php echo get_option('api-url'); ?>">

        <?php submit_button(); ?>




    </form>



</div>
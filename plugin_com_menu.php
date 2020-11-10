<?php

/*
*Plugin Name: Meu primeiro plug-in
Plugin URI: https://sp.senac.br
Description: Este é um lindo plug-in desenvolvido por mim
Version: 0.0.1
Author: Kelvin Costa 
License: CC BY
*/

add_action('admin_init', 'set_configs');

function set_configs()
{
    register_setting('configs-exemplo', 'api');
    register_setting('configs-exemplo', '');
}

add_action('admin_menu', 'menu_do_meu_plugin');

function menu_do_meu_plugin()
{
}

<?php
/*
*Plugin Name: Meu primeiro plug-in
Plugin URI: https://sp.senac.br
Description: Este é um lindo plug-in desenvolvido por mim
Version: 0.0.1
Author: Kelvin Costa 
License: CC BY
*/

add_filter( 'login_errors', 'altera_msg_login'){
    function altera_msg_login(){
        return 'Credenciais invalidas';
    }
};
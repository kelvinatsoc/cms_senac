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
}

add_function colocar_og_tags(){
    if(is_single()){
        $dados_do_post = get_post(get_the_ID());
        $nome_do_site = get_bloginfo();
        
        $titulo = $dados_do_post -> post_title;
        $resumo = $dados_do_post -> post_excerpt;

        echo "\n\n\n
        <meta property='og:title' content'" . $titulo ."' >\n
        <meta property='og:site_name' content'" . $nome_do_site ."' >\n
        <meta property='og:url' content'" . $get_permalink() ."' >\n
        <meta property='og:description' content'" . $resumo ."' >\n
        \n\n\n";

    }
}
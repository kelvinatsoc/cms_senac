<?php
/*
 * Plugin Name: exemplo de CRUD na tela de configuraçao
 * Plugin URI: https://www.facebook.com/mpiesig/
 * Description: crud do admin do wordpress.
 * Version: 0.0.1
 * Author: Kelvin Costa
 * Author URI: http://www.google.com.br/
 * License: CC BY
*/

if (!defined('WPINC')) exit; // protege o codigo de ser chamado diretamente.

register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela(){
    
    global $wpdb;

    $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda  
                            ( id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            nome VARCHAR(255) NOT NULL, 
                            whatsapp BIGINT UNSIGNED NOT NULL )");
}

register_deactivation_hook(__FILE__, 'apagar_tabela');


function apagar_tabela() 
{
    
    global $wpdb;
    
    $wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}

function crud_do_meu_plugin(){
    
    add_menu_page( 'config do meu plugin',
                    'Plugin', 
                    'administrator', 
                    'meu-plugin-config', 
                    'abre_configuracoes', 
                    'dashicons-database');
 
}

add_action( 'admin_menu', 'crud_do_meu_plugin');

function abre_configuracoes()

{   
    global $wpdb;
    //consulta do editar
    if (isset($_GET['editar_form']) && !isset($_POST['alterar'])) 

    {
        $id =preg_replace('/\D/', '', $_GET['editar_form']); 
    
        $contato =$wpdb->get_results("SELECT 
                            
                                        nome,  whatsapp
                            
                                         FROM
                            
                                        {$wpdb->prefix}agenda 
                            
                                        WHERE 
                                        
                                        id = $id");

        require 'form_editar_tpl.php';

        exit();

    }

    if ( isset($_POST['alterar']))
    
    {
                if ($wpdb->query($wpdb->prepare("UPDATE 
                                                {$wpdb->prefix}agenda
                                            SET
                                                nome = %s, whatsapp = %d
                                           WHERE
                                               id = %d",
                                        $_POST['nome'],
                                        $_POST['whatsapp'],
                                        $_POST['id'])))
                
                                       
        {
            $msg_alterar = 'Registro alterado com sucesso!';
        
        }  else 
        
        {
            $erro_alterar = 'Falha ao tentar alterar o registro!';
        }
    }


    //apagar
    if (isset($_GET['apagar'])){
        
        $id =preg_replace('/\D/', '', $_GET['apagar']); 

        $wpdb->query("DELETE FROM {$wpdb->prefix}agenda WHERE id=$id");
    }

    //gravar
    if (isset($_POST['submit'])) 
    {

        if ($_POST['submit'] == 'gravar') 
        {
            $wpdb->query(
                $wpdb ->prepare("  INSERT INTO {$wpdb->prefix}agenda
                                                (nome, whatsapp) 
                                            VALUES 
                                                
                                                (%s, %d)", $_POST['nome'], $_POST['whatsapp']) );
        }

    }


    $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");
    
    require 'lista_tpl.php';
}

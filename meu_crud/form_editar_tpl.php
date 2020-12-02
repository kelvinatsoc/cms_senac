<div class="wrap">
    
    <h1>MEU CRUD</h1>

    <br><br>
    <form method="post">

    <?php
        if (isset($msg_alterar))
        {
            echo "<font color='green'>$msg_alterar</font>";
        }
        if (isset($erro_alterar))
        {
            echo "<font color='red'>$erro_alterar</font>";
        }
    ?>
    <table border="1" width="50%">
        <tr>
            <td>Nome</td>
            <td>whatsapp</td>
            <td></td>
        </tr>
        <tr>
            <td align="center">Nome:<input type="text" name="nome" placeholder="Preencha o seu nome" 
            
            value="<?php echo $contato[0]->nome;?>"></td>
            
            <td align="center">Whatsapp:<input type="text" name="whatsapp" placeholder="Whatsapp"
            
            value="<?php echo $contato[0]->whatsapp;?>"></td>
            
            <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>

            <input type="hidden" name="alterar" value="1">
            
            <td><?php submit_button('alterar'); ?></td>
        </tr>

        </table>
    </form> 

</div>
<div class="wrap">
    
    <h1>MEU CRUD</h1>

    <br><br>
    <form method="post">
    <table border="1" width="50%">
        <tr>
            <td>Nome</td>
            <td>whatsapp</td>
            <td></td>
            <td></td>
        </tr>

        <?php
            foreach($contatos as $k =>$v)
            {
                
                echo "<tr>
                        <td>{$v->nome}</td>
                        <td>{$v->whatsapp}</td>
                        <td><a href='?page={$_GET['page']}&apagar={$v->id}'>apagar</a></td>
                        <td><a href='?page={$_GET['page']}&editar_form={$v->id}'>editar</a></td>
                    </tr>";
            }
        ?>
            <tr>
                <td align="center">Nome:<input type="text" name="nome" placeholder="Preencha o seu nome"></td>
                <td align="center">Whatsapp:<input type="text" name="whatsapp" placeholder="Whatsapp"></td>
                <td></td>
                <td><?php submit_button('gravar'); ?></td>
            </tr>

        </table>
    </form> 

</div>
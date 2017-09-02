<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        require_once './conexao.php';
        
        $pdo = Conectar();
        
        $id = 1;
        
        $delete = $pdo->prepare("DELETE FROM logins WHERE logi_pk_int_id = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
        
        if($delete->rowCount() > 0){
            echo "<div>Usuário excluido com sucesso</div>";
        }else{
            echo "<div>O usuário não pode ser excluido</div>";
        }
        
        
        ?>
    </body>
</html>

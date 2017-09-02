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
        require_once './config.php';
        require_once './connection.php';
        require_once './database.php';


        $dados = array(
            'logi_str_nick' => 'Lucas Pires',
            'logi_dt_nascimento' => '2017-01-01',
            "logi_dec_salario" => 2100.000
        );

        /* Abrir conexão */
        $link = DBConnect();

        /* Inserção simples */
        $nome = "Douglas";
        $query = "INSERT INTO logins (logi_str_nick) VALUE ('$nome');";
        DBEscape($query);

        /* Inserção com função generica para todas as tableas
         * Ideia muito boa */
        /* Chava a função de inserção no banco */
        
        var_dump(DBCreate("logins", $dados, true));
        
        /* Fechar conexão */
        DBClose($link);
        ?>
    </body>
</html>

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
        
        /* Abrir conexão */
        $link = DBConnect();

        $cliente = array(
            "logi_str_nick" => "Novo Nome",
            "logi_dt_nascimento" => "2017-01-02"
        );


        $retorno = DBUpdate("logins", $cliente, "logi_pk_int_id = 2");
        
        
        var_dump($retorno);


        /* Fechar conexão */
        DBClose($link);
        ?>
    </body>
</html>

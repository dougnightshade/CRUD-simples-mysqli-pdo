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

        var_dump(DBDelete("logins", "logi_pk_int_id = 4"));

        /* Fechar conexão */
        DBClose($link);
        ?>
    </body>
</html>

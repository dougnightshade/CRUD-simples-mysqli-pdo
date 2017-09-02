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

        /* Leitura, listagem, consulta */

        /* Seleção d todos os dados e campos da tabela */
        $clientes = DBRead("logins");

        /* Seleção de todos os dados da tabela
         * tem de ser passado o segundo parametro para que não aja erro sobre o
         * valor nulo presente nele */
//        $clientes = DBRead("logins", null,  "logi_str_nick, logi_dec_salario");

        /* Seleção dos dados da tabela com filtros e todos os campos */
//        $clientes = DBRead("logins", "WHERE logi_str_nick = 'Douglas'");

        /* Só para mostrar os valores */
        var_dump($clientes);


        /* Fechar conexão */
        DBClose($link);
        ?>
    </body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Index de conexão</title>
    </head>
    <body>
        <?php
        require_once './config.php';
        require_once './connection.php';
        require_once './database.php';

        /* Váriaveis */
        $dados = array(
            'logi_str_nick' => 'Lucas Pires',
            'logi_dt_nascimento' => '2017-01-01',
            "logi_dec_salario" => 2100.000
        );

        /* Abrir conexão */
        $link = DBConnect();



        /* Fechar conexão */
        DBClose($link);
        ?>
    </body>
</html>
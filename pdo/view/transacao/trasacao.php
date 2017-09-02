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
        require_once '../../model/connection/conexao.php';
        $pdo = Conectar();


        $nick = "Douglas";
        $nascimento = "1995-02-16";
        $salario = 109123.9128319283;

        try {
            /* Abre a permissão para iniciar as transações */
            $pdo->beginTransaction();
            /* Gera as querys */
            $query1 = $pdo->query("SELECT * FROM logins");
            $query2 = $pdo->query("INSERT INTO logins (logi_str_nick, logi_dt_nascimento, logi_dec_salario) VALUES ({$nick}, {$nascimento}, {$salario});");

            /* Comfirma todas as transações feitas dentro da abetura e da confirmação */
            $pdo->commit();
        } catch (Exception $ex) {
            $pdo->rollBack();
//            die("Erro: {$ex->getMessage()}");
            echo "Errro";
        }
        ?>
    </body>
</html>

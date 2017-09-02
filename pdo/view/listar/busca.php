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
        include './conexao.php';

        $pdo = Conectar();

        /* Contar retorno */
        $buscasegura = $pdo->prepare("SELECT * FROM  logins WHERE logi_str_nick = :nome");
        $buscasegura->bindValue(':nome', "Lucas Pires");
        $buscasegura->execute();


        echo $buscasegura->rowCount();


        /* Busca retirada do manual */
        /* Execute a prepared statement by passing an array of values */
//        $sql = "SELECT * FROM  logins WHERE logi_str_nick = :nome;";
//        $sth = $dbh->prepare($sql);
//        $sth->bindValues(":nome", "Douglas");
//        $sth->execute();
//        $red = $sth->fetchAll();
//        $sth->execute(array(':calories' => 175, ':colour' => 'yellow'));
//        $yellow = $sth->fetchAll();
        ?>
    </body>
</html>

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
        include_once './conexao.php';
        $pdo = Conectar();
        
        $nick = "DougNightshade2";
        $nascimento = "1995-02-16";
        $salario = 10.10;
//
//        $login = array(
//            "logi_str_nick" => "Dougnightshade",
//            "logi_dt_nascimento" => "1995-02-16",
//            "logi_dec_salario" => 100.22
//        );
//
//        $values = implode("', '", $login);
//        var_dump($values);
//
//
//        /* Crio a variavel com a conexão, está váriavel vai receber a query de 
//        inserção preparada preparada pelo método prepare */
//        $insert = $pdo->prepare("INSERT INTO logins(logi_str_nick, logi_dt_nascimento, logi_dec_salario) 
//        VALUES (:nick, :nascimento, :salario);");
//        /* COnfiguro os parâmetro da query */
//        $insert->bindValue(":nick", $nick, PDO::PARAM_STR);
//        $insert->bindValue(":nascimento", $nascimento);
//        $insert->bindValue(":salario", $salario);
//        try {
//            /* Mando executar a query */
////            var_dump($insert->execute());
//        } catch (PDOException $ex) {
//            echo "Exception {$ex->getMessage()}";
//        }

        /* Verifica se já existe algum nick cadastrado */
        /* Crio a variavel com a conexão, está váriavel vai receber a query de 
         * inserção preparada preparada pelo método prepare */
        $insert = $pdo->prepare("INSERT INTO logins(logi_str_nick, logi_dt_nascimento, logi_dec_salario) "
                . "VALUES (:nick, :nascimento, :salario);");
        /* COnfiguro os parâmetro da query */
        $insert->bindValue(":nick", $nick, PDO::PARAM_STR);
        $insert->bindValue(":nascimento", $nascimento);
        $insert->bindValue(":salario", $salario);

        /* Executo um select que verifica se o nick recebido já existe no banco,
         *  caso já existe ele deve retornar  */
        $validar = $pdo->prepare("SELECT * FROM logins WHERE logi_str_nick = :nick");
        $validar->bindValue(":nick", $nick);
//        $validar->execute();
        if ($validar->rowCount() == 0) {
            $insert->execute();
        } else {
            echo "Este nick já existe!";
        }
        ?>
    </body>
</html>

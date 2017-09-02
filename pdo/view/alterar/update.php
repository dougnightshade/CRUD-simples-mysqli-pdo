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

        $nick = "Test1e";
        $nascimento = "1995-02-17";
        $salario = 1.12312312;

        /* Quando necessitar pegar algum dado via get ou post poso utilizar métodos como
         * o addslashes para adicionar / em caracteres que podem ocorrer problemas dentro
         * da query */
        $stringSuja = "aksd13.d;asdasdqp´weqw";
        $stringLimpa = addslashes($stringSuja);
        echo "<br/>String Suja: {$stringSuja}";
        echo "<br/>String Limpa: {$stringLimpa}";

        /* O mesmo para o comentário de cima, mas dessa vez limpando caracteres 
         * e espaços */
        $stringLimpa = trim($stringSuja);
        echo "<br/><br/>String Suja: {$stringSuja}";
        echo "<br/>String Limpa: {$stringLimpa}";

        /* Prepara a query de atualização e os parãmetros */
        $update = $pdo->prepare("UPDATE logins SET logi_dt_nascimento = :nascimento WHERE logi_str_nick like :nick");
        $update->bindValue(":nick", $nick, pdo::PARAM_STR);
        $update->bindValue(":nascimento", $nascimento, pdo::PARAM_STR);

        /* Trata erros caso ocorra algum erro na execução */
        try {
            $update->execute();
            /* Para saber se ocorreu algum evento dentro da query executada
             * 
             * Caso o retorno do rowCount for maior que zero quer dizer que houve 
             * alguma modificação
             * 
             * Cao o retorno do rowCount seja igual a zero quer dizer que não houve 
             * nenhuma modificação */
            if ($update->rowCount() > 0) {
                echo "<br/><br/>Maior que 0";
            } else {
                echo "<br/><br/>Menor que 0";
            }
        } catch (Exception $ex) {
            echo "<h1>{$ex->getMessage()}</h1>";
        }
        ?>
    </body>
</html>

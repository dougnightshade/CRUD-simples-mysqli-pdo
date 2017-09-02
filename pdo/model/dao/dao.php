<?php

include_once './conexao.php';


/* Recebe como parâmetro uma tabela e uma condição, se a condição for verdadeira
 * deve retorna true, caso seja false deve retornar false */

function Validar($tabela, $condicao) {

    $sql = "SELECT * FROM {$tabela} WHERE {$condicao}";
    $validador = $pdo->prepare($sql);
    $validador->execute();

    return $validador;
}

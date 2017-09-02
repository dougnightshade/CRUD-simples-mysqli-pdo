<?php

/* Deleta os itens recebidos por parametro na tabela recebida */

function DBDelete($table, $where = NULL) {
    /* Crio a clausula where com o parametro recebido */
    $where = ($where) ? " WHERE {$where}" : NULL;
    $query = "DELETE FROM {$table}{$where}";

    return DBExecute($query);
}

/* Altera os dados do array na tabela informada */

function DBUpdate($table, array $dados, $where = NULL, $insertID = false) {
    /* Necessito criar um array com os indices e os valores do array para 
     * usar este array como fields de alteração */
    foreach ($dados as $key => $value) {
        /* O novo array recebe o valor key que representa o indice do array e o valor
         * do indice dentro de uma string conjunto */
        $fields[] = "{$key} = '{$value}'";
    }
    /* Pego o array criado e gero uma string com todos os valores do array 
     * separados por virgula */
    $fields = implode(", ", $fields);

    /* Crio a clausula where com o parametro recebido */
    $where = ($where) ? " WHERE {$where}" : NULL;

    /* Organizo tudo que foi recebido e produzido para a query */
    $query = "UPDATE {$table} SET {$fields} {$where}";

    /* Retorno a execução da query pela função execute */
    return DBExecute($query, $insertID) or die(mysqli_error($link));
}

function DBRead($table, $params = NULL, $fields = "*") {
    /* Ternario para configurar a váriavel params caso ela não seja nula/0 com um espaço
     * para separar a query */
    $params = ($params) ? " {$params}" : NULL;

    $query = "SELECT {$fields} FROM {$table} {$params}";
    $result = DBExecute($query);

    /* Se o número de linhas for diferente de 0 */
    if (!mysqli_num_rows($result)) {
        return false;
    } else {
        /* Percorre o array passado via parametro e configura-o na variavel criada */
        while ($res = mysqli_fetch_assoc($result)) {
            /* O indice em branco faz com que o php entenda que a várivael e um array
             * mas não tem alocação de tamanho */
            $data[] = $res;
        }

        /* Retorna a váriavel com todos os valores retirados do banco */
        return $data;
    }
}

/* Função generia de inserção, feita para criar de acordo com o array que e passado
 * o insert para o banco de dados
 * o array passado deve ter os nomes do indices identicos aos campos da tabela
 * caso o parâmetro insertID seja verdadeiro a função retorna o valor do Id inserido */

function DBCreate($table, array $data, $insertID = false) {
    /* Limpa valores improprios para query */
    $data = DBEscape($data);

    /* (PHP 4, PHP 5, PHP 7)
     * implode — Junta elementos de uma matriz em uma string
     * array_keys -- Pega os valores de indice do araray passado via parâmetro */
    $fields = implode(",", array_keys($data));

    /* Ganbiarra foda para colocar aspas simples antes e depois de cada valor
     * Muito bem pensada e funciona perfeitamente, o unico problema e que fique 
     * pensando sobre valores numericos, mas apesar de serem números todo valor 
     * tudo que recebido da interface e inicialmente string */
    $values = "'" . implode("', '", $data) . "'";

    /* Utiliza-se a função implode acima para separa os valores e serar uma string 
     * com todos eles, depois variavies para o insert */
    $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

    return DBExecute($query, $insertID) or die(mysqli_error($link));
}

function DBExecute($query, $insertID = false) {
    $link = DBConnect();
    /* Executa a query recebida, caso ocorra um erro/die o sistema exibe o erro */
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    /* Se o parametro insertID recebido for verdadeiro recebo o valor do id
     * inserido e coloco na variavel do resultado */
    if ($insertID) {
        $id = mysqli_insert_id($link);
        echo "insertID true {$id}";
    }

    DBClose($link);
//    return $result;
    return $id;
}

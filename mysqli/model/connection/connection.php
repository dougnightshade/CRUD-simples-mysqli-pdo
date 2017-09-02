<?php

/* Realiza a verificação se a variável recebida como parâmentro é propriamente
 * uma string apropriada para uma query */

function DBEscape($dados) {
    $link = DBConnect();

    if (!is_array($dados)) {
        /* Verifica se a função e uma string completa sem problemas e execução 
         * como uma query */
        $dados = mysqli_real_escape_string($link, $dados);
    } else {
        $array = $dados;

        /* Foreach para percorrer cada valor e indece do array recebido e permitir passar pela função de escape e limpeza */
        foreach ($array as $key => $value) {
            $key = mysqli_real_escape_string($link, $key);
            $value = mysqli_real_escape_string($link, $value);

            /* Faz com que o array na posição da key receba o valor corretoF */
            $dados[$key] = $value;
        }
    }

    DBClose($link);
    return $dados;
}

/* Fecha a conexão recebe a conexão com o banco */

function DBClose($link) {
    mysqli_close($link) or die(mysqli_error($link));
}

/* Cria e retorna a conexão para o banco de dados mysql */

function DBConnect() {
    /* Caso a conexão caia será informado o erro via a função die */
    $link = mysqli_connect(db_hostname, db_username, db_password, db_database) or die(mysqli_error($link));
    /* Configura o charset para o schema selecionado do banco de dados */
    mysqli_set_charset($link, db_charset) or die(mysqli_error($link));
    return $link;
}

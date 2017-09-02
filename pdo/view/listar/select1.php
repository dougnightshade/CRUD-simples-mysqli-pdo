<?php

include './conexao.php';

$pdo = Conectar();

$select = $pdo->prepare("SELECT * FROM logins;");
$select->execute();

//$logins = $select->Fetch(PDO::FETCH_ASSOC);
//
//while ($logins = $select->fetch(PDO::FETCH_ASSOC)){
//    /* Mostra apenas os valores especificados dentro do array */
//    echo "Nick: {$logins['logi_str_nick']}, Nascimento: {$logins['logi_dt_nascimento']}<br/>";    
//}

/* Gera um array com todos os valores recebidos */
//$logins = $select->fetchAll(PDO::FETCH_ASSOC);
//var_dump($logins);

/* Geral o objeto com todos os valorees recebidos */
$logins = $select->fetchAll(PDO::FETCH_OBJ);
//var_dump($logins);
foreach($logins as $lista){
    echo "Logins: <pre>{$lista->logi_str_nick} <>Nascimento: {$lista->logi_dt_nascimento}</pre>";
}
<?php

    session_start();

    //trabalhando na montagem do texto, str_replace tirando o caractere e adicionando um espaço em branco
    $titulo = str_replace(' - ', '',$_POST['titulo']);
    $categoria = str_replace(' - ', '',$_POST['categoria']);
    $descricao = str_replace(' - ', '',$_POST['descricao']);

    $texto = $_SESSION['id'] .' - '. $titulo .' - '. $categoria .' - '. $descricao . PHP_EOL;

    //abrindo arquivo
    $abrir_arquivo = fopen('arquivo.txt','a');

    //escrevendo arquivo
    fwrite($abrir_arquivo, $texto);

    //fechando arquivo
    fclose($abrir_arquivo);

    header('location:consultar_chamado.php')
?>
<?php
    $conexao = new PDO('mysql:host=localhost;dbname=cruddes', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
?>
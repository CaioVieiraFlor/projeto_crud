<?php
    require "../back-end/conexao.php";
    
    $stmt = $conexao->prepare("SELECT * FROM clientes");
    if ($stmt->execute()) {
        $rs = $stmt->fetch(PDO::FETCH_OBJ);
        $id = $rs->ID;
    }

    if((isset($_POST["cnpj"]) && $_POST["cnpj"] != null) && (isset($_POST["razao_soc"]) && $_POST["razao_soc"] != null) && (isset($_POST["nome_fan"]) && $_POST["nome_fan"] != null) && (isset($_POST["valor_fat"]) && $_POST["valor_fat"] != null) && (isset($_POST["bairro"]) && $_POST["bairro"]) && (isset($_POST["logradouro"]) && $_POST["logradouro"]) && (isset($_POST["numero"]) && $_POST["numero"]) && (isset($_POST["cep"]) && $_POST["cep"]) && (isset($_POST["municipio"]) && $_POST["municipio"])){
            $stmt = $conexao->prepare("UPDATE clientes SET RAZAO_SOC='".$_POST['razao_soc']."', NOME_FAN='".$_POST['nome_fan']."', VALOR_FAT='".$_POST['valor_fat']."', BAIRRO='".$_POST['bairro']."', LOGRADOURO='".$_POST['logradouro']."', NUMERO='".$_POST['numero']."', CEP='".$_POST['cep']."', MUNICIPIO='".$_POST['municipio']."' WHERE ID = $id");
            $stmt->execute();
            echo "A alteração foi realizada com sucesso !";
    }
?>
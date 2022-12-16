<?php
    //Conexão com o banco de dados
    require "../back-end/conexao.php";

    if((isset($_POST["cnpj"]) && $_POST["cnpj"] == null) || (isset($_POST["data_ger"]) && $_POST["data_ger"] == null) || (isset($_POST["valor_ven"]) && $_POST["valor_ven"] == null)){
        //echo "Insira os valores acima para prosseguir !";
    }else if((isset($_POST["cnpj"]) && $_POST["cnpj"] != null) && (isset($_POST["data_ger"]) && $_POST["data_ger"] != null) && (isset($_POST["valor_ven"]) && $_POST["valor_ven"] != null)){
            $stmt = $conexao->prepare("SELECT * FROM clientes WHERE CNPJ = '".$_POST['cnpj']."'");
            if($stmt->execute()){
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id = $rs->ID;

                if(empty($stmt)){
                    echo "Esse cliente não está cadastrado !";
                }else {
                    $stmt = $conexao->prepare("INSERT INTO vendas (data_ger, valor_ven, ID_CLIENTES) VALUES (?,?,?)");
                    $stmt->execute(array($_POST['data_ger'], $_POST['valor_ven'], $id));
                        echo "Cadastrado com sucesso!";
                }
        }
    }
?>
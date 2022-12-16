<?php
    //Conexão com o banco de dados
    require "../back-end/conexao.php";
    
    //Verifica se o formulário enviou informações.
    if((isset($_POST["cnpj"]) && $_POST["cnpj"] != null) && 
    (isset($_POST["razao_soc"]) && $_POST["razao_soc"] != null) && (isset($_POST["nome_fan"]) && $_POST["nome_fan"] != null) && 
    (isset($_POST["valor_fat"]) && $_POST["valor_fat"] != null) && (isset($_POST["bairro"]) && $_POST["bairro"]) != null && 
    (isset($_POST["logradouro"]) && $_POST["logradouro"]) != null && (isset($_POST["numero"]) && $_POST["numero"]) != null && 
    (isset($_POST["cep"]) && $_POST["cep"]) != null && 
    (isset($_POST["municipio"]) && $_POST["municipio"]) != null)  {
        
        $stmt = $conexao->prepare("INSERT INTO clientes (cnpj, razao_soc, nome_fan, valor_fat, bairro, logradouro, numero, cep, municipio) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($_POST['cnpj'], $_POST['razao_soc'], $_POST['nome_fan'], $_POST['valor_fat'], $_POST['bairro'],$_POST['logradouro'], $_POST['numero'], $_POST['cep'], $_POST['municipio']));
        echo "Cliente cadastrado !";
    }
?>
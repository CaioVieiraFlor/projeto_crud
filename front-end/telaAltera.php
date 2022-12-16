<?php
    require "../back-end/alterar.php";
    require "../back-end/conexao.php";

    if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $_REQUEST["id"] != ""){
        $stmt = $conexao->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->bindParam(1, $_REQUEST["id"], PDO::PARAM_INT);

        if($stmt->execute()){
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->ID;
            $cnpj = $rs->CNPJ;
            $razao_soc = $rs->RAZAO_SOC;
            $nome_fan = $rs->NOME_FAN;
            $valor_fat = $rs->VALOR_FAT;
            $bairro = $rs->BAIRRO;
            $logradouro = $rs->LOGRADOURO;
            $numero = $rs->NUMERO;
            $cep = $rs->CEP;
            $municipio = $rs->MUNICIPIO;
        }else{
            throw new PDOException(("Erro: Não foi possível executar a declaração sql"));
        }
}        
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Altera Cadastro</title>
</head>
<body>
<div class="header">
        <div class="acesso">
            <a class="link" href="../front-end/index.php">Inicio</a>
            <a class="link" href="../front-end/telaCadastro.php">Cadastro</a>
            <a class="link" href="../front-end/telaConsultaCliente.php">Clientes</a>
            <a class="link" href="../front-end/telaVendas.php">Vendas</a>
        </div><!--acesso-->
        <h1>Consulta de cadastros</h1>
    </div><!--header-->

<div class="banner">
    <div class="conteudo" id="table">
        <table border="1" width="100%">
            <?php
                $stmt = $conexao->prepare("SELECT * FROM clientes");
                if ($stmt->execute()) {
                    $rs = $stmt->fetch(PDO::FETCH_OBJ);
                }
            ?>
            <form action="../front-end/telaAltera.php" method="POST">
                <tr>
                    <th>CNPJ <?php echo "<td>".$rs->CNPJ."</td>" ?> 
                        <td><input type="text" onblur="checkCnpj(this.value)" name="cnpj"></td>
                    </th>
                </tr>
                <tr>
                    <th>Razão Social <?php echo "<td>".$rs->RAZAO_SOC."</td>" ?></th>
                    <td><input id="razao_soc" type="text" name="razao_soc"></td>
                </tr>
                <tr>
                    <th>Nome Fantasia <?php echo "<td>".$rs->NOME_FAN."</td>" ?></th>
                    <td><input id="nome_fan" type="text" name="nome_fan"></td>
                </tr>
                <tr>
                    <th>Valor de Faturamento <?php echo "<td>".$rs->VALOR_FAT."</td>" ?></th>
                    <td><input id="valor_fat" type="text" name="valor_fat"></td>
                </tr>
                <tr>
                    <th>Bairro <?php echo "<td>".$rs->BAIRRO."</td>" ?></th>
                    <td><input id="bairro" type="text" name="bairro"></td>
                </tr>
                <tr>
                    <th>Logradouro <?php echo "<td>".$rs->LOGRADOURO."</td>" ?></th>
                    <td><input id="logradouro" type="text" name="logradouro"></td>
                </tr>
                <tr>
                    <th>Número <?php echo "<td>".$rs->NUMERO."</td>" ?></th>
                    <td><input id="numero" type="text" name="numero"></td>
                </tr>
                <tr>
                    <th>CEP <?php echo "<td>".$rs->CEP."</td>" ?></th>
                    <td><input id="cep" type="text" name="cep"></td>
                </tr>
                <tr>
                    <th>Municipio <?php echo "<td>".$rs->MUNICIPIO."</td>" ?></th>
                    <td><input id="municipio" type="text" name="municipio"></td>
                </tr
                <tr>
                    <td><td style="text-align: right; border-left: hidden; border-right:hidden;">
                    <input style="margin-top: 12px;" type="submit" value="Salvar Alteração"/></td></td>
                </tr>
            </form>
        </table>
    </div><!--conteudo-->
</div><!--banner-->
</body>
<script>
        function checkCnpj(cnpj){
            $.ajax({
                'url': 'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
                'type': "GET",
                'dataType': 'jsonp',
                'success': function(data){
                    if(data.nome == undefined){
                        alert(data.status + ' ' + data.message)
                    }else{
                        document.getElementById('razao_soc').value = data.nome;
                        document.getElementById('nome_fan').value = data.fantasia;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('numero').value = data.numero;
                        document.getElementById('cep').value = data.cep;
                        document.getElementById('municipio').value = data.municipio;
                    }
                }
            })
        }
    </script>
</html>
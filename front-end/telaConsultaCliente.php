<?php
    require "../back-end/cadastraCliente.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end//style.css">
    <title>Consulta cliente</title>
</head>
<body>
    <div class="header">
        <div class="acesso">
            <a class="link" href="../front-end/index.php">Inicio</a>
            <a class="link" href="../front-end/telaCadastro.php">Cadastro</a>
            <a class="link" href="../front-end/telaConsultaCliente.php">Clientes</a>
            <a class="link" href="../front-end/telaVendas.php">Vendas</a>
        </div><!--acesso-->
        <h1>Consulta de Cadastros</h1>
    </div><!--header-->
    <div class="banner">
        <div class="conteudo">
            <table border="1" width="100%">
                <tr>
                    <th>CNPJ</th>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>Valor de Faturamento</th>
                    <th>Bairro</th>
                    <th>Logradouro</th>
                    <th>Número</th>
                    <th>CEP</th>
                    <th>Municipio</th>
                    <th></th>
                </tr>

                <?php
                    require "../back-end/consultaCliente.php";

                ?>
            </table>
        </div><!--conteudo-->
    </div><!--banner-->
</body>
</html>
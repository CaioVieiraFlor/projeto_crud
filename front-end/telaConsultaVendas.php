<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end/style.css">
    <title>Vendas</title>
</head>
<body>
<div class="header">
        <div class="acesso">
            <a class="link" href="../front-end/index.php">Inicio</a>
            <a class="link" href="../front-end/telaCadastro.php">Cadastro</a>
            <a class="link" href="../front-end/telaConsultaCliente.php">Clientes</a>
            <a class="link" href="../front-end/telaVendas.php">Vendas</a>
        </div><!--acesso-->
        <h1>Vendas</h1>
    </div><!--header-->

    <div class="banner">
        <div class="conteudo">
            <table border="1" width="100%">
                <tr>
                    <th>CNPJ do Cliente</th>
                    <th>Data de Geração</th>
                    <th>Valor da Venda</th>
                    <th></th>
                </tr>
                <?php
                    require "../back-end/consultaVendas.php";
                ?>
            </table>
        </div><!--conteudo-->
    </div><!--banner-->

</body>
</html>


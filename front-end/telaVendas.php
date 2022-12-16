<?php
    require "../back-end/vendas.php";
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end/style.css">
    <title>Cadastro de clientes</title>
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

            <div class="visualizar-vendas">
                <a href="./telaConsultaVendas.php">
                    <button>Visualizar vendas</button>
                </a><!--visualizar-->
            </div>

            <div class="formulario-vendas">
                <!--Formulário enviando as informações para essa mesma página-->
                <form action="telaVendas.php" method="POST">
                    <input type="hidden" name="id_vendas">
                    <span>CNPJ do Cliente:</span>
                    <input type="text" name="cnpj" placeholder="Qual o CNPJ do cliente ?">
                    <span>Data de Geração:</span>
                    <input type="text" name="data_ger" placeholder="Qual a data de geração ?">
                    <span>Valor da Venda:</span>
                    <input type="text" name="valor_ven" placeholder="Qual o valor da venda ?">
                    <br>
                    <input type="submit" value="Gerar"></input>
                </form>
            </div><!--formulario-vendas-->

        </div><!--bannet-->
    </div><!--conteudo-->
</body>
</html>


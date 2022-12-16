<?php
    require_once "../back-end/cadastraCliente.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../front-end/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="acesso">
            <a class="link" href="../front-end/index.php">Inicio</a>
            <a class="link" href="../front-end/telaCadastro.php">Cadastro</a>
            <a class="link" href="../front-end/telaConsultaCliente.php">Clientes</a>
            <a class="link" href="../front-end/telaVendas.php">Vendas</a>
        </div><!--acesso-->
        <h1>Cadastro de clientes</h1>
    </div><!--header-->
    <div class="banner">
        <div class="conteudo">
            <div class="formulario">
            <!--Formulário enviando as informações para essa mesma página-->
                <form action="telaCadastro.php" method="POST">
                    <h2>Preencha o formulário !</h2>
                    <input type="hidden" name="id">
                    <span>CNPJ:</span>
                    <input class="input" type="text" onblur="checkCnpj(this.value)" name="cnpj" placeholder="Qual o CNPJ ?">
                    <span>Razão Social:</span>
                    <input type="text" id="razao_soc" name="razao_soc" placeholder="Qual a razão social ?">
                    <span>Nome fantasia:</span>
                    <input type="text" id="nome_fan" name="nome_fan" placeholder="Qual o nome fantasia?">
                    <span>Valor de faturamento:</span>
                    <input type="text" name="valor_fat" placeholder="Qual o valor de faturamento?">
                    <span>Bairro:</span>
                    <input type="text" id="bairro" name="bairro" placeholder="Qual o bairro?">
                    <span>Logradouro:</span>
                    <input type="text" id="logradouro" name="logradouro" placeholder="Qual o logradouro?">
                    <span>Número:</span>
                    <input type="text" id="numero" name="numero" placeholder="Qual o número?">
                    <span>CEP:</span>
                    <input type="text" id="cep" name="cep" placeholder="Qual o cep?">
                    <span>Municipio:</span>
                    <input type="text" id="municipio" name="municipio" placeholder="Qual o municipio?">
                    <br/><br/>
                    <input type="submit" value="Cadastrar"></input>
                </div><!--banner-->
            </div><!--conteudo-->
        </form>
    </div><!--banner-->

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
</body>
</html>
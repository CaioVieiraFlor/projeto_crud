<?php
require "../back-end/conexao.php";
require "../back-end/cadastraCliente.php";

    //Deleta cadastro de cliente.
    if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST['id'] != ""){
        $stmt = $conexao->prepare("SELECT * FROM vendas WHERE ID_CLIENTES = '".$_REQUEST['id']."'");
        $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_OBJ);

        if($rs == null){
            $stmt = $conexao->prepare("DELETE FROM clientes WHERE id = ?");
            $stmt->bindParam(1, $_REQUEST['id'], PDO::PARAM_INT);
            if($stmt->execute()){
                echo "Registro foi excluido com êxito";
                $_REQUEST['id'] = null;
            }else {
                throw new PDOException("Erro: não foi possível executar a declaração sql");
            }
        }else{
            echo "Esse cliente não pode ser excluido !";
        }
    }

    $stmt = $conexao->prepare("SELECT * FROM clientes");
    if ($stmt->execute()) {
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->CNPJ."</td>
                <td>".$rs->RAZAO_SOC."</td>
                <td>".$rs->NOME_FAN."</td>
                <td>".$rs->VALOR_FAT."</td>
                <td>".$rs->BAIRRO."</td>
                <td>".$rs->LOGRADOURO."</td>
                <td>".$rs->NUMERO."</td>
                <td>".$rs->CEP."</td>
                <td>".$rs->MUNICIPIO."</td><td>
                <a href=telaAltera.php?act=upd&id=$rs->ID>
                <button style='width: 50px; height:20px; color: white; background-color: #d90f19;
                border: hidden; border-radius: 3px; margin-left: 10px;'>Alterar</button>
                </a>".
                "<a href=?act=del&id=$rs->ID>
                <button style='width: 50px; height: 20px; color: white; background-color: #d90f19;
                border: hidden; border-radius: 3px; margin-top: 5px; margin-left: 10px'>Excluir</button>
                </a></td>";
                echo "</tr>";
        }
    }
?>

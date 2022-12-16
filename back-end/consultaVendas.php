<?php
    require "../back-end/conexao.php";

    if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST['id_vendas'] != ""){
        $stmt = $conexao->prepare("DELETE FROM vendas WHERE id_vendas = '".$_REQUEST['id_vendas']."'");
            if($stmt->execute()){
                echo "Registro foi excluido com êxito";
                $_REQUEST['id_vendas'] = null;
            }else {
                throw new PDOException("Erro: não foi possível executar a declaração sql");
            }
    }

    $stmt = $conexao->prepare("SELECT * 
    FROM vendas v JOIN clientes c 
    ON v.ID_CLIENTES = c.ID 
    WHERE v.ID_CLIENTES");

    if ($stmt->execute()) {
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->CNPJ."</td>
                <td>".$rs->DATA_GER."</td>
                <td>".$rs->VALOR_VEN."</td><td>             
                <a href=?act=del&id_vendas=$rs->ID_VENDAS>
                <button style='width: 50px; height:20px; color: white; background-color: #d90f19;
                border: hidden; border-radius: 3px; margin: 5px;'>Excluir</button></a></td>";
                echo "</tr>";
        }
    }
?>
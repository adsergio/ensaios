<?php

require_once("../../../conexao.php"); 

$nome_item = $_POST['nome-item'];
$valor_item= $_POST['valor-item'];
$id_carac_prod = $_POST['id_carac_item'];
$acrescimo_item= $_POST['acrescimo-item'];

if($nome_item == ""){
	echo 'Digite uma descrição para o item!';
	exit();
}

if($acrescimo_item == ""){
	$acrescimo_item = 0;
}


	$res = $pdo->query("SELECT * FROM carac_itens where nome = '$nome_item' and id_carac_prod = '$id_carac_prod' "); 
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	if(@count($dados) > 0){
			echo 'Item para Esta caracteristica já cadastrado!';
			exit();
		}





$pdo->query("INSERT INTO carac_itens (id_carac_prod, nome, valor_item, ativo, valor) VALUES ('$id_carac_prod', '$nome_item', '$valor_item', 'Sim', '$acrescimo_item')");


echo 'Salvo com Sucesso!!';

?>
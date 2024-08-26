<?php

require_once("../../../conexao.php"); 

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM promocao_banner where ativo = 'Sim' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

if(@count($res) >= 1){
	echo 'Você não pode Ter mais que uma Promoções Ativa!!';
	exit();
}

$pdo->query("UPDATE promocao_banner SET ativo = 'Sim' WHERE id = '$id'");

echo 'Ativado com Sucesso!!';

?>
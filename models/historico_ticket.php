<?php
class historico_ticket extends model{
	public function __construct(){
		parent::__construct();

	}
	//model mostrar histórico na tela.
	public function historicoTicket($codigoProduto){
		$array = array();
		//SQL Q PEGA TODOS AONDE CODIGO IGUAL ao codigo do produto e ordernar pela data de ATT
		$sql = "SELECT * FROM historico_ticket WHERE codigo = '$codigoProduto' ORDER BY data_att ASC";

		$sql = $this->db->query($sql);
		$array = $sql->fetchAll();

		return $array;

	}

	//adicionar historico ticket
	public function adicionarTicket($codigoProduto, $nomeUsuario, $texto){
		$sql = "INSERT INTO historico_ticket SET data_att = NOW(), codigo = '$codigoProduto', nome_usuario = '$nomeUsuario', texto = '$texto'";
		$sql = $this->db->query($sql);
		//chamando classe que muda data att
		$ticket = new ticket;

		$ticket->atualizaDataAtt($codigoProduto);
		return true;
	}



}



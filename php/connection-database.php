<?php 
	try {
		
		$conexao = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '\bd\smart-search.db', "", "");

		
	} catch (PDOException $e) {
		echo "Erro ao conectar com o banco de dados. " . $e->getMessage();
	}
	
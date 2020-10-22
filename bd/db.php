<?php 
	try {
		
		$conexao = new PDO("sqlite:smart-search.db");
		
	} catch (PDOException $e) {
		echo "Erro ao conectar com o banco de dados. " . $e->getMessage();
	}
	
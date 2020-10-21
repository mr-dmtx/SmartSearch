<?php 

	public function cadastrarCliente($name, $email, $pass)
	{
		$conexao = new PDO("sqlite:../bd/smart-search.db");

		$insert = "INSERT INTO usuario(nm_email, nm_usuario, cd_senha) values (:email, :name, :pass);";

		$cmd = $conexao->prepare(':email', $email);
		$cmd = $conexao->prepare(':name', $name);
		$cmd = $conexao->prepare(':pass', $pass);

		$v = $cmd->execute();

	}

	public function verificarEmail($email)
	{	
		$conexao = new PDO("sqlite:../bd/smart-search.db");

		$select = "SELECT nm_email FROM usuario WHERE nm_email = ':email'";

		$cmd = $conexao->prepare($select);

		$cmd->bindParam(':email', $email);

		$v = $cmd->execute();

		$v = $cmd->fetch();

		return (!$v) ? true : false;


	}
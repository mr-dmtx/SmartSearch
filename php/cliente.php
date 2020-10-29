<?php 

	function cadastrarCliente($name, $email, $pass)
	{
		require 'connection-database.php';

		$insert = "INSERT INTO usuario(nm_email, nm_usuario, cd_senha) values (:email, :name, :pass);";

		$cmd = $conexao->prepare($insert);
		$cmd->bindParam(':name', $name);
		$cmd->bindParam(':email', $email);
		$cmd->bindParam(':pass', $pass);

		$v = $cmd->execute();

		

	}

	function verificarEmail($email)
	{	
		//phpinfo();
		try {
			require 'connection-database.php';

			$select = 'SELECT nm_email FROM usuario WHERE nm_email = ?';

			$cmd = $conexao->prepare($select);

			$cmd->bindValue(1, $email, PDO::PARAM_STR);

			$cmd->execute();

			$v = $cmd->fetch();

			return (!$v) ? true : false;

		} catch (PDOException $e) {
			echo "Erro ao verificar email! " .$e->getMessage();
		}
		
	}

	function loginCliente($email, $senha){

		try {
			
			require 'connection-database.php';

			$select = "SELECT nm_email, cd_senha FROM usuario WHERE nm_email = ? and cd_senha = ? ";

			$cmd = $conexao->prepare($select);

			$cmd->bindParam(1, $email);
			$cmd->bindParam(2, $senha);

			$cmd->execute();

			$v = $cmd->fetchAll();

			return (count($v) == 1) ? true : false;


		} catch (PDOException $e) {
			echo "Erro reallizar login! " . $e->getMessage();
		}


	}
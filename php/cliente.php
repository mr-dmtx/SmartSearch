<?php 

	function cadastrarCliente($name, $email, $pass)
	{
		require $_SERVER['DOCUMENT_ROOT'] . '/bd/db.php';

		$insert = "INSERT INTO usuario(nm_email, nm_usuario, cd_senha) values (:email, :name, :pass);";

		$cmd = $conexao->prepare($insert);
		$cmd->bindParam(':name', $name);
		$cmd->bindParam(':email', $email);
		$cmd->bindParam(':pass', $pass);

		$cmd->execute();

	}

	function verificarEmail($email)
	{	
		try {
			require $_SERVER['DOCUMENT_ROOT'] . '/bd/db.php';

			$select = 'SELECT nm_email FROM usuario WHERE nm_email = :email';

			$cmd = $conexao->prepare($select);

			$cmd->bindParam(':email', $email, PDO::PARAM_STR);

			$cmd->execute();

			$v = $cmd->fetch();

			return (!$v) ? true : false;

		} catch (PDOException $e) {
			echo "Erro ao verificar email! " .$e->getMessage();
		}
		
	}
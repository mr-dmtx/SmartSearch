<?php 

	function cadastrarCliente($name, $email, $pass, $type)
	{
		require 'connection-database.php';

		$insert = "INSERT INTO usuario(cd_usuario, nm_email, nm_usuario, cd_senha) values (:id, :email, :name, :pass);";

		$id = codigoCliente($type);
		$cmd = $conexao->prepare($insert);
		$cmd->bindParam(':id', $id);
		$cmd->bindParam(':name', $name);
		$cmd->bindParam(':email', $email);
		$cmd->bindParam(':pass', $pass);

		$v = $cmd->execute();
	}

	function atualizarCliente($name, $email, $pass, $id){
		require 'connection-database.php';

		$update = "UPDATE usuario(nm_email, nm_usuario, cd_senha) 
					SET nm_email = ':email',
						nm_usuario = ':name',
						cd_senha = ':pass' 
					WHERE cd_usuario = :id;";

		$cmd = $conexao->prepare($update);

		$cmd->bindParam(':email', $email);
		$cmd->bindParam(':name', $name);
		$cmd->bindParam(':pass', $pass);
		$cmd->bindParam(':id', $id);
		
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

	function codigoCliente($type)
	{
		require 'connection-database.php';

		$codigo = 0;
		$rep = true;
		while ($rep) {
			$codigo = mt_rand(1000, 9998);

			if($type == 1 and $codigo%2 == 1){
				$codigo += 1;
			}
			elseif ($type == 2 and $codigo%2 == 0) {
				$codigo += 1;
			}

			$select = "SELECT cd_usuario FROM usuario WHERE cd_usuario == :id";

			$cmd = $conexao->prepare($select);

			$cmd->bindParam(":id", $codigo);

			$cmd->execute();

			$v = $cmd->fetchAll();
			if(count($v) == 0){
				$rep = false;
			}
			
		}
		
		return $codigo;

	}

	function getCodigo($email){
		require 'connection-database.php';

		$select = "select cd_usuario from usuario where nm_email = :email";

		$cmd = $conexao->prepare($select);

		$cmd->bindParam(':email', $email);

		$v = $cmd->execute();

		$v = $cmd->fetchAll();

		return $v[0]["cd_usuario"];

	}
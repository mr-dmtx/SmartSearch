<?php 
	
	function cadastrarLoja($cnpj, $cep, $tel, $email)
	{

		try {
			require 'connection-database.php';

			$select = "SELECT cd_usuario FROM usuario WHERE nm_email = ? limit 1";
			//
			$cmd = $conexao->prepare($select);

			$cmd->bindParam(1, $email);

			$v = $cmd->execute();

			$v = $cmd->fetchAll();

			$insert = "INSERT INTO loja(cd_cnpj, cd_cep, cd_telefone, fk_usuario_loja, fk_plano_loja) values (:cnpj, :cd_cep, :cd_tel, :usuario, 1);";

			$cmd = $conexao->prepare($insert);
			$cmd->bindParam(':cnpj', $cnpj);
			$cmd->bindParam(':cd_cep', $cep);
			$cmd->bindParam(':cd_tel', $tel);
			$cmd->bindParam(':usuario', $v[0]["cd_usuario"]);

			$v = $cmd->execute();

			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	function cadastrarEnderecoLoja($cnpj, $endereco, $numero, $cidade, $bairro, $complemento, $uf)
	{
		try {
			require 'connection-database.php';

			$insert = "INSERT INTO endereco (nm_endereco, cd_numero_endereco, nm_cidade, nm_bairro, cd_complemento, sg_uf, fk_loja_endereco) values (:endereco, :num, :cidade, :bairro, :complemento, :sg_uf, :cnpj)";

			$cmd = $conexao->prepare($insert);
			$cmd->bindParam(':endereco', $endereco);
			$cmd->bindParam(':num', $numero);
			$cmd->bindParam(':cidade', $cidade);
			$cmd->bindParam(':bairro', $bairro);
			$cmd->bindParam(':complemento', $complemento);
			$cmd->bindParam(':cnpj', $cnpj);
			$cmd->bindParam(':sg_uf', $uf);
			$v = $cmd->execute();
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}

	function verificarCNPJ($cnpj)
	{
		require "connection-database.php";

		$select = "SELECT cd_cnpj FROM loja WHERE cd_cnpj = :cnpj";

		$cmd = $conexao->prepare($select);

		$cmd->bindParam(':cnpj', $cnpj);

		$v = $cmd->execute();

		$v = $cmd->fetch();

		return (!$v) ? true : false;
	}

 ?>
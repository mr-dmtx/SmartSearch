<?php 

	require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';

	$submit = $_POST['submit'] ?? null;
	$aviso = '';
	if(!is_null($submit)){
		$pass = md5($_POST['pass']);
		$repass = md5($_POST['repeat-pass']);
		if($pass == $repass){
			$email = $_POST['email'];
			if(verificarEmail($email)){
				$name = $_POST['name'];
				cadastrarCliente($name, $email, $pass, 1);
                header("location: ../login/login.php");
			}
			else{
				$aviso = "Esse email já esta em uso!";
			}
		}
		else{
			$aviso = "As senhas não conferem!";
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Cadastro de Cliente - Smart Search
        </title>
        <meta name="author" content="Daniel Mendoza">
<meta name="description" content="Plataforma de divulgação para pequenas lojas. ">
<link rel="shortcut icon" href="ss.ico" type="image/x-icon">

<meta property="og:title" content="Smart Search">
<meta name="og:description" content="Plataforma de divulgação para pequenas lojas. ">
<meta property="og:image" content="ss.png">
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../css/bootstrap-icons-1.1.0">
<meta name="keywords" content="lojas pequenasprodutossmart search">
<meta name="robots" content="">
<meta name="revisit-after" content="1 day">
<meta name="language" content="Portuguese">
<meta name="generator" content="N/A">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <!--===============================================================================================-->
                <link href="images/icons/favicon.ico" rel="icon" type="image/png"/>
                <!--===============================================================================================-->
                <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
                    <!--===============================================================================================-->
                    <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                        <!--===============================================================================================-->
                        <link href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet" type="text/css">
                            <!--===============================================================================================-->
                            <link href="fonts/iconic/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css">
                                <!--===============================================================================================-->
                                <link href="vendor/animate/animate.css" rel="stylesheet" type="text/css">
                                    <!--===============================================================================================-->
                                    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css">
                                        <!--===============================================================================================-->
                                        <link href="vendor/animsition/css/animsition.min.css" rel="stylesheet" type="text/css">
                                            <!--===============================================================================================-->
                                            <link href="vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
                                                <!--===============================================================================================-->
                                                <link href="vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
                                                    <!--===============================================================================================-->
                                                    <link href="css/util.css" rel="stylesheet" type="text/css">
                                                        <link href="css/main.css" rel="stylesheet" type="text/css">
                                                            <!--===============================================================================================-->
                                                        </link>
                                                    </link>
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body style="background-color: #999999;">
        <div class="limiter">
            <div class="container-login100">
                <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                </div>
                <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                    <form class="login100-form validate-form" method="post" action="#">
                        <span class="login100-form-title p-b-59">
                            Cadastre-se
                        </span>
                        <span style="color: red;">
                        	<?=$aviso?>
                            <br>
                        </span>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Digite seu nome completo
                            </span>
                            <input class="input100" name="name" placeholder="Nome..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Precisamos de um email valido exemplo: ex@abc.xyz">
                            <span class="label-input100">
                                Digite seu Email
                            </span>
                            <input class="input100" name="email" placeholder="Email ..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Digite a senha
                            </span>
                            <input class="input100" name="pass" placeholder="*************" type="password">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo corretamente">
                            <span class="label-input100">
                                Repita a senha
                            </span>
                            <input class="input100" name="repeat-pass" placeholder="*************" type="password">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn">
                                </div>
                                <button type="submit" value="submit" name="submit" class="login100-form-btn">
                                    Cadastrar
                                </button>
                            </div>
                            <a class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30" href="../login/login.php">
                                Você ja tem uma conta? Clique aqui
                                <i class="fa fa-long-arrow-right m-l-5">
                                </i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js">
        </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js">
        </script>
        <script src="vendor/daterangepicker/daterangepicker.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js">
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js">
        </script>
    </body>
</html>
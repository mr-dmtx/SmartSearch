<?php
	
	try {

		session_start();

		require '../php/cliente.php';

		if(isset($_SESSION['email'])){
			header("location: ../inicio/index.php");
		}

		$submit = $_POST['submit'] ?? null;
		$aviso = "";
		if(!is_null($submit)){
			$email = $_POST['email'];
			$senha = $_POST['pass'];

			if(loginCliente($email, md5($senha))){
				$_SESSION['email'] = $email;
                $_SESSION['id'] = getCodigo($email);
				header("location: ../inicio/index.php");
			}
			else{
				$aviso = "Email ou senha invalidos!";
			}
		}
		
	} catch (Throwable $e) {
		$aviso = "Erro ao realizar autenticação! " . $e->getMessage(); 
	}
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Login - Smart Search
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
                            <link href="vendor/animate/animate.css" rel="stylesheet" type="text/css">
                                <!--===============================================================================================-->
                                <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css">
                                    <!--===============================================================================================-->
                                    <link href="vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
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
            </meta>
        </meta>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                    <form class="login100-form validate-form" action="#" method="post">
                        <span class="login100-form-title p-b-55">
                            Login

                        </span>
                        <span style="color: red; text-align: center;">
                        	<?=$aviso?>
                        </span>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" name="email" placeholder="Email" type="text">
                                <span class="focus-input100">
                                </span>
                                <span class="symbol-input100">
                                    <span class="lnr lnr-envelope">
                                    </span>
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                            <input class="input100" name="pass" placeholder="Senha" type="password">
                                <span class="focus-input100">
                                </span>
                                <span class="symbol-input100">
                                    <span class="lnr lnr-lock">
                                    </span>
                                </span>
                            </input>
                        </div><!--
                        <div class="contact100-form-checkbox m-l-4">
                            <input class="input-checkbox100" id="ckb1" name="remember-me" type="checkbox">
                                <label class="label-checkbox100" for="ckb1">
                                    Lembre-me
                                </label>
                            </input>
                        </div>-->
                        <div class="container-login100-form-btn p-t-25">
                            <button type="submit" name="submit" value="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                        <div class="text-center w-full p-t-115">
                            <span class="txt1">
                                Ainda não esta cadastrado?
                            </span>
                            <a class="txt1 bo1 hov1" href="lojaoucliente.html">
                                Cadastre-se agora
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
        <script src="vendor/bootstrap/js/popper.js">
        </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js">
        </script>
    </body>
</html>
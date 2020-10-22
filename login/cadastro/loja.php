<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Cadastro Loja
        </title>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
                    <form>
                        <span class="login100-form-title p-b-59">
                            Cadastre-se
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
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                CNPJ
                            </span>
                            <input class="input100" id="cnpj" onblur="validarCNPJ(this.value)" name="cnpj" placeholder="CNPJ..." type="text">
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
                            <input class="input100" name="pass" placeholder="*************" type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo corretamente">
                            <span class="label-input100">
                                Repita a senha
                            </span>
                            <input class="input100" name="repeat-pass" placeholder="*************" type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                CEP
                            </span>
                            <input class="input100" id="cep" name="cep" placeholder="CEP..." type="text" onblur="pesquisacep(this.value)">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Rua
                            </span>
                            <input class="input100" name="rua" id="rua" placeholder="Rua..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Nº
                            </span>
                            <input class="input100" id="n" name="numRua" placeholder="Nº..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Cidade
                            </span>
                            <input class="input100" name="cidade" id="cidade" placeholder="Cidade..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Bairro
                            </span>
                            <input class="input100" name="bairro" id="bairro" placeholder="Bairro..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Complemento
                            </span>
                            <input class="input100" name="Complemento" placeholder="Complemento..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Estado
                            </span>
                            <input class="input100" name="uf" id="uf" placeholder="Estado..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Telefone
                            </span>
                            <input class="input100" id="celular" name="celular" placeholder="Telefone..." type="text">
                                <span class="focus-input100">
                                </span>
                            </input>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Preencha esse campo">
                            <span class="label-input100">
                                Escolha o plano que deseja:
                            </span>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>
                                    Grátis
                                </option>
                                <option>
                                    Plano Bronze R$ 15,00
                                </option>
                                <option>
                                    Plano Prata R$ 35,00
                                </option>
                                <option>
                                    Plano Ouro R$ 50,00
                                </option>
                            </select>
                            <span class="focus-input100">
                            </span>
                            <a class="txt2 hov1" href="#">
                                Clique aqui para saber mais sobre os planos
                            </a>
                        </div>
                        <div class="flex-m w-full p-b-33">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" name="remember-me" type="checkbox">
                                    <label class="label-checkbox100" for="ckb1">
                                        <span class="txt1">
                                            Eu aceito
                                            <a class="txt2 hov1" href="#">
                                                Termos de uso
                                            </a>
                                        </span>
                                    </label>
                                </input>
                            </div>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn">
                                </div>
                                <button class="login100-form-btn">
                                    Cadastrar
                                </button>
                            </div>
                            <a class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30" href="../login/login.html">
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
        <script src="js/buscar-cep.js"></script>
        <script src="js/validar-cnpj.js"></script>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript">
        </script>
        <script src="js/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="js/jquery.mask.min.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
			$("#n").mask("000000000000")
			$("#celular").mask("(00) 0000-00009")
			$("#cep").mask("00.000-000")
			$("#cnpj").mask("00.000.000/0000-00")})
        </script>
    </body>
</html>
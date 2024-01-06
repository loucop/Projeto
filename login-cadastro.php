<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
        echo"<script>window.location = index.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login-cadastro.css">
    <script type = "text/JavaScript" src = "script/jquery.js"></script>
    <script type = "text/JavaScript" src = "script/acesso.js"></script>
    <script src="https://kit.fontawesome.com/41540e039d.js" crossorigin="anonymous"></script>
</head>

<body>
    <a class="img" href="index2.html"><img class="img" src="img/logo-hdr.png"></a>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo!</h2>
                <p class="description description-primary">Crie seu login no nosso site. Caso já tenha registro,</p>
                <p class="description description-primary">aperte no botão abaixo e faça seu login.</p>
                <button id="signin" class="btn btn-primary">Login</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="https://www.facebook.com/TelecallBr">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="https://telecall.com/">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="https://www.linkedin.com/company/telecall/">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Utilize o seu email para se cadastrar:</p>
                <p class="description description-second">ou insira suas informações pessoais e crie uma conta:</p>
                <form id="form" class="form" method="post" action="cadastro.php">
                    <div id="msgSuccess"></div>
                    <div id="msgError"></div>

                    <label class="label-input" for="nome">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="nome" name="nome" placeholder="Nome" required minlength="15" maxlength="60" onKeyUp="maiuscula(this)">
                    </label>

                    <label class="label-input" for="cpf">
                        <i class="fa-solid fa-id-badge"></i>
                        <input type="text" id="cpf" name="cpf" placeholder="CPF" required maxlength="14" onkeydown="ajustaCpf(this)" onkeypress="ajustaCpf(this)" onkeyup="ajustaCpf(this)">
                    </label>

                    <label class="label-input" for="sexo">
                        <i class="fa-solid fa-mars-and-venus"></i>
                        <select id="sexo" name="Sexo" required>
                            <option value="" selected disabled>Selecione o sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outros</option>
                        </select>
                    </label>

                    <label class="label-input" for="nomeMaterno">
                        <i class="fa-solid fa-person-dress"></i>
                        <input type="text" id="nomeMaterno" name="nomeMaterno" placeholder="Nome Materno" required minlength="15" maxlength="60" onKeyUp="maiuscula(this)">
                    </label>

                    <label class="label-input" for="email">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="E-mail">
                    </label>

                    <label class="label-input" for="tel">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" id="tel" name="tel" placeholder="Telefone fixo" required maxlength="15" onkeydown="ajustaTelefone(this)" onkeypress="ajustaTelefone(this)" onkeyup="ajustaTelefone(this)">
                    </label>

                    <label class="label-input" for="cel">
                        <i class="fa-solid fa-mobile-retro"></i>
                        <input type="tel" id="cel" name="cel" placeholder="Telefone celular" required maxlength="15" onkeydown="ajustaCelular(this)" onkeypress="ajustaTelefone(this)" onkeyup="ajustaTelefone(this)">
                    </label>

                    <label class="label-input" for="cep">
                        <i class="fa-solid fa-house"></i>
                        <input type="text" name="cep" name="cep" id="cep" placeholder="CEP" required maxlength="9" onkeydown="ajustaCep(this)" onkeypress="ajustaCep(this)" onkeyup="ajustaCep(this)">
                    </label>

                    <label class="label-input" for="rua">
                        <i class="fa-solid fa-map-pin"></i>
                        <input type="text" id="rua" name="rua" placeholder="Rua" required onKeyUp="maiuscula(this)">
                    </label>

                    <label class="label-input" for="bairro">
                        <i class="fa-solid fa-map-pin"></i>
                        <input type="text" id="bairro" name="bairro" placeholder="Bairro" required onKeyUp="maiuscula(this)">
                    </label>

                    <label class="label-input" for="cidade">
                        <i class="fa-solid fa-map-pin"></i>
                        <input type="text" id="cidade" name="cidade" placeholder="Cidade" required onKeyUp="maiuscula(this)">
                    </label>

                    <label class="label-input" for="estado">
                        <i class="fa-solid fa-map-pin"></i>
                        <input type="text" id="estado" name="estado" placeholder="Estado" required onKeyUp="maiuscula(this)">
                    </label>

                    <label class="label-input" for="data">
                        <i class="fa-solid fa-calendar-days"></i>
                        <input type="text" id="data" name="data" placeholder="Data de nascimento" required maxlength="10" onkeydown="ajustaData(this)" onkeypress="ajustaData(this)" onkeyup="ajustaData(this)">
                        
                    </label>

                    <label class="label-input" for="login">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" id="login" name="login" placeholder="Login" required minlength="6" maxlength="6">
                    </label>

                    <label class="label-input" for="senha">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="senha" name="senha" placeholder="Senha" required minlength="8" maxlength="8">
                    </label>

                    <label class="label-input" for="confSenha">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="confSenha" name="confSenha" placeholder="Confirme sua senha" required minlength="8" maxlength="8">
                    </label>


                    <button id="btnCadastro" class="btn btn-second">Criar</button>
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá, visitante!</h2>
                <p class="description description-primary">Se ainda não tiver cadastro,</p>
                <p class="description description-primary">insira os seus dados e cadastre-se.</p>
                <button id="signup" class="btn btn-primary">cadastrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Siga nossas redes sociais.</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="https://www.facebook.com/TelecallBr">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="https://telecall.com/">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="https://www.linkedin.com/company/telecall/">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Faça login no nosso site:</p>
                <form id="form2" class="form" method="post" action="">

                    <div id="msgLoginError"></div>
                    <label class="label-input" for="login">
                        <i class="fa-solid fa-user"></i>
                        <input id="loginFim" type="text" placeholder="Login" required>
                    </label>
                    <label class="label-input" for="senhaFim">
                        <i class="fa-solid fa-lock"></i>
                        <input id="senhaFim" type="password" placeholder="Senha" required>
                    </label>

                    <a class="password" href="#">Esqueceu sua senha?</a>
                    <button id = "btnEntrar" class = "inputSubmit" type = "submit" name = "acessar" value= "ACESSAR">ENTRAR</button>
                    <button id="">LIMPAR</button>
                    
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="js/login-cadastro.js"></script>
</body>

</html>
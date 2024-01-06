<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acoes/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'index.php'</script>";
}

$erro = -1;
if (isset($_GET['erro']))
{
    $erro = $_GET['erro'];
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

/** Visualização dos dados*/

$query = $conexao->query("SELECT id, nome, cpf, nomemae, datanasc, email, celular, fixo, sexo, cep, rua, numero, complemento, bairro, cidade, uf FROM usuarios WHERE id = $id;");

$item = $query->fetch(PDO::FETCH_OBJ);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/alteracao.css" />
    <script src="https://kit.fontawesome.com/41540e039d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Alteração de registro - <?php echo $nome; ?></title>
    <?php
    if ($adm) {
    ?>
        <script type="text/javascript" src="script\jquery.js"></script>
    <?php
    }
    ?>
</head>
<body>
    <header>
        <div id="content">
            <div id="user">
                <span><?php echo $adm ? $nome . " (ADM)" : $nome; ?></span>
            </div>
            <span class="logo">Sistema de acesso</span>
            <div id="logout">
                <a href="acoes/logout.php"><button>Logout</button></a>
            </div>
        </div>
    </header>
    <div id="content">
        <?php if ($adm) : ?>
            <div id="subheader">
                <ul>
                    <php if ($adm) : ?>
                        <li><a href="cadastro.php">Cadastrar Usuário </a></li>
                        <li><a href="consultar.php">Consultar cadastro Usuário</a></li>
                        <li><a href="dashboard.php">Listar Usuário</a></li>
                        <li><a href="modelo_bd.php">Modelo do Banco de Dados</a></li>
                        <li><a id="btnVoltar" href="visualizacao.php">Voltar para tela anterior</a></li>
                        
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <br>
    <h1>Alterar Usuário</h1>
    <?php
        if ($erro == 0):
    ?>
        <p class="sucesso">Atualizado com sucesso!</p>
    <?php 
        elseif ($erro > 0):
    ?>
        <p class="erro">Problemas na atualização!</p>
    <?php 
        endif;
    ?>
    <form action="bd_atualizar.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de Formulário</legend>
            <div>
                <label for="nome">Nome (obrigatório): </label>
                <input type="text" name="nome" id="nome" value="<?php echo $item->nome; ?>" required>
            </div>
            <div>
                <label for="cpf">CPF: </label>
                <input type="text" name="cpf" id="cpf" value="<?php echo $item->cpf; ?>" required>
            </div>
            <div>
                <label for="nomemae">Nome Materno: </label>
                <input type="text" name="nomemae" id="nomemae" value="<?php echo $item->nomemae; ?>" required>
            </div>
            <div>
                <label for="datanasc">Data de nascimento</label>
                <input type="text" name="datanasc" id="datanasc" value="<?php echo $item->datanasc;?>" required>
            </div>
            <div>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?php echo $item->email; ?>" required>
            </div>
            <div>
                <label for="celular">Celular: </label>
                <input type="text" name="celular" id="celular" value="<?php echo $item->celular; ?>" required>
            </div>
            <div>
                <label for="fixo">Fixo: </label>
                <input type="text" name="fixo" id="fixo" value="<?php echo $item->fixo; ?>" required>
            </div>
            <div>
                <label for="sexo">Sexo: </label>
                <input type="text" name="sexo" id="sexo" value="<?php echo $item->sexo; ?>" required>
            </div>
            <div>
                <label for="cep">CEP: </label>
                <input type="text" name="cep" id="cep" value="<?php echo $item->cep; ?>" required>
            </div>
            <div>
                <label for="rua">Rua: </label>
                <input type="text" name="rua" id="rua" value="<?php echo $item->rua; ?>" required>
            </div>
            <div>
                <label for="numero">Número: </label>
                <input type="text" name="numero" id="numero" value="<?php echo $item->numero; ?>" required>
            </div>
            <div>
                <label for="complemento">Complemento: </label>
                <input type="text" name="complemento" id="complemento" value="<?php echo $item->complemento; ?>" required>
            </div>
            <div>
                <label for="bairro">Bairro: </label>
                <input type="text" name="bairro" id="bairro" value="<?php echo $item->bairro; ?>" required>
            </div>
            <div>
                <label for="cidade">Cidade: </label>
                <input type="text" name="cidade" id="cidade" value="<?php echo $item->cidade; ?>" required>
            </div>
            <div>
                <label for="uf">UF: </label>
                <input type="text" name="uf" id="uf" value="<?php echo $item->uf; ?>" required>
            </div>
            <div>
                <input id="btnEnviar" type="submit" value="Enviar">
            </div>
        </fieldset>
        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
    </form>
    <script src="script/validar.js"></script>
    
</body>
</html>
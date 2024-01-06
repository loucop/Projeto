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
if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];
}


/** Visualização dos dados  */

$resultado = $conexao->query("SELECT id, nome, cpf, nomemae, datanasc, email, celular, fixo, sexo, cep, rua, numero, complemento, bairro, cidade, uf, id FROM usuarios;");

/** Para verificar a quantidade de registros retornados  */
$quantidade = $resultado->rowCount();

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cadastro</title>
    <link rel="stylesheet" href="style/estilo.css">
    <title>Alterar Cadastro - <?php echo $nome; ?></title>
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
                        <li><a id="btnVoltar" href="dashboard.php">Voltar para tela anterior</a></li>
                        
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <div id="tabelaUsuarios">
        <span class="title">Lista de usuários</span>
        <table>
            <thead>
                <?php if ($quantidade > 0) : ?>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>CEP</th>
                        <th>Ação</th>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php while ($item = $resultado->fetch(PDO::FETCH_OBJ)) : ?>
                    <tr>
                        <td><?php echo $item->nome; ?></td>
                        <td><?php echo $item->cpf; ?></td>
                        <td><?php echo $item->email; ?></td>
                        <td><?php echo $item->celular; ?></td>
                        <td><?php echo $item->cep; ?></td>
                        <td><a href="edicao.php?id=<?php echo $item->id; ?>">Editar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
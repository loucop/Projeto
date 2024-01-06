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

if (isset($_POST['cpf']))
{
    $cpf = $_POST['cpf'];
}
else
{
    $cpf = "Sem CPF";
}


if (isset($_POST['nome']))
{
    $nome = $_POST['nome'];
}
else
{
    $nome = "Sem Nome";
}

if (isset($_POST['nomemae']))
{
    $nomemae = $_POST['nomemae'];
}
else
{
    $nomemae = "Sem Nome Materno";
}

if (isset($_POST['datanasc']))
{
    $datanasc = $_POST['datanasc'];
}
else
{
    $datanasc = "0000-00-00";
}

if (isset($_POST['email']))
{
    $email = $_POST['email'];
}
else
{
    $email = "Sem Email";
}

if (isset($_POST['celular']))
{
    $celular = $_POST['celular'];
}
else
{
    $celular = "Sem Celular";
}

if (isset($_POST['fixo']))
{
    $fixo = $_POST['fixo'];
}
else
{
    $fixo = "Sem Telefone Fixo";
}

if (isset($_POST['sexo']))
{
    $sexo = $_POST['sexo'];
}
else
{
    $sexo = "Sem Sexo";
}

if (isset($_POST['cep']))
{
    $cep = $_POST['cep'];
}
else
{
    $cep = "Sem CEP";
}

if (isset($_POST['rua']))
{
    $rua = $_POST['rua'];
}
else
{
    $rua = "Sem Rua";
}

if (isset($_POST['numero']))
{
    $numero = $_POST['numero'];
}
else
{
    $numero = "Sem Número";
}

if (isset($_POST['complemento']))
{
    $complemento = $_POST['complemento'];
}
else
{
    $complemento = "Sem Complemento";
}

if (isset($_POST['bairro']))
{
    $bairro = $_POST['bairro'];
}
else
{
    $bairro = "Sem Bairro";
}

if (isset($_POST['cidade']))
{
    $cidade = $_POST['cidade'];
}
else
{
    $cidade = "Sem Cidade";
}

if (isset($_POST['uf']))
{
    $uf = $_POST['uf'];
}
else
{
    $uf = "Sem UF";
}

if(isset($_POST['id']))
{

    $id = $_POST['id'];
}
else
{

    header("Location: dashboard.php");
}



if (isset($_FILES))
{
   
}
else
{
    $caminho_arquivo = "";
}


//Inserindo dados na tabela cliente - Método espaços reservados

//Sem atualizar a foto:
if ($caminho_arquivo == "")
{
    try 
    {
        $query = $conexao->prepare ("UPDATE usuarios SET cpf = :cpf, nome = :nome, nomemae = :nomemae, datanasc = :datanasc, email = :email, celular = :celular, fixo = :fixo, sexo = :sexo, cep = :cep, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf WHERE id = :id");

        $query->bindParam(':cpf',$cpf,PDO::PARAM_STR);
        $query->bindParam(':nome',$nome,PDO::PARAM_STR);
        $query->bindParam(':nomemae',$nomemae,PDO::PARAM_STR);
        $query->bindParam(':datanasc',$datanasc,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':celular',$celular,PDO::PARAM_STR);
        $query->bindParam(':fixo',$fixo,PDO::PARAM_STR);
        $query->bindParam(':sexo',$sexo,PDO::PARAM_STR);
        $query->bindParam(':cep',$cep,PDO::PARAM_STR);
        $query->bindParam(':rua',$rua,PDO::PARAM_STR);
        $query->bindParam(':numero',$numero,PDO::PARAM_STR);
        $query->bindParam(':complemento',$complemento,PDO::PARAM_STR);
        $query->bindParam(':bairro',$bairro,PDO::PARAM_STR);
        $query->bindParam(':cidade',$cidade,PDO::PARAM_STR);
        $query->bindParam(':uf',$uf,PDO::PARAM_STR);
        $query->bindParam(':id',$id,PDO::PARAM_INT);
        $query->execute();
        header("Location: edicao.php?erro=0&id=$id");
    }
    catch(PDOException $e) 
    {
        echo 'ERROR: ' . $e->getMessage();
        header("Location: edicao.php?erro=1&id=$id");
    
    }
    
}

?>
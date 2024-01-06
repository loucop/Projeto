<?php

require_once('gerador.php');


?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style/2fa.css" />
    <title>2FA</title>
</head>
<body>
    <form action="verificador.php" method="post" autocomplete="off">
        <input type="text" name="codigo" placeholder="Codigo de Segurança">

        <button>Verificar</button>

        <input type="hidden" value="<?php echo $codigo_secreto; ?>" name="codigosecreto">
    </form>
</body>

</html>
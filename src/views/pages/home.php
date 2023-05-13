<?php 
$msg = '';
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Tela de Login</title>
</head>
<body>
    <div class="container-fluid d-flex">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center" style="height:100vh" >
            <h2>Entrar</h2>
            <form class="d-flex flex-column" method="POST" action="<?=$base?>/login">
                <label class>
                    Email: <br> <input type="email" name="email">
                </label>
                <label>
                    Senha: <br> <input type="password" name="password">
                </label>
                <label class="text-center mt-2">
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </label>
            </form>
        </div>
        <div class="bg-dark w-100 d-flex flex-column align-items-center justify-content-center text-light" style="height:100vh">
            <h2>Cadastrar</h2>
            <form class="d-flex flex-column" method="POST" action="<?=$base?>/create">
                <label>
                    Nome: <br> <input type="text" name="name">
                </label>
                <label>
                    Email: <br> <input type="email" name="email">
                </label>
                <label>
                    Senha: <br> <input type="password" name="password">
                </label>
                <label>
                    Confirmar senha: <br> <input type="password" name="confPass">
                    <?php if($msg): ?>
                        <p><?=$msg ?></p>
                    <?php endif; ?>
                </label>
                <label class="text-center mt-2">
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </label>
            </form>
        </div>
    </div>
</body>
</html>
<?php
session_start();
require 'conexao.php';

if (!isset($_GET['id'])) {
    header("Location: index.php"); 
    exit();
}

$usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);

$sql = "SELECT * FROM login WHERE id = $usuario_id"; 
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    header("Location: index.php"); 
    exit();
}

$usuario = mysqli_fetch_assoc($resultado);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>ID</label>
                            <input type="text" value="<?=$usuario['id']?>" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" value="<?=$usuario['nome']?>" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" value="<?=$usuario['email']?>" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Data de Nascimento</label>
                            <input type="text" value="<?=date('d/m/Y', strtotime($usuario['data_nascimento']))?>" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Senha</label>
                            <input type="password" class="form-control" value="********" readonly>
                            <small class="form-text text-muted">A senha não é exibida por segurança.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
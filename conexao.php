<?php
define('HOST', '');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', '');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>
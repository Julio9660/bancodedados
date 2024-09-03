<?php
// Definindo as credenciais do banco de dados
define('DB_HOST', 'sql202.infinityfree.com'); // ou '127.0.0.1'
define('DB_USER', 'if0_37235531');
define('DB_PASS', 'Jcrn2619'); // deixe vazio se você não definiu uma senha
define('DB_NAME', 'if0_37235531_componentes'); // substitua pelo nome do seu banco de dados

// Criando a conexão
$conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificando a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
} else {
    echo "Conexão bem-sucedida!";
}
?>

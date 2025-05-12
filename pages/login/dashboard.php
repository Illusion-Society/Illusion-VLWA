<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            background-color: #0f0f1a;
            color: #A020F0;
            font-family: monospace;
            text-align: center;
            padding-top: 100px;
        }
        .dashboard-box {
            background-color: #1a1a26;
            border: 2px solid #9400D3;
            border-radius: 10px;
            display: inline-block;
            padding: 40px;
            box-shadow: 0 0 15px #9400D3;
        }
        a {
            color: #00ccff;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-box">
        <h1>Bem-vindo, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Você acessou o painel de controle com sucesso.</p>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>

<?php
// Verifica se um nível foi selecionado e redireciona
if (isset($_GET['nivel'])) {
    $nivel = $_GET['nivel'];
    header("Location: $nivel");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Illusion VLWA - CSS Injection</title>
  <link rel="icon" href="/img/logo.ico" type="image/svg+xml">
  <style>
    body {
      background-color: #0f0f1a;
      color: #00ff88;
      font-family: monospace;
      text-align: center;
      padding: 50px;
    }
    select, button {
      background-color: #1a1a2e;
      border: 1px solid #00ff88;
      color: #00ff88;
      padding: 10px;
      font-family: monospace;
      margin-top: 20px;
    }
    button:hover, select:hover {
      border-color: #00ccff;
    }
    h1, h2 {
      margin-bottom: 30px;
    }
    a {
      color: #00ccff;
      display: block;
      margin: 10px;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .warning {
      color: red;
      margin-top: 30px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h1>Illusion VLWA</h1>
  <h2>Reflected XSS Injection</h2>
  <p>Escolha um nível para testar:</p>

  <form id="seletor" method="GET">
    <select name="nivel" id="nivel">
      <option value="nivel1.php">🟢 Nível 1</option>
      <option value="nivel2.php">🟡 Nível 2</option>
      <option value="nivel3.php">🔴 Nível 3</option>
    </select>
    <br>
    <button type="submit">Ir para o Nível</button>
  </form>

  <script>
    document.getElementById('seletor').addEventListener('submit', function (e) {
      e.preventDefault();
      const nivel = document.getElementById('nivel').value;
      window.location.href = "?nivel=" + nivel;
    });
  </script>
</body>
</html>

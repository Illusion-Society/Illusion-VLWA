<?php
// Verifica se o parâmetro 'busca' está presente e aplica sanitização
if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];

    // Usamos strip_tags para remover as tags HTML perigosas, mas mantendo a tag <img> para permitir injeção.
    // Isso garante que tags maliciosas como <script> sejam removidas, mas tags úteis como <img> permaneçam.
    $busca = strip_tags($busca, '<img>');
} else {
    $busca = "";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Illusion VLWA - Nível 3</title>
  <link rel="icon" href="/img/logo.ico" type="image/svg+xml">
  <style>
    body {
      background-color: #0f0f1a;
      color: #00ff88;
      font-family: monospace;
      text-align: center;
      padding: 50px;
    }
    input, button {
      background-color: #1a1a2e;
      border: 1px solid #00ff88;
      color: #00ff88;
      padding: 10px;
      font-family: monospace;
      margin-top: 20px;
    }
    button:hover, input:hover {
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
  <h1>Illusion VLWA - Nível 2</h1>

  <p>Digite um valor para buscar:</p>

  <form method="GET">
    <input type="text" name="busca" placeholder="Digite algo" value="<?php echo htmlspecialchars($busca); ?>">
    <button type="submit">Buscar</button>
  </form>

  <div class="resultado">
    <p>Resultado da Busca:</p>
    <div>
      <?php echo $busca; ?>
    </div>
  </div>

</body>
</html>
    
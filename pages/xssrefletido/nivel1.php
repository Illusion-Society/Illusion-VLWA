<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>XSS Nível 1</title>
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
      padding: 8px;
      font-family: monospace;
    }
    .resultado {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <h1>Reflected XSS - Nível 1</h1>

  <form method="GET">
    <input type="text" name="busca" placeholder="Digite algo">
    <button type="submit">Buscar</button>
  </form>

  <div class="resultado">
    <p>Resultado:</p>
    <div>
      <?php
        if (isset($_GET['busca'])) {
          echo $_GET['busca']; 
        }
      ?>
    </div>
  </div>
</body>
</html>

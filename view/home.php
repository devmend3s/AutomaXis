<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>AutomaXis - Início</title>
  <link rel="stylesheet" href="view/style/home.css">
</head>
<body>

  <div class="top-icons">
    <div>⚙️</div>
    <a href="?action=logout">⎋ Sair</a>
  </div>

  <div class="logo"><span>Automa</span><span>Xis</span></div>
  <div class="welcome">Bem-vindo!</div>

  <div class="container">
    <!-- Clientes -->
    <div class="card">
      <h2>Clientes 👥</h2>
      <table>
        <tr><th>Nome</th><th>Telefone</th></tr>
        <tr>
          <td><a href="#">---</a></td>
          <td>---</td>
        </tr>
        <tr>
          <td><a href="#">---</a></td>
          <td>---</td>
        </tr>
      </table>
      <div class="card-buttons">
        <button>Cadastrar</button>
        <button>Ver todos</button>
      </div>
    </div>

    <!-- Serviços -->
    <!-- Serviços -->
  <div class="card">
      <h2>Serviços 👨‍🔧</h2>
      <table>
        <tr><th>Tipo</th><th>Preço</th></tr>
        <?php if (!empty($services)): ?>
            <?php foreach ($services as $service): ?>
              <tr>
                <td><a href="#"><?= htmlspecialchars($service['name']) ?></a></td>
                <td>R$ <?= number_format($service['price'], 2, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="2">Nenhum serviço encontrado.</td></tr>
        <?php endif; ?>
      </table>
      <div class="card-buttons">
        <a href="index.php?action=registerService"><button>Cadastrar</button></a>
        <button>Ver todos</button>
      </div>
  </div>
</body>
</html>

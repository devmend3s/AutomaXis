<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Produto - AutomaXis</title>
  <link rel="stylesheet" href="view/style/registerProduct.css">
</head>
<body>
  <h1>Cadastrar Produto</h1>

  <?php if (isset($_SESSION['message'])): ?>
    <p style="color: green; font-weight: bold;">
      <?= htmlspecialchars($_SESSION['message']) ?>
    </p>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

  <form action="index.php?action=registerProduct" method="post">
    <label>Descrição:
      <input type="text" name="description" required>
    </label>
    <br><br>
    <label>Quantidade em estoque:
      <input type="number" name="stock_quantity" required>
    </label>
    <br><br>
    <label>Preço de compra:
      <input type="number" step="0.01" name="purchase_price" required>
    </label>
    <br><br>
    <label>Preço de venda:
      <input type="number" step="0.01" name="sale_price" required>
    </label>
    <br><br>
    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>

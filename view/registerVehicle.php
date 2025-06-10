<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Cadastrar Veículo - AutomaXis</title>
  <link rel="stylesheet" href="view/style/registerVehicle.css" />
</head>
<body>

  <h1>Cadastrar Novo Veículo</h1>

  <?php if (isset($_SESSION['message'])): ?>
    <div style="color: green; font-weight: bold;">
      <?= htmlspecialchars($_SESSION['message']) ?>
    </div>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

  <form action="index.php?action=registerVehicle" method="post">
    <label>Modelo:
      <input type="text" name="model" required />
    </label>
    <br /><br />

    <label>Placa:
      <input type="text" name="plate" required />
    </label>
    <br /><br />

    <label>Ano:
      <input type="number" name="year" required />
    </label>
    <br /><br />

    <label>Cliente (opcional):
      <select name="customer_id">
        <option value="">Nenhum</option>
        <?php foreach ($customers as $customer): ?>
          <option value="<?= htmlspecialchars($customer['id']) ?>">
            <?= htmlspecialchars($customer['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </label>
    <br /><br />

    <button type="submit">Cadastrar</button>
  </form>

</body>
</html>

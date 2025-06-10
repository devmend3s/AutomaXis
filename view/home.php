<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <?php if (!empty($customers)): ?>
          <?php foreach ($customers as $customer): ?>
            <tr>
              <td><a href="#"><?php echo htmlspecialchars($customer['name']); ?></a></td>
              <td><?php echo htmlspecialchars($customer['phone']); ?></td>
            </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr><td colspan="2">Nenhum cliente encontrado.</td></tr>
      <?php endif; ?>
    </table>
    <div class="card-buttons">
      <a href="index.php?action=registerCustomer"><button>Cadastrar</button></a>
      <button>Ver todos</button>
    </div>
  </div>

  <!-- Veículos -->
  <div class="card">
    <h2>Veículos 🚗</h2>
    <table>
      <tr><th>Modelo</th><th>Ano</th></tr>
      <?php if (!empty($vehicles)): ?>
          <?php foreach ($vehicles as $vehicle): ?>
            <tr>
              <td><a href="#"><?php echo htmlspecialchars($vehicle['model']); ?></a></td>
              <td><?php echo $vehicle['year']; ?></td>
            </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr><td colspan="2">Nenhum veículo encontrado.</td></tr>
      <?php endif; ?>
    </table>
    <div class="card-buttons">
      <a href="index.php?action=registerVehicle"><button>Cadastrar</button></a>
      <button>Ver todos</button>
    </div>
  </div>

  <!-- Produtos -->
  <div class="card">
    <h2>Produtos 🛠️</h2>
    <table>
      <tr><th>Descrição</th><th>Estoque</th></tr>
      <?php if (!empty($products)): ?>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><a href="#"><?php echo htmlspecialchars($product['description']); ?></a></td>
              <td><?php echo $product['stock_quantity']; ?></td>
            </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr><td colspan="2">Nenhum produto encontrado.</td></tr>
      <?php endif; ?>
    </table>
    <div class="card-buttons">
      <a href="index.php?action=registerProduct"><button>Cadastrar</button></a>
      <button>Ver todos</button>
    </div>
  </div>

  <!-- Serviços -->
  <div class="card">
    <h2>Serviços 👨‍🔧</h2>
    <table>
      <tr><th>Tipo</th><th>Preço</th></tr>
      <?php if (!empty($services)): ?>
          <?php foreach ($services as $service): ?>
            <tr>
              <td><a href="#"><?php echo htmlspecialchars($service['name']); ?></a></td>
              <td>R$ <?php echo number_format($service['price'], 2, ',', '.'); ?></td>
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

  <!-- Ordens de Serviço -->
  <div class="card">
    <h2>Ordens de Serviço 📋</h2>
    <table>
      <tr><th>Cliente</th><th>Status</th></tr>
      <?php if (!empty($orders)): ?>
          <?php foreach ($orders as $order): ?>
            <tr>
              <td><a href="#"><?php echo $order['customer_name']; ?></a></td>
              <td><?php echo $order['status']; ?></td>
            </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr><td colspan="2">Nenhuma ordem encontrada.</td></tr>
      <?php endif; ?>
    </table>
    <div class="card-buttons">
      <a href="index.php?action=registerOrder"><button>Cadastrar</button></a>
      <button>Ver todos</button>
    </div>
  </div>

  <!-- Agendamentos -->
  <div class="card">
    <h2>Agendamentos 📅</h2>
    <table>
      <tr><th>Título</th><th>Data</th></tr>
      <?php if (!empty($appointments)): ?>
          <?php foreach ($appointments as $appt): ?>
            <tr>
              <td><a href="#"><?php echo $appt['title']; ?></a></td>
              <td><?php echo date('d/m/Y H:i', strtotime($appt['appointment_date'])); ?></td>
            </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr><td colspan="2">Nenhum agendamento encontrado.</td></tr>
      <?php endif; ?>
    </table>
    <div class="card-buttons">
      <a href="index.php?action=registerAppointment"><button>Cadastrar</button></a>
      <button>Ver todos</button>
    </div>
  </div>

  <!-- Contas -->
  <div class="card">
    <h2>Contas 💰</h2>
    <table>
      <tr><th>Descrição</th><th>Pago?</th></tr>
      <?php if (!empty($accounts)): ?>
          <?php foreach ($accounts as $acc): ?>
            <tr>
              <td><a href="#"><?php echo $acc['description']; ?></a></td>
              <td><?php echo $acc['paid'] === 'Y' ? 'Sim' : 'Não'; ?></td>
            </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr><td colspan="2">Nenhuma conta encontrada.</td></tr>
      <?php endif; ?>
    </table>
    <div class="card-buttons">
      <a href="index.php?action=registerAccount"><button>Cadastrar</button></a>
      <button>Ver todos</button>
    </div>
  </div>
</div>

</body>
</html>
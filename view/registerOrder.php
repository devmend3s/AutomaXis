<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Abrir Ordem de Serviço</title>
  <link rel="stylesheet" href="view/style/registerOrder.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>

<h1>Abrir Ordem de Serviço</h1>

<form id="orderForm">
  <label>Cliente:
    <select name="customer_id" id="customer_id">
      <option value="">-- Selecionar --</option>
      <?php if (!empty($customers)): ?>
        <?php foreach ($customers as $c): ?>
          <option value="<?= $c['id'] ?>" data-name="<?= htmlspecialchars($c['name']) ?>">
            <?= htmlspecialchars($c['name']) ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </label>
  <input type="text" name="customer_name" id="customer_name" placeholder="Nome do cliente (se não cadastrado)">

  <label>Veículo:
    <select name="vehicle_id" id="vehicle_id">
      <option value="">-- Selecionar --</option>
      <?php if (!empty($vehicles)): ?>
        <?php foreach ($vehicles as $v): ?>
          <option value="<?= $v['id'] ?>" data-model="<?= htmlspecialchars($v['model']) ?>">
            <?= htmlspecialchars($v['model']) ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </label>
  <input type="text" name="vehicle_model" id="vehicle_model" placeholder="Modelo do veículo (se não cadastrado)">

  <label>Serviço:
    <select name="service_id" id="service_id">
      <option value="">-- Selecionar --</option>
      <?php if (!empty($services)): ?>
        <?php foreach ($services as $s): ?>
          <option value="<?= $s['id'] ?>" data-name="<?= htmlspecialchars($s['name']) ?>">
            <?= htmlspecialchars($s['name']) ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </label>
  <input type="text" name="service_name" id="service_name" placeholder="Nome do serviço (se não cadastrado)">

  <label>Descrição detalhada:
    <textarea name="service_description" id="service_description"></textarea>
  </label>

  <button type="submit">Gerar Ordem e Gerar PDF</button>
</form>

<script>
  const { jsPDF } = window.jspdf;

  // Atualiza inputs quando selecionar algo no select
  function syncSelectToInput(selectId, inputId, dataAttr) {
    const select = document.getElementById(selectId);
    const input = document.getElementById(inputId);
    select.addEventListener('change', () => {
      const option = select.options[select.selectedIndex];
      if(option.value) {
        input.value = option.getAttribute(dataAttr) || '';
      } else {
        input.value = '';
      }
    });
  }

  syncSelectToInput('customer_id', 'customer_name', 'data-name');
  syncSelectToInput('vehicle_id', 'vehicle_model', 'data-model');
  syncSelectToInput('service_id', 'service_name', 'data-name');

  document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const customer = document.getElementById('customer_name').value.trim();
    const vehicle = document.getElementById('vehicle_model').value.trim();
    const service = document.getElementById('service_name').value.trim();
    const description = document.getElementById('service_description').value.trim();

    if(!customer || !vehicle || !service) {
      alert('Por favor, preencha Cliente, Veículo e Serviço.');
      return;
    }

    const doc = new jsPDF();

    doc.setFontSize(16);
    doc.text("Ordem de Serviço", 105, 20, null, null, "center");

    doc.setFontSize(12);
    doc.text(`Cliente: ${customer}`, 20, 40);
    doc.text(`Veículo: ${vehicle}`, 20, 50);
    doc.text(`Serviço: ${service}`, 20, 60);

    doc.text("Descrição detalhada:", 20, 75);
    const splitDescription = doc.splitTextToSize(description, 170);
    doc.text(splitDescription, 20, 85);

    doc.save("ordem-de-servico.pdf");
  });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Agendar Serviço - AutomaXis</title>
  <link rel="stylesheet" href="view/style/registerAppointment.css">
</head>
<body>
  <h1>Agendar Serviço</h1>
  <form action="/controllers/AppointmentController.php?action=register" method="post">
    <label>Título:
      <input type="text" name="title" required>
    </label>
    <label>Cliente:
      <select name="customer_id">
        <!-- clientes -->
      </select>
    </label>
    <label>Veículo:
      <select name="vehicle_id">
        <!-- veículos -->
      </select>
    </label>
    <label>Data do agendamento:
      <input type="datetime-local" name="appointment_date" required>
    </label>
    <label>Lembrete:
      <textarea name="reminder"></textarea>
    </label>
    <button type="submit">Agendar</button>
  </form>
</body>
</html>

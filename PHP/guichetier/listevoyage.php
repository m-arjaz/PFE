<?php
  session_start();
  require_once __DIR__ . '/../tools/db.php';
  require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MARKOUB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192">
  <link rel="stylesheet" href="../../CSS/guichetier/affichevoyage.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MARKOUB</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="guichetier_page.php">ACCUEIL</a></li>
        <li class="nav-item"><a class="nav-link" href="chercher_voyage.php">ENREGISTRER RESERVATIONS</a></li>
        <li class="nav-item"><a class="nav-link" href="#">CLIENTS</a></li>
        <li class="nav-item"><a class="nav-link" href="#">MON PROFIL</a></li>
        <li class="nav-item"><a class="nav-link" href="../authentfication/logout.php">DÉCONNEXION</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
  if(isset($_GET['depart']) && isset($_GET['destination'])){
      $depart = $_GET['depart'];
      $destination = $_GET['destination'];
      $datedepart = $_GET['dateDepart'] ?? '';
      $heureDepart = $_GET['heureDepart'] ?? '';
      afficherVoyages($con, $depart, $destination, $datedepart, $heureDepart);
  }
?>

<!-- Reservation popup -->
<div id="overlay" class="overlay hidden"></div>
<div id="ticket-card" class="ticket-card hidden">
  <span class="close-btn">&times;</span>
  <p id="success-msg" style="display: none; background: rgb(212,247,193); color:green; padding:13px; border-radius:8px;"></p>
  <p id="error-msg" style="display:none; background:#f8d7da; color:red; padding:13px; border-radius: 8px;"></p>
  <h3>Enregistrer Les billets</h3>
  <input type="hidden" id="voyage_id">
  <label for="ticket-count">Nombre de billets :</label>
  <input type="number" id="ticket-count" min="1" value="1" required>
  <button id="confirm-btn">Confirmer</button>
</div>

<script>
  const selectBtns = document.querySelectorAll('.select-button');
  const overlay = document.getElementById('overlay');
  const ticketCard = document.getElementById('ticket-card');
  const inputVoyageId = document.getElementById('voyage_id');
  const confirmBtn = document.getElementById('confirm-btn');
  const closeBtn = document.querySelector('.close-btn');
  const successMsg = document.getElementById('success-msg');
  const errorMsg = document.getElementById('error-msg');

  // Open popup when selecting a voyage
  selectBtns.forEach(selectBtn => {
    selectBtn.addEventListener('click', () => {
      const voyageId = selectBtn.dataset.id;
      inputVoyageId.value = voyageId;
      successMsg.style.display = 'none';
      errorMsg.style.display = 'none';
      overlay.classList.remove('hidden');
      ticketCard.classList.remove('hidden');
    });
  });

  // Close popup
  overlay.addEventListener('click', closePopup);
  closeBtn.addEventListener('click', closePopup);

  function closePopup() {
    overlay.classList.add('hidden');
    ticketCard.classList.add('hidden');
  }

  // Handle reservation
  confirmBtn.addEventListener('click', async () => {
    const voyageId = inputVoyageId.value;
    const nbTickets = document.getElementById('ticket-count').value;

    if (!nbTickets || nbTickets < 1) {
      errorMsg.textContent = 'Veuillez entrer un nombre de billets valide';
      errorMsg.style.display = 'block';
      return;
    }

    try {
      const formData = new FormData();
      formData.append('confirmer', '1');
      formData.append('voyage_id', voyageId);
      formData.append('nb_tickets', nbTickets);

      const response = await fetch('reserver.php', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        successMsg.textContent = 'Réservation effectuée avec succès!';
        successMsg.style.display = 'block';
        errorMsg.style.display = 'none';
        
        // Close popup after 2 seconds and reload
        setTimeout(() => {
          closePopup();
          location.reload();
        }, 2000);
      } else {
        errorMsg.textContent = result.message;
        errorMsg.style.display = 'block';
        successMsg.style.display = 'none';
      }
    } catch (error) {
      errorMsg.textContent = 'Erreur de connexion';
      errorMsg.style.display = 'block';
    }
  });
</script>
</body>
</html>

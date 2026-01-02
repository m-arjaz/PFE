<?php
  session_start();
  require_once '../tools/db.php';
  require_once 'functions.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MARKOUB</title>
  <link rel="stylesheet" href="../../CSS/client/afficheVoyages.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header>
    <div class="logo">MARKOUB</div>
    <nav>
      <ul>
        <li class="nav-item"><a class="nav-link" href="client_page.php">ACCUEIL</a></li>
        <li class="nav-item"><a class="nav-link" href="effucter_reservation.php">EFFUCTER RESERVATION</a></li>
        <li class="nav-item"><a class="nav-link" href="#">MES RESERVATIONS</a></li>
        <li class="nav-item"><a class="nav-link" href="#">MON PROFIL</a></li>
        <li class="nav-item"><a class="nav-link" href="../authentfication/logout.php">DÉCONNEXION</a></li>
      </ul>
    </nav>
  </header>
  <?php
    if(isset($_GET['chercher'])){
        $depart = $_GET['depart'];
        $destination = $_GET['destination'];
        $datedepart = $_GET['date'];
    afficherVoyages($con, $depart, $destination, $datedepart);
    }
  ?>

  <form action="reserver.php" method="post" id="reservation-form">
    <div id="overlay" class="overlay hidden"></div>
    <div id="ticket-card" class="ticket-card hidden">
      <p id="error-msg" style="width: 70%;background: #f8d7da;text-align: center; margin-left: 20px; padding: 13px 50px 13px 20px;border-radius: 8px;border: none;outline: none;font-size: 16px;font-weight: 500;color: red; display:none" ></p>
      <h3>Réserver vos billets</h3>
      <input type="hidden" name="voyage_id" id="voyage_id">
      <label for="ticket-count">Nombre de billets :</label>
      <input type="number" name="nb_tickets" id="ticket-count" min="1" required>
      <button id="confirm-btn" name="confirmer" >Confirmer</button>
    </div>
  </form>
  

</body>
<script src="../../JAVASCRIPT/client/afficheVoyages.js"></script>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MARKOUB</title>
  <link rel="stylesheet" href="../../CSS/client/effucter_voyage.css">
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192" >
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
  <main>
    <div class="form-container">
      <h2>RESERVER VOTRE VOYAGE</h2>
      <form method="GET" action="listevoyage.php" >
        <div class="field">
          <input type="text" name="depart" placeholder="DEPART" class="input" required />
        </div>
        <div class="field">
          <input type="text" name="destination" placeholder="DESTINATION" class="input"  required />
        </div>
        <div onclick="toggleDateTime()" id="leaving-now"  class="leaving-now">
            DATE DE DEPART
        </div>
        <div id="date-time-fields" class="date-time" style="display: none;">
            <input type="date" name="date" placeholder="Date in mm/dd/yy format" class="input" required>
        </div>
        <button type="submit" name="chercher"><a style="text-decoration: none;color: inherit;" >CHERCHER</a></button>
      </form>
    </div>
  </main>
</div>
</body>
<script src="../../JAVASCRIPT/client/effucter_reservation.js"></script>
</html>

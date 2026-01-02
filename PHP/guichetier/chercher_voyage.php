<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MARKOUB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192" >
  <link rel="stylesheet" href="../../CSS/guichetier/style.css">
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
<div >
  <main>
    <div class="form-container" >
      <h2>CHERCHER LE VOYAGE</h2>
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
            <input type="date" name="dateDepart" placeholder="Date in mm/dd/yy format" class="input" required>
            <input type="time" name="heureDepart"  placeholder="Time in hh : mm 24 Hour Format" class="input" required>
        </div>
        <button type="submit" name="chercher"><a style="text-decoration: none;color: inherit;" >CHERCHE</a></button>
      </form>
    </div>
  </main>
</div>
</body>
<script src="../../JAVASCRIPT/guichetier/recherchervoyage.js"></script>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MARKOUB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192" >
  <style>
    .navbar-custom { background-color: #00796b; }
    .navbar-brand { font-weight: bold; color: orange !important; }
    .nav-link { color: white !important; }
    .hero-image {
      background: url('../../src/bus4.jpg') center center no-repeat;
      background-size: cover;
      height: 599px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MARKOUB</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="chef_page.php">ACCUEIL</a></li>
        <li class="nav-item"><a class="nav-link" href="#">GESTION EMPLOYÉS</a></li>
        <li class="nav-item"><a class="nav-link" href="#">CONSULTER LES INFORMATIONS</a></li>
        <li class="nav-item"><a class="nav-link" href="#">MON PROFIL</a></li>
        <li class="nav-item"><a class="nav-link" href="../authentfication/logout.php">DÉCONNEXION</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="hero-image"></div>
</body>
</html>

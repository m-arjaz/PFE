<?php
  session_start();
  $error = $_SESSION['login_error'] ?? '';
  session_unset();
  function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Markoub</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192" >
  <link rel="stylesheet" href="../../CSS/authentification/connexion.css">
</head>
<body style="background-size: cover;">
  <div class="container">
    <div class="form-box login">
      <form method="post" action="login.php">
        <h1>CONNEXION</h1>
        <div>
          <?= showError($error);?>
        </div>  
        <div class="input-box">
          <input type="text" name="username" placeholder="NOM D'UTILISATION" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="MOT DE PASSE" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <!-- <div class="forget-link">
          <a href="#">Mot de Passe Oublie?</a>
        </div> -->
        <button class="btn" name="login" type="submit">Connexion</button>
        <p>Connexion Avec Social Platforms</p>
        <div class="social-icon">
          <a href="#"><i class='bx bxl-google'></i></a>
          <a href="#"><i class='bx bxl-facebook'></i></a>
          <a href="#"><i class='bx bxl-github'></i></a>
          <a href="#"><i class='bx bxl-linkedin'></i></a>
        </div>
      </form>
    </div>
    <div class="toggle-box">
      <div class="toggle-panel toggle-left">
        <h1>Bonjour, Bienvenue! </h1>
        <p>Creer un Nouveau Compte</p>
        <button class="btn" ><a href="/PFE/PHP/authentfication/inscription.php">Inscription</a></button>
      </div>
    </div>
</body>
<script src=""></script>
</html>
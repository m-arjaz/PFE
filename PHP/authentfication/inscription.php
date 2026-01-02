<?php
  session_start();
  $error = $_SESSION['register_error'] ?? '';
  session_unset();
  function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
  }
  // showError($error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Markoub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" href="../../src/busIcon.png" type="image/x-icon" sizes="192x192" >
  <link rel="stylesheet" href="../../CSS/authentification/inscription.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <div class="title">
      <h1 class="text-center">INSCRIPTION</h1>
    </div>
    <div>
      <?= showError($error); ?>
    </div>
    <form method="POST" action="register.php">
      <div class="input-box">
        <div class="input-field">
          <label for="">NOM</label>
          <input type="text" name="nom" placeholder="ENTRER NOM"  required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-field">
          <label for="">USERNAME</label>
          <input type="text" name="username" placeholder="ENTRER USERNAME"  required>
          <i class='bx bxs-user'></i>
        </div>
      </div>
      <div class="input-box">
        <div class="input-field">
          <label for="">DATE DE NAISSANCE</label>
          <input type="date" name="date_Naissance" style="color: black;" required>
        </div>
        <div class="input-field">
          <label for="">LIEU DE NAISSANCE</label>
          <input type="text" name="lieu_Naissance" placeholder="ENTRER LIEU DE NAISSANCE" required>
          <i class='bx bxs-city'></i>
        </div>
      </div>
      <div class="input-box">
        <div class="input-field">
          <label for="">CIN</label>
          <input type="text" name="cin" placeholder="ENTRER CIN" required>
          <i class='bx bxs-id-card'></i>
        </div>
        <div class="input-field">
          <label for="">ADRESSE</label>
          <input type="text" name="adresse" placeholder="ENTRER ADRESSE"  required>
          <i class='bx bxs-map-pin' ></i>
        </div>
      </div>
      <div class="input-box">
        <div class="input-field">
          <label for="" >EMAIL</label>
          <input type="email" name="email" placeholder="ENTRER EMAIL"  required>
          <i class='bx bxl-gmail'></i>
        </div>
        <div class="input-field">
          <label for="">TELEPHONE</label>
          <input type="tel" name="tele" placeholder="ENTRER NUMERO DE TELEPHONE" required>
          <i class='bx bx-phone'></i>
        </div>
      </div>
      <div class="input-box">
        <div class="input-field">
          <label for="" >USERTYPE</label>
          <select name="role" >
            <option value="">--Select Role--</option>
            <option value="client">Client</option>
            <option value="chef">Chef</option>
            <option value="guichetier">Guichetier</option>
          </select>
          <i class='bx  bx-user'  ></i> 
        </div>
        <div class="input-field">
          <label for="">PASSWORD</label>
          <input type="password" name="password" placeholder="ENTRER PASSWORD" required>
          <i class='bx bx-lock'></i>
        </div>
      </div>
      <div>
        <p class="lien-con"><a href="/PFE/PHP/authentfication/connexion.php">Vous Avez deja un compte ?</a></p>
        <button type="submit" name="register" >SUBMIT</button>
      </div>
    </form>
  </div>
</body>
</html>
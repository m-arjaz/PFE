<?php
  session_start();
  require_once '../tools/db.php';

  $status = null;
  $message = null;  
  $image = null;

  if(isset($_POST['payer'])){
    $nom = $_POST['cardholder'];
    $numcard = $_POST['cardnumber'];
    $exp = $_POST['exp']; 
    $cvv = $_POST['cvv'];

    $res = $con -> query("SELECT * FROM cartebancaire WHERE clientNom = '$nom'");
    if($res->num_rows > 0){
      $user = $res->fetch_assoc();
      if (( $user['numCarte'] == $numcard ) && ( $user['dateExpiration'] == $exp ) && ( $user['cvv'] == $cvv )) {

        $status = 'success';
        $message = 'Paiement effectué avec succès !';
        $image = 'success.png';
      }else {
        $status = 'error'; 
        $message = 'Informations incorrectes.';
      }
    }else{
      $status = 'error'; 
      $message = 'Carte introuvable.';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Interface</title>
  <link rel="icon" href="../../src/bus.png" type="image/x-icon" sizes="192x192" >
  <link rel="stylesheet" href="../../CSS/client/paiement.css">
</head>
<body>
  <div class="payment-container">
    <h2>Paiement</h2>
    <form action="" method="post">

      <?php if ($status === 'error'): ?>
        <p style=" width: 100%;background: #f8d7da;text-align: center;padding: 13px 50px 13px 20px;border-radius: 8px;border: none;outline: none;font-size: 16px;font-weight: 500;color: red;"><?= htmlspecialchars($message) ?></p>
      <?php endif; ?>

      <label for="cardholder">Nom du titulaire de la carte</label>
      <input type="text" id="cardholder" name="cardholder" placeholder="NOM PRENOM" value="<?= htmlspecialchars($_POST['cardholder'] ?? '') ?>" required />

      <label for="cardnumber">Numéro de carte</label>
      <input type="text" id="cardnumber" name="cardnumber" placeholder="1234 5678 9012 3456" maxlength="19" value="<?= htmlspecialchars($_POST['cardnumber'] ?? '') ?>" required />

      <div class="row">
        <div>
          <label for="exp">Date d’expiration</label>
          <input type="text" id="exp" name="exp" placeholder="MM/YY" maxlength="5" value="<?= htmlspecialchars($_POST['exp'] ?? '') ?>" required />
        </div>
        <div>
          <label for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="4" required value="<?= htmlspecialchars($_POST['cvv'] ?? '') ?>" />
        </div>
      </div>

      <button type="submit" name="payer" class="pay-button">Payer maintenant</button>
    </form>
  </div>

  <?php if ($status === 'success'): ?>
    <div id="overlay" class="overlay visible"></div>
    <div id="paiement-status" class="paiement-status visible">
      <img src="../../src/<?= $image ?? 'error.png' ?>" alt="<?= htmlspecialchars($status) ?>" />
      <p><?= htmlspecialchars($message) ?></p>
        <a href="client_page.php">Retour à l'accueil</a>
      <button onclick="document.getElementById('overlay').classList.remove('visible'); document.getElementById('paiement-status').classList.remove('visible');">Fermer</button>
    </div>
  <?php endif; ?>

</body>
</html>
<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();
  require_once 'db.php';

  $response = [];

  if(isset($_POST['payer'])){
    $nom = $_POST['cardholder'];
    $numcard = $_POST['cardnumber'];
    $exp = $_POST['exp']; 
    $cvv = $_POST['cvv'];

    $res = $con -> query("SELECT * FROM cartebancaire WHERE clientNom = '$nom'");
    if($res->num_rows > 0){
      $user = $res->fetch_assoc();
      if (( $user['numCarte'] == $numcard ) && ( $user['dateExpiration'] == $exp ) && ( $user['cvv'] == $cvv )) {
        $response['status'] = 'success';
        $response['message'] = 'Paiement effectué avec succès !';
        $response['image'] = 'success.png';
      }else {
        $response['message'] = 'Informations incorrectes.';
      }
    }else{
      $response['message'] = 'Carte introuvable.';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
  }


?>
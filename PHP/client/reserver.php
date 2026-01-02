<?php
  session_start();
  require'../tools/db.php';


  header('Content-Type: application/json');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if(isset($_POST['confirmer'])){
    $voyageId = intval($_POST['voyage_id']);
    $nbtickets = intval($_POST['nb_tickets']);

        $stmt = $con-> prepare("SELECT placeDisponibles FROM voyage WHERE idVoyage = '$voyageId'");
        $stmt->execute();
        $stmt->bind_result($places_dispo);
        $stmt->fetch();
        $stmt->close(); 

        

        if ($places_dispo >= $nbtickets) {
          $newplace = $places_dispo - $nbtickets ;
          $stmt = $con-> prepare("UPDATE voyage SET placeDisponibles = '$newplace' WHERE idVoyage = '$voyageId' ");
          $stmt->execute();
          echo json_encode(["success" => true]);
        }else {
          echo json_encode([
            "success" => false,
            "message" => " Seulement $places_dispo places disponibles."
        ]);
    }
  }else{
      echo json_encode([
          "success" => false,
          "message" => "Requête invalide ou paramètre manquant."
      ]);
  } 
?>
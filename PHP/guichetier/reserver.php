<?php
  session_start();
  require_once __DIR__ . '/../tools/db.php';

  header('Content-Type:  application/json');

  if(isset($_POST['confirmer'])){
    $voyageId = intval($_POST['voyage_id']);
    $nbtickets = intval($_POST['nb_tickets']);

    // Get available places
    $sql = "SELECT placeDisponibles FROM voyage WHERE idVoyage = :voyageId";
    $stmt = oci_parse($con, $sql);
    oci_bind_by_name($stmt, ':voyageId', $voyageId);
    oci_execute($stmt);
    
    $row = oci_fetch_assoc($stmt);
    $places_dispo = $row['PLACEDISPONIBLES'];
    oci_free_statement($stmt);

    if ($places_dispo >= $nbtickets) {
        $newplace = $places_dispo - $nbtickets;
        
        $sql = "UPDATE voyage SET placeDisponibles = :newplace WHERE idVoyage = :voyageId";
        $stmt = oci_parse($con, $sql);
        oci_bind_by_name($stmt, ':newplace', $newplace);
        oci_bind_by_name($stmt, ':voyageId', $voyageId);
        oci_execute($stmt);
        oci_commit($con);
        oci_free_statement($stmt);
        
        echo json_encode([
            "success" => true,
            "message" => "Réservation effectuée avec succès!"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Pas assez de places disponibles"
        ]);
    }
  } else {
    echo json_encode([
        "success" => false,
        "message" => "Données manquantes"
    ]);
  }
?>
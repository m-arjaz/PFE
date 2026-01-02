<?php
    function afficherVoyages($con, $depart, $destination, $datedepart){
    $dates = [];
    $start = strtotime($datedepart);
    for ($i = 0; $i < 5; $i++) {
      $dates[] = date('Y-m-d', strtotime("+$i days", $start));
    }
    echo "<div class='date-tabs'>";
    foreach ($dates as $i => $date) {
        $label = date('l d/m/Y', strtotime($date)); 
        $active = ($i === 0) ? 'active' : '';
        echo "<button class='day $active' data-day='$i'>$label</button>";
    }
    echo "</div>";
    foreach ($dates as $index => $date) {
    $stmt = $con->prepare("SELECT * FROM voyage WHERE villeDepart = ? AND villeDestination = ? AND departdate = ? ");
    $stmt->bind_param("sss", $depart,$destination,$date);
    $stmt->execute();
    $result = $stmt->get_result();

    $active = ($index === 0) ? 'active' : '';
    echo "<div class='trip-info $active'  data-content='$index'>";

    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) { 

            echo" <div class='card' style='margin-top: 20px; margin-left: 311px;'>
            <div class='left'>
              <div>
                <strong>{$row['Nom']}</strong>
              </div>
            </div>

            <div class='middle'>
              <div class='time'>". date('H:i', strtotime($row['heure_depart'])) ."</div>
              <div class='station'>{$row['villeDepart']}</div>

              <div class='duration'>{$row['duree']}</div>

              <div class='time'>" . date('H:i', strtotime($row['heure_darrive'])) . "</div>
              <div class='station'>{$row['villeDestination']}</div>
            </div>

            <div class='right'>
              <div class='price'>{$row['prix']} DH</div>
              <div>par personne</div>
              <button class='select-button' data-id='{$row['idVoyage']}' data-name='{$row['Nom']}'>Sélectionner</button>
            </div>
          </div> ";
    } 
}else {
  echo "<div class='no-trip' style='
      background-color: #f5f6f8;
      border-radius: 8px;
      padding: 10px 16px;
      margin-top: 12px;
      color: #333;
      font-size: 15px;
      display: flex;
      align-items: center;
      width: 800px;
      margin-left: 266px;
      gap: 8px;
      border: 1px solid #ddd;'>
          <i class='fa fa-calendar' style='color: #444;'></i>
          <p><strong>Aucun voyage trouvé pour</strong> $date.</p>
        </div>";
    }   
        echo "</div>";   
        $stmt->close();
    }
}

?>
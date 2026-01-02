<?php
function afficherVoyages($con, $depart, $destination, $datedepart, $heureDepart){

    $sql = "SELECT * FROM voyage WHERE depart = :depart AND destination = :destination AND TO_CHAR(dateDepart, 'YYYY-MM-DD') = :datedepart AND heureDepart = :heureDepart";
    
    $stmt = oci_parse($con, $sql);
    oci_bind_by_name($stmt, ':depart', $depart);
    oci_bind_by_name($stmt, ':destination', $destination);
    oci_bind_by_name($stmt, ':datedepart', $datedepart);
    oci_bind_by_name($stmt, ':heureDepart', $heureDepart);
    oci_execute($stmt);

    $hasRows = false;
    
    while ($row = oci_fetch_assoc($stmt)) {
        $hasRows = true;
        echo "<div class='card' style='margin-top:  20px; margin-left: 311px;'>
            <div class='left'>
                <div><strong>MARKOUB</strong></div>
            </div>

            <div class='middle'>
                <div class='time'>{$row['HEUREDEPART']}</div>
                <div class='station'>{$row['DEPART']}</div>
                <div class='duration'>→</div>
                <div class='station'>{$row['DESTINATION']}</div>
            </div>

            <div class='right'>
                <div class='price'>{$row['PRIX']} DH</div>
                <div>Places: {$row['PLACEDISPONIBLES']}</div>
                <button class='select-button' data-id='{$row['IDVOYAGE']}'>Sélectionner</button>
            </div>
        </div>";
    }
    
    if (! $hasRows) {
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
        '>Aucun voyage trouvé</div>";
    }
    
    oci_free_statement($stmt);
}
?>
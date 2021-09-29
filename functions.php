<?php

function executeRESTCall($methode, $adresse, $daten = false) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $adresse);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $methode);
    if ($daten){
        $head = ['Content-Type: application/text', 
                 'Content-Length: '. strlen($daten)];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $head);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $daten);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}

// Check if year is valid, otherwise a 'N/A' is written
function checkYear($year) {

$re = '/\d{4}/m';
$str = $year;

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
print_r ($matches);

return $matches[0][0];

/*     if (is_numeric($year) && (strlen($year) == 4)) {
        return $year;
    }

    return ('N/A'); */
}

?>
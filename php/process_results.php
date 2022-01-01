<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');


if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // copy returned json into an array?
    $array = json_decode($_POST['results'], true);

    $results= [];

    foreach($array as $value) {
                
        switch ($value) {
            
            case "X1":
                array_push($results, "100");    
                // CALCULATIONS
                break;

            case "Z1":
                array_push($results, "80");    
                break;

            default:
                array_push($results, "70");
        }
        
    }
    // Send something back
    echo json_encode($results);
}

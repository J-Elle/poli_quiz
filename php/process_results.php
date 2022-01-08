<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// VARIABLES TO SCORE RUNNING TOTAL

$results= array(
    "animalJustice" => 0
/*
$australiaFirst = 0;
$australianAffordableHousing = 0;
$australianChristians = 0;
$australianCitizens = 0;
$australianDemocrats = 0;
$australianFederation = 0;
$australianGreens = 0;
$australianLaborParty = 0;
$australianProgressives = 0;
$centreAlliance = 0;
$christianDemocratic = 0;
$climateEmergancy = 0;
$countryLiberal = 0;
$democraticLabour = 0;
$derrynHinch = 0;
$federalICAC = 0;
$healthAustralia = 0;
$hemp = 0;
$independentsCan = 0;
$informedMedicalOptions = 0;
$jaquiLambie = 0;
$kattersAustralian = 0;
$liberalDemocratic = 0;
$liberalParty = 0;
$loveAustraliaOrLeave = 0;
$nationalParty = 0;
$no5G = 0;
$oneNation = 0;
$reasonAustralia = 0;
$rexPatrick = 0;
$scienceParty = 0;
$secularParty = 0;
$shootersFishers = 0;
$sociallistAlliance = 0;
$socialistEquality = 0;
$sustainableAustralia = 0;
$greatAustralian = 0;
$newLiberals = 0;
$transportMatters = 0;
$unitedAustralia = 0;
$voteFlux = 0;
$victorianSocialists = 0;
$westernAustralia = 0;
*/
);






// SERVER RESPONSE TO POST REQUEST

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // copy returned json into an array?
    $array = json_decode($_POST['results'], true);

    

    foreach($array as $value => $answer) { 

        switch ($answer['code']) {
            

            // TEMPLATE **********************************************
            case "TemplateOnly":   
                
                switch($answer['result']){
                    case "stronglyAgree":
                        // do something
                        break;
                    case "somewhatAgree":
                        // do something
                        break;
                    case "neutral":
                        // do something
                        break;
                    case "somewhatDisagree":
                        // do something
                        break;
                    case "stronglyDisagree":
                        // do something
                        break;
                    default:
                        // log error
                }

            break;
            
            // END TEMPLATE *******************************************
            

            case "X1":   
                
                switch($answer['result']){
                    case "stronglyAgree":
                        // do something 
                        $results['animalJustice']++;
                        break;
                    case "somewhatAgree":
                        // do something
                        break;
                    case "neutral":
                        // do something
                        break;
                    case "somewhatDisagree":
                        // do something
                        break;
                    case "stronglyDisagree":
                        // do something
                        break;
                    default:
                        // log error
                }

            break;


            case "Z1":
                //array_push($results, "80");    
                break;
                
            default:
                // do nothing
        }
    
        
    /*
    $results = array_push_assoc($results, $australiaFirst, $australiaFirst);


    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
     }
    */
        
    }
    // Send something back
    echo json_encode($results);
}

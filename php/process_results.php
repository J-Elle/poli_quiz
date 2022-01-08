<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// VARIABLES TO SCORE RUNNING TOTAL

$results= array(
    "Animal Justice Party" => 0,
    "Australia First Party (NSW) Incorporated" => 0,
    "Australian Affordable Housing Party" => 0,
    "Australian Christians" => 0,
    "Australian Citizens Party" => 0,
    "Australian Democrats" => 0,
    "Australian Federation Party" => 0,
    "Australian Greens" => 0,
    "Australian Labor Party (ALP)" => 0,
    "Australian Progressives" => 0,
    "Centre Alliance" => 0,
    "Christian Democratic Party (Fred Nile Group)" => 0,
    "Climate Emergancy Action Alliance: Vote Planet" => 0,
    "Country Liberal Party (NT)" => 0,
    "Democratic Labour Party" => 0,
    "Derryn Hinch's Justice Party" => 0,
    "Federal ICAC Now" => 0,
    "Health Australia Party" => 0,
    "Independents CAN" => 0,
    "Indigenous - Aboriginal Party of Australia" => 0,
    "Informed Medical Options Party" => 0,
    "Jaqui Lambie Network" => 0,
    "Katter's Australian Party (KAP)" => 0,
    "Legalise Cannabis Australia" => 0,
    "Liberal Democratic Party" => 0,
    "Liberal Party of Australia" => 0,
    "Love Australia or Leave" => 0,
    "National Party of Australia" => 0,
    "No5G Party" => 0,
    "Pauline Hanson's One Nation" => 0,
    "Reason Australia" => 0,
    "Rex Patrick Team" => 0,
    "Science Party" => 0,
    "Secular Party of Australia" => 0,
    "Seniors United Party of Australia" => 0,
    "Shooters, Fishers and Farmers Party" => 0,
    "Sociallist Alliance" => 0,
    "Socialist Equality Party" => 0,
    "Sustainable Australia Party - Stop Overdevelopment/Corruption" => 0,
    "The Great Australian Party" => 0,
    "United Australia Party" => 0,
    "VOTEFLUX.ORG | Upgrade Democracy!" => 0,
    "Victorian Socialists" => 0,
    "Western Australia Party" => 0
);






// SERVER RESPONSE TO POST REQUEST

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // copy returned json into an array?
    $array = json_decode($_POST['results'], true);

    ///////////////////////////////////////////////////////////////////
    // NEED TO CREATE DATABASE - BASICALLY SAME AS EXCEL SPREADSHEET //
    ///////////////////////////////////////////////////////////////////

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
            
            case "A1":   
                
                switch($answer['result']){
                    case "stronglyAgree":
                        // do something 
                        $results['No5G Party'] += 1;
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

            case "B1":   
                
                switch($answer['result']){
                    case "stronglyAgree":
                        // do something 
                        $results['No5G Party'] += 1;
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


            case "B2":   
                
                switch($answer['result']){
                    case "stronglyAgree":
                        // do something 
                        $results['No5G Party'] += 1;
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



            case "X1":   
                
                switch($answer['result']){
                    case "stronglyAgree":
                        // do something 
                        $results['No5G Party'] += 1;
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
    
    }


    arsort($results);
    // Send something back
    echo json_encode($results);
}

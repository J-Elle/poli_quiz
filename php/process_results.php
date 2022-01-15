<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// Link database
include_once 'db.php';








// VARIABLES TO SCORE RUNNING TOTAL

$govparties= array(
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

    
    


    // check entire array for now
    // Liberal => 0;
    foreach($govparties as $partyname => $partyresults) { 
       
        // {"code":"Z1","question":"Test Question Associative Z1","result":"stronglyAgree"}            
        foreach($array as $return_obj => $answers){

            
            // DATABASE QUERY

            $userAnswer = $answers['result']; // e.g. stronglyAgree
            $qcode = $answers['code']; // e.g. Z1
            $p = $govparties[$partyname];
            

            // TODO ************************************** Fix the 'party' db query section

            $SQLgetResults = "SELECT $userAnswer FROM parties WHERE questioncode='$qcode';"; // party selector playing up

            // PARTY SELECTOR PLAYING UP
            //$SQLgetResults = "SELECT '$userAnswer' FROM parties WHERE questioncode='$qcode';";   
            //$SQLgetResults = "SELECT '$userAnswer' FROM parties WHERE party='$p' AND questioncode='$qcode';"; // NOT GETTING ANY RESULTS
            //$SQLgetResults = "SELECT '$userAnswer' FROM parties WHERE party='$govparties[$partyname]' AND questioncode='$qcode';"; 
            
            $score = mysqli_query($conn, $SQLgetResults);

            //$govparties[$partyname]+=10; // WORKS
            
            $resultCheck = mysqli_num_rows($score); 
            $x = mysqli_fetch_array($score);
            $govparties[$partyname]+=$x[0]; // works but is updating ALL
            
            if ($resultCheck > 0){
                // if some results came back...

                //$govparties[$partyname]+=10;

                // BREAKS IT
                
                
                while($row = mysqli_fetch_array($score)){
                    
                    //$id = intval($row['stronglyagree']);
                    //$govparties[$partyname]+=intval($row['stronglyagree']);
                    //$govparties[$partyname]+=10;
                    //$govparties[$partyname]+=$x;
                }
                
                   
            }
        } 
      
        
    }    
          
    //arsort($govparties);
    echo json_encode($govparties);
    //echo json_encode($x);
    //echo json_encode($score);
    //echo json_encode($resultCheck); // CHANGE BACK TO GOVPARTIES

}


    

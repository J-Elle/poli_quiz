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
    "Climate Emergency Action Alliance: Vote Planet" => 0,
    "Country Liberal Party (NT)" => 0,
    "Democratic Labour Party" => 0,
    "Derryn Hinchs Justice Party" => 0,
    "Federal ICAC Now" => 0,
    "Health Australia Party" => 0,
    "Independents CAN" => 0,
    "Indigenous - Aboriginal Party of Australia" => 0,
    "Informed Medical Options Party" => 0,
    "Jaqui Lambie Network" => 0,
    "Katters Australian Party (KAP)" => 0,
    "Legalise Cannabis Australia" => 0,
    "Liberal Democratic Party" => 0,
    "Liberal Party of Australia" => 0,
    "Love Australia or Leave" => 0,
    "National Party of Australia" => 0,
    "No5G Party" => 0,
    "Pauline Hansons One Nation" => 0,
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
    "Western Australia Party" => 0,
    "test" => 0
);

$testA = array(
    "test" => 0
);


// SERVER RESPONSE TO POST REQUEST

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // copy returned json into an array?
    $array = json_decode($_POST['results'], true);

    
    // check entire array for now
    // Liberal => 0;
    foreach($govparties as $partyname => $partyresults) { 
   

        // {"code":"Z1","question":"Test Question Associative Z1","result":"stronglyAgree"}            
        foreach($array as $return_obj => $answers){

            
            // DATABASE QUERY

            $userAnswer = $answers['result']; // e.g. stronglyAgree
            $qcode = $answers['code']; // e.g. Z1
            $p = $govparties[$partyname]; //  == 0
            $a = 'test';
            $t = 'thj';
            $r = $partyname;


            //$SQLgetResults = "SELECT $userAnswer FROM parties WHERE questioncode='$qcode';"; // WORKS
            $SQLgetResults = "SELECT $userAnswer FROM parties WHERE party='$partyname' AND questioncode='$qcode';"; // NOT GETTING ANY RESULTS but also showing as a correct query in log
            //$SQLgetResults = "SELECT $userAnswer FROM parties WHERE party=$r AND questioncode='$qcode';"; 
            //$SQLgetResults = "SELECT $userAnswer FROM parties WHERE party='$a';"; //WORKS
            //$SQLgetResults = "SELECT $userAnswer FROM parties WHERE party='$r';"; // This query shows up correctly in log
            //$SQLgetResults = "SELECT $userAnswer FROM parties WHERE party='$p';"; // Not updating anything because this == 0 picking up the last parties (Western Australia) initial value
            //$SQLgetResults = "SELECT $userAnswer FROM parties WHERE party='test' AND questioncode='$qcode';"; 
         
            $score = mysqli_query($conn, $SQLgetResults);
            
            $resultCheck = mysqli_num_rows($score); 

            if ($resultCheck > 0){
                // if some results came back...    
                $x = mysqli_fetch_array($score);
                
                if($x[0]!=0){
                    $govparties[$partyname]+=$x[0]; // works but is updating ALL                 
                    //$testA[$partyname]+=$x[0];
                }
            }

            
        } 
      
        
    }  
    
    

          
    arsort($govparties);
    echo json_encode($govparties);
    //echo json_encode($p);
    //echo json_encode($x);
    //echo json_encode($r);
    //echo json_encode($partyname);
    //echo json_encode($score);
    //echo json_encode($resultCheck); // CHANGE BACK TO GOVPARTIES

}


    

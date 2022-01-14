<?php


header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

include 'class/json_serializable.php';



$issues = array(
    "Aging & Elderly",
    "Agriculture & Farming",
    "Animal Welfare",
    "Australian Culture",
    "Childcare",
    "Climate Change",
    "Corruption",
    "Covid",
    "Defence",
    "Disability",
    "Drug Legalisation",
    "Economy",
    "Education",
    "Employment",
    "Entertainment & Arts",
    "Environment",
    "Foreign aid",
    "Freedom",
    "Future and Technology",
    "Government Surveillance",
    "Healthcare",
    "Housing",
    "Immigration",
    "Indigenous",
    "LGBTQ+",
    "Mens Rights",
    "Mental Health",
    "Natural Disasters",
    "News and Media",
    "NBN",
    "Privatisation",
    "Religion",
    "Roads & Transport",
    "Rural & Regional",
    "Tax",
    "Tradition",
    "Welfare",
    "Womens Rights"   
);

// if a get request
// NOTE will get CORS error use chrome extension for the time being
if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    echo json_encode($issues);
}



// If POST Request - will need to narrow scope further

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $array = json_decode($_POST['selectedIssues'], true);

    $questionsReturned = [];

    foreach($array as $value) {
                
        switch ($value) {

            case "Agriculture & Farming":
                $questionsReturned["B5"] = "Australia should withdraw from free trade agreements";    
                break;
            
            case "Australian Culture":
                $questionsReturned["D1"] = "Australian Culture as it stands should be preserved, with limited or no lifestyle changes";   
                break;

            case "Immigration":
                array_push($questionsReturned, "B Added");    
                break;

            case "Climate Change":
                array_push($questionsReturned, "A Added");    
                break;
            
            case "Government Spending":
                array_push($questionsReturned, "A Added");    
                break;

            case "Environment":
                array_push($questionsReturned, "A Added");    
                break;

            case "Healthcare":
                // USE THIS FORMAT
                $questionsReturned["Y1"] = "Test Question Associative";
                
                // CHANGE TO ABOVE FORMAT 
                array_push($questionsReturned, "More money should be invested in the public healthcare system");
                array_push($questionsReturned, "Australia should support euthanasia options to allow a certain criteria of people to die with dignity");
                array_push($questionsReturned, "5G telecommuncations towers pose a health risk to communities and should not be installed");

                break;

            case "Education":
                array_push($questionsReturned, "A Added");    
                break;

            case "Childcare":
                $questionsReturned["Z1"] = "Test Question Associative Z1";    
                break;

            case "Welfare":
                $questionsReturned["X1"] = "Test Question Associative X1";    
                break;

            case "Housing":
                array_push($questionsReturned, "Housing affordability is a significant problem that needs to be addressed");
                break;

            case "Investing":
                array_push($questionsReturned, "A Added");    
                break;

            case "Real Estate & Property":
                array_push($questionsReturned, "A Added");    
                break;

            case "Freedom":
                array_push($questionsReturned, "A Added");    
                break;

            case "Future and Technology":
                array_push($questionsReturned, "A Added");    
                break;

            case "Digital Currency":
                array_push($questionsReturned, "A Added");    
                break;

            case "Drug Legalisation":
                array_push($questionsReturned, "A Added");    
                break;

            case "Mental Health":
                array_push($questionsReturned, "A Added");    
                break;

            case "LGBTQ+":
                array_push($questionsReturned, "A Added");    
                break;

            case "Gender Identity":
                array_push($questionsReturned, "A Added");    
                break;

            case "Tradition":
                array_push($questionsReturned, "A Added");    
                break;

            case "Religion":
                array_push($questionsReturned, "A Added");    
                break;

            case "Parental Rights":
                array_push($questionsReturned, "A Added");    
                break;

            case "Medicare":
                array_push($questionsReturned, "A Added");    
                break;

            case "Employment":
                array_push($questionsReturned, "A Added");    
                break;
        
            case "Mens Rights":
                array_push($questionsReturned, "A Added");    
                break;

            case "Womens Rights":
                array_push($questionsReturned, "The gender pay gap needs to be addressed, through either more oversight or regulation");
                break;

            case "Entertainment & Arts":
                array_push($questionsReturned, "A Added");    
                break;

            case "Economy":
                array_push($questionsReturned, "A Added");    
                break;

            case "Foreign aid":
                array_push($questionsReturned, "A Added");    
                break;

            case "Tax":
                array_push($questionsReturned, "A Added");    
                break;

            case "Government Surveillance":
                array_push($questionsReturned, "A Added");    
                break;

            case "Defence":
                array_push($questionsReturned, "A Added");    
                break;

            case "Covid":
                array_push($questionsReturned, "A Added");    
                break;

            case "Roads & Transport":
                array_push($questionsReturned, "A Added");    
                break;

            case "Mining":
                array_push($questionsReturned, "A Added");    
                break;

            case "Indigenous":
                array_push($questionsReturned, "A Added");    
                break;


            case "Rural & Regional":
                array_push($questionsReturned, "A Added");    
                break;
            
            case "Natural Disasters":
                array_push($questionsReturned, "A Added");    
                break;

            case "Animal Welfare":
                array_push($questionsReturned, "A Added");    
                break;

            case "NBN":
                array_push($questionsReturned, "A Added");    
                break;

            case "Disability":
                array_push($questionsReturned, "A Added");    
                break;

            case "Aging & Elderly":
                array_push($questionsReturned, "A Added");    
                break;
            
            case "Foreign Ownership":
                array_push($questionsReturned, "A Added");    
                break;

            case "Privitisation":
                array_push($questionsReturned, "A Added");    
                break;

            case "Corruption":
                array_push($questionsReturned, "A Added");    
                break;
            

            default:
                //
        }
        

    }

    echo json_encode($questionsReturned);
   
    
   
    
}


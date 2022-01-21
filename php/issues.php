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
    "Privacy",
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

            case "Aging & Elderly":
                $questionsReturned["A1"] = "Aged care needs more funding and reform";    
                break;

            case "Agriculture & Farming":
                $questionsReturned["B1"] = "There should be increased funding to support a thriving Agriculture industry, including meat, dairy, and plants"; 
                $questionsReturned["B2"] = "Farmers should use tried and tested techniques to ensure pest eradication and disease threats are managed, rather than seek environmentally"; 
                $questionsReturned["B3"] = "The use of GMOs should be stopped"; 
                $questionsReturned["B4"] = "Animal farming should be reduced and increased investment in plant-based alternatives"; 
                $questionsReturned["B5"] = "Australia should withdraw from free trade agreements";    
                break;

            case "Animal Welfare":
                $questionsReturned["C1"] = "There should be reform to encourage a plant based diet being widely adopted";  
                $questionsReturned["C2"] = "Animal racing should be banned (e.g. horse racing)";
                $questionsReturned["C3"] = "Live exports should be banned";
                $questionsReturned["C4"] = "All hunting and lethal population controls should cease";
                break;
            
            case "Australian Culture":
                $questionsReturned["D1"] = "Australian Culture as it stands should be preserved, with limited or no lifestyle changes";   
                break;

            case "Childcare":
                $questionsReturned["E1"] = "Test Question Associative Z1";    
                break;

            case "Climate Change":
                $questionsReturned["F1"] = "We should invest in green energy solutions, and begin to withdraw finding from fossil fuel energy"; 
                $questionsReturned["F2"] = "More needs to be done to combat climate change, it’s an emergency"; 
                $questionsReturned["F3"] = "We should consider a carbon tax to reduce harmful pollution"; 
                break;

            case "Corruption":
                $questionsReturned["G1"] = "There should be a federal anti corruption commission (ICAC) ";     
                $questionsReturned["G2"] = "There needs to be reform on political advertising such as a limit to expenditure";  
                break;

            case "Covid":
                $questionsReturned["H1"] = "Test Question Associative Z1";     
                break;

            case "Defence":
                $questionsReturned["I1"] = "Australia should continue to provide military support as an ally in overseas endeavours";     
                break;

            case "Disability":
                $questionsReturned["J1"] = "Test Question Associative Z1";     
                break;
            
            case "Drug Legalisation":
                $questionsReturned["K1"] = "Australia should consider the legalisation of all or most drugs"; 
                $questionsReturned["K2"] = "Australia should legalise cannabis ";   
                break;

            case "Economy":
                $questionsReturned["L1"] = "Foreign ownership should be decreased";  
                $questionsReturned["L2"] = "We should consider a Universal Basic Income";      
                break;

            case "Education":
                $questionsReturned["M1"] = "Education should stay focused on the basics – literacy and arithmetic, rather than a broad range of topics";  
                $questionsReturned["M2"] = "School science classes should teach students about climate science"; 
                $questionsReturned["M3"] = "Public schools should be allowed to engage school chaplains to teach christian values"; 
                $questionsReturned["M4"] = "Schools should teach students life skills such as critical thinking, and government and voting";    
                break;

            case "Employment":
                $questionsReturned["N1"] = "Underemployment needs to be addressed, mass casualisation of the workforce is not sustainable";   
                $questionsReturned["N2"] = "We should aim to move to a 4 day or less work week";      
                break;

            case "Entertainment & Arts":
                $questionsReturned["O1"] = "Test Question Associative Z1";    
                break;

            case "Environment":
                $questionsReturned["P1"] = "Our current methods to deal with waste products is fine and needs no change";    
                $questionsReturned["P2"] = "Australia should rapidly move away from non-renewable natural resources"; 
                break;

            case "Foreign aid":
                $questionsReturned["Q1"] = "Australia should stop providing foreign aid";    
                break;

            case "Freedom":
                $questionsReturned["R1"] = "Citizens should be able to posess a firearm without a license";     
                break;

            case "Future and Technology":
                $questionsReturned["S1"] = "Digital Currency"; 
                $questionsReturned["S2"] = "We should invest more in researching treatments and drugs for medical conditions";    
                break;

            case "Healthcare":
                $questionsReturned["U1"] = "More money should be invested in the public healthcare system";
                $questionsReturned["U2"] = "Australia should support euthanasia options to allow a certain criteria of people to die with dignity";
                $questionsReturned["U3"] = "5G telecommuncations towers pose a health risk to communities and should not be installed";
                $questionsReturned["U4"] = "Focus should be on healthy eating and lifestyle changes, above research and medication";
                $questionsReturned["U5"] = "Medicare should cover dental services";
                $questionsReturned["U6"] = "Medicare should remain the core healthcare support option for Australians, with private healthcare optional only  ";         
                break;

            case "Housing":
                $questionsReturned["V1"] = "Housing affordability is a significant problem that needs to be addressed"; 
                $questionsReturned["V2"] = "Everyone has the right to adequate housing"; 
                break;

            case "Immigration":
                $questionsReturned["W1"] = "Australia should aim to maintain or decrease the population level"; 
                $questionsReturned["W2"] = "Australia should treat refugees with compassion and ensure that they have humane conditions until asylum is granted";    
                break;

            case "Indigenous":
                $questionsReturned["X1"] = "The indigenous population should be considered in all decisions and consulted on relevant matters";    
                break;

            case "LGBTQ+":
                $questionsReturned["Y1"] = "LQBTQ+ persons must receive equal treatment and not discriminated against";     
                break;

            case "Mens Rights":
                $questionsReturned["Z1"] = "Test Question Associative X1";     
                break;

            case "Mental Health":
                $questionsReturned["AA1"] = "Test Question Associative X1";    
                break;

            case "Natural Disasters":
                $questionsReturned["BB1"] = "Test Question Associative X1";    
                break;

            case "News and Media":
                $questionsReturned["CC1"] = "Test Question Associative X1";    
                break;

            case "NBN":
                $questionsReturned["DD1"] = "Most people should have access to the improved NBN connection Fibre to the premises (FTTP)";    
                break;

            case "Privatisation":
                $questionsReturned["EE1"] = "Important infrstructure should remain publicly owned";   
                break;

            case "Privacy":
                $questionsReturned["T1"] = "NA";    
                break;

            case "Religion":
                $questionsReturned["FF1"] = "Everyone should have freedom of religion, the right to practice whatever religion one chooses"; 
                $questionsReturned["FF2"] = "Only christianity based religion should be permitted in Australia"; 
                $questionsReturned["FF3"] = "Educators have a responsibility to teach children about Christ";    
                break;

            case "Roads & Transport":
                $questionsReturned["GG1"] = "NA";    
                break;

            case "Rural & Regional":
                $questionsReturned["HH1"] = "NA";     
                break;

            case "Tax":
                $questionsReturned["II1"] = "Increasing taxes for high income earners is the wrong approach, there are better ways to support a strong economy ";   
                $questionsReturned["II2"] = "Australia should implement a carbon tax";   
                break;

            case "Tradition":
                $questionsReturned["JJ1"] = "Australia should uphold traditional values and not redefine past beliefs and values";     
                $questionsReturned["JJ2"] = "The traditional family unit should be preserved";   
                break;
            
            case "Welfare":
                $questionsReturned["KK1"] = "The Australian welfare system needs to be strengthened to provide better support";     
                break;

            case "Womens Rights":
                $questionsReturned["LL1"] = "The gender pay gap needs to be addressed, through either more oversight or regulation";  
                $questionsReturned["LL2"] = "Women should have access to reproductive decisions such as voluntary hysterectomy and abortion";   
                break;       

            default:
                //
        }
        

    }

    echo json_encode($questionsReturned);
   
    
   
    
}


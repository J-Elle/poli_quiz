<?php


header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

//echo "Hello world";




$issues = array(
    "Australian Culture",
    "Immigration",
    "Climate Change",
    "Government Spending",
    "Environment",
    "Healthcare",
    "Education",
    "Childcare",
    "Aged pension",
    "Jobseeker",
    "Housing",
    "Investing",
    "Real Estate & Property",
    "Freedom",
    "Future and Technology",
    "Digital Currency",
    "Drug Legalisation",
    "Mental Health",
    "LGBTQ+",
    "Gender Identity",
    "Tradition",
    "Religion",
    "News and Media",
    "Employment",
    "Parental Rights",
    "Medicare",
    "Mens Rights",
    "Womens Rights",
    "Entertainment & Arts",
    "Economy",
    "Foreign aid",
    "Tax",
    "Government Surveillance",
    "Defence",
    "Covid",
    "Roads & Transport",
    "Mining",
    "Indigenous",
    "Agriculture & Farming",
    "Rural & Regional",
    "Natural Disasters",
    "Animal Welfare",
    "NBN",
    "Disability",
    "Aging & Elderly"
);

// if a get request
// NOTE will get CORS error use chrome extension for the time being
if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    echo json_encode($issues);
}


// jquery onload
$(function () {
    $(loadQuestions());

    //$(loadGraphics());

    /*
    $('#quiz').submit(function (e) {
        //solution to prevent double-click source: https://stackoverflow.com/questions/1414365/disable-enable-an-input-with-jquery
        $(this).find(':submit').attr('disabled','disabled'); 
        checkAnswer(e); 
    });
    */
})

var firstQuestionLoaded;
var arrayOfQuestions;
var currentQuestionIndex = 0;
var attempted = 0;
var correct = 0;
var incorrect = 0;
var submittedPressed = 0;

/*
* Retrieves questions from the server and calls
* the populateQuestion function to populate the first question when it is
* available
*/
function loadQuestions() {

    
    var jqxhr = $.get('http://localhost/janellesprojects/poliquiz/php/issues.php');

    // if data returned successfully, populate the first question and load data to array
    jqxhr.done(function (data) {
        //populateQuestion(data.questions[currentQuestionIndex]);
        //arrayOfQuestions = data.questions;
        var test = JSON.stringify(data);
        JSON.parse(test);
        console.log("GET request was successful");
        console.log(test);
    })

    // if loading questions fails log the error
    jqxhr.fail(function (jqXHR) {
        console.log("ERROR: " + jqXHR.status);
        console.log("ERROR: " + jqXHR.statusText);
    })
    


    /*
    // ALTERNATELY TRYING AJAX -- note: issue was my echo hello world

    // AJAX request to get question and answers
    $.ajax({
        url: "http://localhost/janellesprojects/poliquiz/php/issues.php",
        cache: false,
        type: "GET",
        dataType: "json",
        success: function (response) {
            // use data from server to populate question and answer labels in the DOM
           console.log("WORKED");
        },
        error: function (xhr) {
            console.log("ERROR");
        }
    });
    */


}


function populateQuestion(){

}
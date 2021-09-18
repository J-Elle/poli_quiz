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
    var jqxhr = $.get('http://turing.une.edu.au/~jbisho23/assignment2/quiz.php');

    // if data returned successfully, populate the first question and load data to array
    jqxhr.done(function (data) {
        populateQuestion(data.questions[currentQuestionIndex]);
        arrayOfQuestions = data.questions;
    })

    // if loading questions fails log the error
    jqxhr.fail(function (jqXHR) {
        console.log("ERROR: " + jqXHR.error);
    })
}


// jquery onload
$(function () {
    // load questions as part of onload
    $(loadQuestions());

    // had to use long format
    $(document).on('click', ".issues",  clickIssue);
   
})

var firstQuestionLoaded;
var arrayOftopics = [];
var currentQuestionIndex = 0;
var attempted = 0;
var correct = 0;
var incorrect = 0;
var submittedPressed = 0;
var numItems;


/*
* Retrieves questions from the server and calls
* the populateQuestion function to populate the first question when it is
* available
*/
function loadQuestions() {

    
    var jqxhr = $.get('http://localhost/janellesprojects/poliquiz/php/issues.php');

    // if data returned successfully, populate the first question and load data to array
    jqxhr.done(function (data) {
        populateQuestion(data);
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

// Function runs a for each over the returned JSON topics and uses function showTopics to populate into HTML
function populateQuestion(data){
    // convert JSON data retrieved from server to an array
    for(var i in data){
        arrayOftopics.push([i, data [i]]);
    }

    // Used JSON directly instead of array because array populated index too
    data.forEach(showTopics);
    
    //console.log(arrayOftopics);
}


// Function appends each topic item into the html
function showTopics(item){
    $('#box_of_issues').append('<div id="'+item+'" class="issues">'+item+'</div>');
}


function clickIssue(){  
    //alert("SHOWN "+$(this).attr('id'));
    
    // Check how many issues have been selected
    numItems = $('.selected').length;
    
    // if less than 5 issues selected allow toggle
    if(numItems < 5){
        $(this).toggleClass('selected');
    }

    // if 5 issues selected allow remove only
    if(numItems == 5){
        $(this).removeClass('selected');
    }
    
    // update count of items selected
    numItems = $('.selected').length

    // if two or more issues selected, reveal next button
    if(numItems >= 2){
        $('#next_button').removeClass('hidden');
    }

    // if less than two issues selected, remove next button
    if(numItems < 2){
        $('#next_button').addClass('hidden');
    }
    

}



var index = 0;
var current = 1;
var totalQuestions = 0;
var arrayOfQuestions = [];
var arrayOfResults = [];

// jquery onload
$(function () {

    // Callback function to prevent default submit and instead use AJAX to make a http request
    $('#next_button').click(function (e) {

        showQuiz();
        getQuizQuestions(e); 

    });

    radioHandler = (e)=>{
        if($(e).prop("checked")){
          $("#nextOnQuiz").removeAttr('disabled')
        }
      }


    // Actions when pressing next on the quiz
    $('#nextOnQuiz').click(function (e) {

        // update variables for purpose of displaying progress to user and 
        // selecting the next question from the array
        index++;
        current++;
        $('#statement').text(arrayOfQuestions[index]);
        $('#quizHeader').text("Question "+current+" / "+totalQuestions);

        // reset radio buttons
        $("input:checked").prop("checked", false);

        // store results in array
        // or maybe i should use classes for the question and question code?

        // if all questions answered
        if(current > totalQuestions){
            $('#quizRadioButtons').addClass('hidden');
            $('#quizHeader').text("Results");
            $('#statement').text("Maybe I shoud put something here");
           // calculate results and display parties
        }


    });
   


})


function showQuiz(){

    // Hide issues content
    $('#next_button').addClass('hidden');
    $('.issues').addClass('hidden');
    $('#instructions').text("New instructions");

    // Load quiz structures
    $('#main_content_box').addClass('quizBorder');
    $('#quizHeader').append("Question");
    $('#statement').append('<div id="quizFormContainer" class="quizContent">'+"I like cats "+'</div>');
    $('#quizRadioButtons').removeClass('hidden');
}





function getQuizQuestions(e){

    // Get IDs of selected items
    var arrayOfSelected = $('.selected').map(function(){
        return this.id;
    }).get();

    console.log(arrayOfSelected);
    
    // JSON stringify the issues
    $stringIssues = JSON.stringify(arrayOfSelected);
    

    // serialize results from selections to a var
    // send the var in the ajax

    // AJAX -- do I want to sanitize anything first??
    
     // AJAX call to get correct answer
     $.ajax({
        url: "http://localhost/janellesprojects/poliquiz/php/issues.php",
        data: {
            'selectedIssues': $stringIssues,
        },
        cache: false,
        type: "POST",
        success: function (response) {

            // do something with results

            console.log(response);
            totalQuestions = response.length;

            /*
            *   In PHP file now going to send the data over as objects in an array
            *   Already getting encoded in JSON at end of file
            *   Need to figure out how to copy to regular array on this side or something
            */

            //$('#statement').text(response[0];
            $('#quizHeader').text("Question "+current+" / "+totalQuestions);

            for(var i in response){
                
                //var q = i.getQuestion(); // PHP class function, not JS!!
                
                //arrayOfQuestions.push([response [i]]);
            }

        },
        error: function (xhr) {
            console.log("ERROR: " + xhr.error);
        }
    });

    




}
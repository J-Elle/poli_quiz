var index = 0;
var current = 1;
var totalQuestions = 0;
var arrayOfQuestions = [];
var arrayOfResults = [];
var clonedObj;

// jquery onload
$(function () {

    // Callback function to unveil quiz and retrieve and display questions
    $('#next_button').click(function (e) {
        showQuiz();
        getQuizQuestions(e);
    });


    // Ensures a radio button is selected before allowing next button to be clicked
    radioHandler = (e) => {
        if ($(e).prop("checked")) {
            $("#nextOnQuiz").removeAttr('disabled')
        }
    }


    ///////////////////////////// NEXT BUTTON /////////////////////////////////////
    // Actions when pressing next on the quiz
    $('#nextOnQuiz').click(function (e) {

        // update question progress 0/3
        index++;
        current++;
        $('#quizHeader').text("Question " + current + " / " + totalQuestions);

        // if all questions answered
        if (current > totalQuestions) {
            $('#quizRadioButtons').addClass('hidden');
            $('#quizHeader').text("Results");
            $('#statement').text("Maybe I shoud put something here");
            return 0;
            // calculate results and display parties
        }

        // select the next question from the array
        $('#statement').text(arrayOfResults[index].question);

        // reset radio buttons
        $("input:checked").prop("checked", false);

        // store results in array
        // or maybe i should use classes for the question and question code?

    });

})

///////////////////// QUIZ CSS REVEAL //////////////////////////
function showQuiz() {

    // Hide issues content
    $('#next_button').addClass('hidden');
    $('.issues').addClass('hidden');
    $('#instructions').text("New instructions");

    // Load quiz structures
    $('#main_content_box').addClass('quizBorder');
    $('#quizHeader').append("Question");
    $('#statement').append('<div id="quizFormContainer" class="quizContent">' + "I like cats " + '</div>');
    $('#quizRadioButtons').removeClass('hidden');
}



////////////////////////// GET QUESTIONS FROM SERVER ////////////////////////////////////
function getQuizQuestions(e) {

    // Get IDs of selected items
    var arrayOfSelected = $('.selected').map(function () {
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


            /*
            *   In PHP file now going to send the data over as objects in an array
            *   Already getting encoded in JSON at end of file
            *   Need to figure out how to copy to regular array on this side or something
            */

            // Object copy of the response PHP associative array
            clonedObj = JSON.parse(JSON.stringify(response));
            console.log(clonedObj);

            // for each entry in the response array received, copy to arrayOfQuestions for use in JS
            for (var i in response) {
                arrayOfQuestions.push([response[i]]);
            }



            
            for (var k in response){
                if (response.hasOwnProperty(k)) {
                     //alert("Key is " + k + ", value is " + response[k]);

                     const qObject = new Object();
                     qObject.code = k;
                     qObject.question = response[k];
                     qObject.result;
                     console.log(qObject);
                     arrayOfResults.push(qObject);                      
                }
            }

            //console.log(arrayOfResults[0].code);

        


            console.log(arrayOfQuestions);
            totalQuestions = arrayOfQuestions.length;

            //$('#statement').text(arrayOfQuestions[0]);
            $('#statement').text(arrayOfResults[0].question);
            $('#quizHeader').text("Question " + current + " / " + totalQuestions);


        },
        error: function (xhr) {
            console.log("ERROR: " + xhr.error);
        }
    });






}
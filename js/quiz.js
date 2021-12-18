// jquery onload
$(function () {

    // Callback function to prevent default submit and instead use AJAX to make a http request
    $('#next_button').click(function (e) {

        showQuiz();
        
        //solution to prevent double-click source: https://stackoverflow.com/questions/1414365/disable-enable-an-input-with-jquery
        //$(this).find(':submit').attr('disabled','disabled'); 
        
        getQuiz(e); 
    });
   
})

function showQuiz(){

    // Hide issues content
    $('#next_button').addClass('hidden');
    $('.issues').addClass('hidden');

    // Load quiz structures
    $('#main_content_box').addClass('quizBorder');
    $('#quizHeader').append("Question");
    $('#statement').append('<div id="quizFormContainer" class="quizContent">'+"I like cats "+'</div>');
    $('#quizRadioButtons').removeClass('hidden');
}





function getQuiz(e){

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

        },
        error: function (xhr) {
            console.log("ERROR: " + xhr.error);
        }
    });

    




}
// jquery onload
$(function () {

    // Callback function to prevent default submit and instead use AJAX to make a http request
    $('#next_button').click(function (e) {
        
        //solution to prevent double-click source: https://stackoverflow.com/questions/1414365/disable-enable-an-input-with-jquery
        //$(this).find(':submit').attr('disabled','disabled'); 
        
        getQuiz(e); 
    });
   
})

function getQuiz(e){
    //e.preventDefault();
    
    //console.log("hello");

    var arr = $('.selected').map(function(){
        return this.id;
    }).get();

    console.log(arr);
    

    // serialize results from selections to a var
    // send the var in the ajax

    // AJAX -- do I want to sanitize anything first??
    /*
    $.ajax({
        url: 'http://localhost/janellesprojects/poliquiz/php/issues.php',
        method: 'POST',
        dataType: 'json',
        data: dataEntry,

        success: function (data) {
            // Display user id number in user_id element
            $("#user_id").html("User " + data.user_id + " logged in");
        },

        error: function (jqXHR) {
            var $e = JSON.parse(jqXHR.responseText);
            console.log('Status Code: ' + $e.error);
        }
    })
    */




}
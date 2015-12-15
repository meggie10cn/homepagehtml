$(document).ready(function(){
    $("#submit_searchseeker").onSubmit(function() {
         // $("#myDiv").css("hidden");
        //  $('#myTD2').css("color","white");
        //  $('#myTD2').css("fontWeight","bold");
        var keyword = document.getElementById('keywords_seeker').value;
        var state = document.getElementById('state_select').value;
        var queryString="keyword=" + keyword + "&state=" + state;
        
          // var queryString = "keyword=" + document.myForm.keywords.value + "state=" + document.myForm.state_select.value + "category=" + document.myForm.category_select.value;
           if(queryString =="")
           {
            $('#seekerlistresult').html('');
            return; 
           }
           else {
           $.post("resultseeker.php",queryString,function(result){

            $('#myDiv').html(result);
           }); }
    });
  });
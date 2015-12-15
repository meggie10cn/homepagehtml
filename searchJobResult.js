/* if the submit button hit, querystring will send to MySQL DB
JQuery Ajax function */

$(document).ready(function(){
    $("#submit_search").click(function() {
          $("#myDiv").css("hidden");
        //  $('#myTD2').css("color","white");
        //  $('#myTD2').css("fontWeight","bold");
          // var queryString = "keyword=" + document.myForm.keywords.value + "state=" + document.myForm.state_select.value + "category=" + document.myForm.category_select.value;
        var keyword = document.getElementById('keywords').val();
        var state = document.getElementById('state_select').val();
        var category = document.getElementById('category_select').val();
        var queryString="?keyword=" + keyword;
        queryString +="&state=" + state + "&category=" + category;
           if(queryString =="")
           {
            $('#myDiv').html('<li><img src="images/noresults.jpg"></li>').show();
            return; 
           }
           else {
           $.post("jobSearchResult.php",queryString,function(result){

            $('#myDiv').html(result).show();
           }); }
    });
  }); 


 function ajaxFunction () {
        // $("#myDiv").hide();
        //  $('#myTD2').css("color","white");
        //  $('#myTD2').css("fontWeight","bold");
        // var queryString = "keyword=" + document.myForm.keywords.value + "state=" + document.myForm.state_select.value + "category=" + document.myForm.category_select.value;
        //var keyword = document.getElementById('keywords').value;
        var keyword =$('#keywords').val();
        //var state = document.getElementById('state_select').value;
        var state = $('#state_select').val();
        //var category = document.getElementById('category_select').value;
        var category = $('#category_select').val();
        var queryString="?keyword=" + keyword;
        queryString +="&state=" + state + "&category=" + category;
        if(queryString =="")
        {
            $('#myDiv').html('').show();
            return;
        }
        else {
            $.post("jobSearchResult.php",queryString,function(result){

                $('#myDiv').html(result).show();
            }); }
    };

    function myTruncate($string, $limit, $break=".", $pad="...")
    {
  // return with no change if string is shorter than $limit
      if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
     if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
     }
  }

  return $string;
}
<?php 
 session_start();
 ob_start();

if (isset($_SESSION['valid_user'])){
 $user=$_SESSION['valid_user'];
 }
 ob_flush();
 ?> 
 <script>
 $(document).ready(function(){
    $("#submit_searchseeker").onSubmit(function() { 
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
</script>
<?php include ("header.php"); ?>
<?php include("employernavigator3.php");?>
</br>
</br>
<div id="searchseeker_area" align="center">
		<?php include("searchseekerbox.php");?>
</div>
<div id="featuredseekerlist" class="col_12 column"> 
<?php include("featureseeker.php");?>
</div>
<div class="clearfix"></div>
	<?php include("footer.php");?>
</body>
</html>

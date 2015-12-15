<? php

$doc = new DomDocument;
// validate the documents before refering to the id
$doc ->validateOnParse = true;
$doc ->loadHTML(file_get_contents('SearchResult1121.php'));
$job_id = var_dump($doc ->getElementById(''))

  //$job_id= $_REQUEST['id'];
 include("conn.php");
 $dbc= new database();
 $dbc -> connect();

 // $dbc = new DBconnect();
 // $dbc -> connect();



//var x = self.opener.parent.document.getElementById&#40;&#34;link1&#34;&#41;.href;var y = self.opener.parent.document.getElementById&#40;&#34;link1&#34;&#41;.innerHTML;document.getElementById&#40;&#39;upper2&#39;&#41;.href  = x;document.getElementById&#40;&#39;upper2&#39;&#41;.title = y
  //function detailsjob(){
  //	global $job_id, $dbc;


  	if($job_id) {
  	$query="SELECT * FROM job j join types t on j.type_id = t.tid WHERE jid='$job_id'";
  	$dbc ->execute_query($query)
  	$result = $dbc ->fetch_assoc();
  	
  	 echo "<h3>".$result['title']."</h3>";
  	 echo "<ul>";
  	 echo "<li><strong>Location:</strong>".$result['city']","$result['state']."</li>";
  	 echo "<li><strong>Job Type: </strong>".$result['type_name']."</li>";
  	 echo "<li><strong>Decription: </strong>".$result['description']."</li>";
  	 echo  "<li><strong>Decription: </strong>".$result['description']."</li>";
  	 echo "<li><strong>Contact Email: </strong>".$result['contact_email']."</li>"
  	 echo  "<li><strong>Expired Date: </strong>".$result['expired_date']."</li>";
  	 echo "</ul>";
  }
  ?>
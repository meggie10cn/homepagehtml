<div class="col_12 column">
    <!-- Menu Horizontal -->
    <ul class="menu">
        <li ><a href="employerJobList.php"><i class="icon-home"></i> My JobList</a></li>
        <li class="current"><a href="employermain.php"><i class="icon-desktop"></i> Add Jobs</a></li>
        <li><a href="browserseeker.php"><i class="icon-desktop"></i> Browse JobSeeker </a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
         <li><div id="welcomeuser">Welcome  <?php echo $_SESSION['valid_user']?></div></li>
    </ul>
</div>
<style>
#welcomeuser {
  animation-play-state:running;
  position: relative;
  -webkit-animation: mymove 5s infinite;
  animation: mymove 5s infinite;
  color: darkorange;
  font-size:18px;
}
@-webkit-keyframes mymove {
  from {left:0px;}
  to {left:60px;}
}
@-moz-keyframes mymove {
  from {left:0px;}
  to {left:60px;}
}
</style>
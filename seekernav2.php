<div class="col_12 column">
    <!-- Menu Horizontal -->
    <ul class="menu">
        <li ><a href="Jobseekerprofile.php"><i class="icon-home"></i> My Profile</a></li>
        <li class="current"><a href="jobseekeredit.php"><i class="icon-desktop"></i> Edit Profile</a></li>
        <li><a href="browsejobs.php"><i class="icon-desktop"></i> Browse Jobs </a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
         <li><div id="welcomeuser">Welcome  <?php echo $_SESSION['seeker_Name']?></div></li>
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
  to {left:200px;}
}
@-moz-keyframes mymove {
  from {left:0px;}
  to {left:200px;}
}
</style>
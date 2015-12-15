<?php include ("header.php"); ?>
<?php include("jobRegNav.php");?>
<?php require ("conn.php");?>
    <!--creating a form for the registration page-->
    
	   <!--<table width='450' border='3' align='center'>
	     <tr>
		   <heading-->

		   <div class="col_12 column">
			<form name= 'validate' id="regS_form" method='post' action='jobSeekerRegistration1.php' onsubmit="return jobSeekerValidation()">
	   <!--creating a centered table-->
			<fieldset>
			<legend>JobSeeker Registration Page</legend>
			    <p>
		    	<label for="role">Role</label>
		        <select name='role' required>
			     <option>JobSeeker</option>
			     <!--<option>Employer</option>  // disable the Employer function-->
			     </select>
			     </p>
			     <p>
					<label for="first_name">First Name</label>
					<input type='text' id="first_name" name='fname' required/>
				</p>
				<p>
					 <!--text and input fields-->
					<label for="last_name">Last Name</label>
					<input id="last_name" name="lname" type="text" required/>
				</p>
				<p>

					<label for="Email">Email:</label>
					<input id="email" name="email" type="email" required/>
				</p>
				<p>
					<label for="password">Password:</label>
					<input id="password" name="password" type="password" required/>
				</p>
				<p>
				 <label for="email">Confirm Password:</label>
		         <input type='password' id="confpass" name='confpass' required />
				</p>

				 <p>
					<label for="phone">Phone:</label>
					<input id="phone" name="phone" type="text" required/>
				</p>
				<p>
					<p>
					<label for="addresss">Address:</label>
					<input id="address" name="address" type="text" />
				</p>

				  <p>
					<label for="city">City:</label>
					<input id="city" name="city" type="text" />
				</p>
                 <p>
                 	<label for="State">State:</label>
                 	<select name="state" id="state" required>
                 	<option>AL</option>
			   		<option>AK</option>
			   		<option>AZ</option>
			   		<option>AR</option>
			   		<option>CA</option>
			   		<option>CO</option>
			  		 <option>CT</option>
			   		<option>DE</option>
			   		<option>FL</option>
			   		<option>GA</option>
			   		<option>HI</option>
			   		<option>ID</option>
			   		<option>IL</option>
			   		<option>IN</option>
			   		<option>IA</option>
			   		<option>KS</option>
			   		<option>KY</option>
			   		<option>LA</option>
			   		<option>ME</option>
			   		<option>MD</option>
			   		<option>MA</option>
			   		<option>MI</option>
			   		<option>MN</option>
			   		<option>MS</option>
			   		<option>MO</option>
			   		<option>MT</option>
			   		<option>NE</option>
			   		<option>NV</option>
			   		<option>NH</option>
			   		<option>NJ</option>
			   		<option>NM</option>
			   		<option>NY</option>
			   		<option>NC</option>
			   		<option>ND</option>
			   		<option>OH</option>
			   		<option>OK</option>
			   		<option>OR</option>
			   		<option>PA</option>
			   		<option>RI</option>
			   		<option>SC</option>
			   		<option>SD</option>
			   		<option>TN</option>
			  	    <option>TX</option>
			        <option>UT</option>
			        <option>VT</option>
			       <option>VA</option>
			        <option>WA</option>
			       <option>WV</option>
			       <option>WI</option>
			       <option>WY</option>
			       </select>
                 </p>
                 <p>
                 <label for="zipcode">Zip Code:</label>
		          <input type='text' name='zip' id='zip' required />
                 </p>
                 <p>
					<label for="created_date">Created Date:</label>
					<input id="date" name="date" type="date" required/>
				</p>
				<p>
					<input color= "red" type="submit" name='submit' value="Register" />
				</p>
				</fieldset>
			</form>
		</div>
		<div class="clearfix"></div>
	<?php include("footer.php");?>
  </body>
</html>

<?php include ("header.php"); ?>
<?php include("employNav.php");?>
    <!--creating a form for the registration page-->
    
	   <!--creating a centered table-->
	   <div class="col_12 column">
		 <form name= 'validate' id="regEm_form"method='post' action='employerRegistration.php' onsubmit="return employerValidation()">
			<fieldset>
			<legend>Employer Registration Page</legend>
	     
		   <!--text and input fields-->
		    <p>
		    	<label for="role">Role</label>
		        <select name='role' required>
			     <option>Employer</option>
			     <!--<option>JobSeeker</option>     disable the Jobseeker lixia 12/1/2015  -->  
			     </select>
			</p>
		   <!--text and input fields-->
		   	<p>
			 <label for="Email">Email:</label>
			  <input id="email" name="email" type="email" required/>
			</p>
		   <!--text and input fields-->
		   <p>
				<label for="password">Password:</label>
				<input id="password" name="password" type="password" required/>
			</p>
		   <!--text and input fields-->
		    <p>
				<label for="email">Confirm Password:</label>
		        <input type='password' id="confpass" name='confpass' required />
		    </p>	
	
		   <!--text and input fields-->
		    <p>
		    	<label for="contact_name">Contact Name:</label>
		        <input type='text' id="contact_name" name='contact_name' required />
		    </p>
		   <!--text and input fields-->
		    <p>
		    	<label for="company_name">Company Name:</label>
		        <input type='text' id="company_name" name='company_name' required />
		    </p>
            
            <p>
		    	<label for="web_url">Website url:</label>
		        <input type='text' id="website_url" name='website_url' required />
		    </p>
		   <!--text and input fields-->
		 
		    <p>
					<label for="phone">Phone:</label>
					<input id="phone" name="phone" type="text" required/>
				</p>
		   <!--text and input fields-->
		 <p>
					<label for="addresss">Address:</label>
					<input id="address" name="address" type="text" />
				</p>
		   <!--text and input fields-->
		  <p>
					<label for="city">City:</label>
					<input id="city" name="city" type="text" />
				</p>
		   <!--text and input fields-->
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
		   <!--text and input fields-->
		  <p>
                 <label for="zipcode">Zip Code:</label>
		          <input type='text' name='zip' id='zip' required />
          </p>
		   <!--submit button-->
		   <p>
				<input type="submit" name='submit' value="Register" />
			</p>
  		</fieldset>
			</form>
		</div>
		<div class="clearfix"></div>
	<?php include("footer.php");?>
  </body>
</html>

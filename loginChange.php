
<?php include ("header.php"); ?>
<?php include("loginNav.php");?>

<div class="col_12 column">
    <form name= 'check' method='post' action='login1.php' onsubmit="return emailValidation()">
        <fieldset>
            <legend>Login Page</legend>
            <p>
                <label for="email">Email:</label>
                <input id="uname" name="uname" type="text" />
            </p>
            <p>
                <label for="password">Password</label>
                <input id="pass" name="pass" type="password" />
            </p>
              <p>
                <label for="type">User Types:</label>
                <select name="usertype" id="usertype"required>
                 <option>Employer</option>
                 <option>JobSeeker</option>
                </select>
            </p>
            <p>
                <input type="submit" name='login' value="login" />
        </fieldset>
    </form>
</div>
<div class="clearfix"></div>
<?php include("footer.php");?>

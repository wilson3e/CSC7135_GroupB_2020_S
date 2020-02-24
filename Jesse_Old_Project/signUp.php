<?php

include('includes/Header.html');

?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require ('./mysqli_connect.php');
	$errors = array();
	
	if (empty($_POST['FirstName'])) {
		$errors[] = 'First name required.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['FirstName']));
	}
	
	if (empty($_POST['LastName'])) {
		$errors[] = 'Last name required.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['LastName']));
	}
	
	if (empty($_POST['E-mail'])) {
		$errors[] = 'E-mail address required.';
	} else {
		$em = mysqli_real_escape_string($dbc, trim($_POST['E-mail']));
	}
	
	if (!empty($_POST['Password?'])) {
		if ($_POST['Password?'] != $_POST['?Password?']) {
			$errors[] = 'Passwords do not match.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['Password?']));
		}
	} else {
		$errors[] = 'Password required.';
	}
	
	if (empty($_POST['Address'])) {
		$errors[] = 'Address required.';
	}	else {
		$a = mysqli_real_escape_string($dbc, trim($_POST['Address']));
	}
	
	if (empty($_POST['City'])) {
		$errors[] = 'City name required.';
	} else {
		$cy = mysqli_real_escape_string($dbc, trim($_POST['City']));
	}
	
	if (empty($_POST['State'])) {
		$errors[] = 'State abbreviation required.';
	} else {
		$st = mysqli_real_escape_string($dbc, trim($_POST['State']));
	}
	
	if (empty($_POST['Zip'])) {
		$errors[] = 'Zip code required.';
	} else {
		$zp = mysqli_real_escape_string($dbc, trim($_POST['Zip']));
	}
	
	if (empty($_POST['Phone'])) {
		$errors[] = 'Phone number required.';
	} else {
		$ph = mysqli_real_escape_string($dbc, trim($_POST['Phone']));
	}
	
	if (empty($errors))
	{
		$q = "INSERT INTO customers (email, password, lastName, firstName, address, city, state, zipCode, phoneNumber) 
		VALUES ('$em', SHA1('$p'), '$ln', '$fn', '$a', '$cy', '$st', '$zp', '$ph')";		
		$r = @mysqli_query ($dbc, $q);
		if ($r) 
		{ 
			echo '<div id = "content">';
			echo '<h1>Thank you!</h1>
			<p>You are now registered. </p><p><br /></p>';	
			echo '</div>';
		
		}
		else 
		{
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		}
		
	}
	else
	{
		echo '<div id = "content">';
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) 
		{ 
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		echo '</div>';
	}
}
?>
<div id = "content">
	<form action = "signUp.php" method = "post">
	<fieldset>
		<table>
			<tr>
				<td align="left">First Name:</td>
				<td align="right"><input type = "text" name = "FirstName" value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">Last Name:</td>
				<td align="right"><input type = "text" name = "LastName" value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">E-Mail Address:</td>
				<td align="right"><input type="text" name="E-mail" value="<?php echo isset($_POST["E-mail"]) ? $_POST["E-mail"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">New Password:</td>
				<td align="right"><input type="password" name="Password?" /></td>
			</tr>
			<tr>
				<td align="left">Re-enter Password:</td>
				<td align="right"><input type="password" name="?Password?" /></td>
			</tr>
			<tr>
				<td align="left">City:</td>
				<td align="right"><input type="text" name="City" value="<?php echo isset($_POST["City"]) ? $_POST["City"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">State:</td>
				<td align="right"><input type="text" name="State" value="<?php echo isset($_POST["State"]) ? $_POST["State"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">Zip Code:</td>
				<td align="right"><input type="text" name="Zip" value="<?php echo isset($_POST["Zip"]) ? $_POST["Zip"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">Address:</td>
				<td align="right"><input type="text" name="Address" value="<?php echo isset($_POST["Address"]) ? $_POST["Address"] : ''; ?>"/></td>
			</tr>
			<tr>
				<td align="left">Phone Number:</td>
				<td align="right"><input type="text" name="Phone" value="<?php echo isset($_POST["Phone"]) ? $_POST["Phone"] : ''; ?>"/></td>
			</tr>
		</table>
	</fieldset>
			<p><input type = "submit" value = "Sign up!"/></p>
	</form>
</div>
<?php
include('includes/Footer.html');
?>
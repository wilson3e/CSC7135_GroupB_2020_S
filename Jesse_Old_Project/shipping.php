<?php
include('includes/Header.html');
echo '<div id = "content">';
if (!isset($_SESSION['customerId'])) {
	require_once ('./loginFunctions.php');
	$url = absolute_url("signIn.php");
	header("Location: $url");
	exit();	
}
$page_title = 'Shipping';
$id = $_SESSION['customerId'];
require_once ('./mysqli_connect.php');
if (isset($_POST['submitted'])) 
{
	$errors = array();

	if (empty($_POST['name'])) 
	{
		$errors['name'] = 'You forgot to enter your name.';
	} 
	else 
	{
		$n = mysqli_real_escape_string($dbc, trim($_POST['name']));
	}

	if (empty($_POST['address'])) 
	{
		$errors['address'] = 'You forgot to enter your address.';
	} 
	else 
	{
		$address = mysqli_real_escape_string($dbc, trim($_POST['address']));
	}

	if (empty($_POST['city'])) 
	{
		$errors['city'] = 'You forgot to enter your city.';
	} 
	else 
	{
		$city = mysqli_real_escape_string($dbc, trim($_POST['city']));
	}
	
	$state=$_POST['state'];
	
	if (empty($_POST['zip'])) 
	{
		$errors['zip'] = 'You forgot to enter your zip code.';
	} 
	else 
	{
		$zip = mysqli_real_escape_string($dbc, trim($_POST['zip']));
		if(!preg_match('/^(\d{5})$/',$zip))
		{
		       $errors['zip'] = 'Invalid zip code.';
		}
	}

	if (empty($errors)) 
	{
          header("Location:confirmation.php?");
          exit();
    }
}
?>

<form action = "shipping.php" method = "post">
<table border = "2" cellpadding = "0">
	<tr>
		<th>Name</th>
		<td align = "right"><input type = "text" name = "name" /></td>
	</tr>
	<tr>
		<th>Street Address</th>
		<td align = "right"><input type = "text" name = "address" /></td>
	</tr>
	<tr>
		<th>City</th>
		<td align = "right"><input type = "text" name = "city" /></td>
	</tr>
	<tr>
		<th>State</th>
		<td align = "right"><select name = "state"><option>Select State</option>
		<option value="AL">AL</option>
		<option value="AK">AK</option>
		<option value="AZ">AZ</option>
		<option value="AR">AR</option>
		<option value="CA">CA</option>
		<option value="CO">CO</option>
		<option value="CT">CT</option>
		<option value="DE">DE</option>
		<option value="DC">DC</option>
		<option value="FL">FL</option>
		<option value="GA">GA</option>
		<option value="HI">HI</option>
		<option value="ID">ID</option>
		<option value="IL">IL</option>
		<option value="IN">IN</option>
		<option value="IA">IA</option>
		<option value="KS">KS</option>
		<option value="KY">KY</option>
		<option value="LA">LA</option>
		<option value="ME">ME</option>
		<option value="MD">MD</option>
		<option value="MA">MA</option>
		<option value="MI">MI</option>
		<option value="MN">MN</option>
		<option value="MS">MS</option>
		<option value="MO">MO</option>
		<option value="MT">MT</option>
		<option value="NE">NE</option>
		<option value="NV">NV</option>
		<option value="NH">NH</option>
		<option value="NJ">NJ</option>
		<option value="NM">NM</option>
		<option value="NY">NY</option>
		<option value="NC">NC</option>
		<option value="ND">ND</option>
		<option value="OH">OH</option>
		<option value="OK">OK</option>
		<option value="OR">OR</option>
		<option value="PA">PA</option>
		<option value="RI">RI</option>
		<option value="SC">SC</option>
		<option value="SD">SD</option>
		<option value="TN">TN</option>
		<option value="TX">TX</option>
		<option value="UT">UT</option>
		<option value="VT">VT</option>
		<option value="VA">VA</option>
		<option value="WA">WA</option>
		<option value="WV">WV</option>
		<option value="WI">WI</option>
		<option value="WY">WY</option>
		</td>
	</tr>
	<tr>
		<th>Zip Code</th>
		<td align = "right"><input type = "text" name = "zip" /></td>
	</tr>
</table>
	<p><input type = "submit" value = "Go!" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
	if(!empty($errors['zip']))
		echo "Please enter your zip! <br />";
	if(!empty($errors['state']))
		echo "Please select a state!<br />";
	if(!empty($errors['city']))
		echo "Please enter a city!<br />";
	if(!empty($errors['address']))
		echo "Please enter an address!<br />";
	if(!empty($errors['name']))
		echo "Please enter a name!<br />";
?>
</div>

<?php
	include('includes/Footer.html');
?>

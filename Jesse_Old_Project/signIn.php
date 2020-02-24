<?php

include('includes/Header.html');
echo '<div id = "content">';

if (isset($_POST['submitted'])) 
	{
		require_once ('./loginFunctions.php');
		require_once ('./mysqli_connect.php');
			
		list ($check, $data) = check_login($dbc, $_POST['E-mail'], $_POST['Password']);
		
		if ($check) 
		{
			session_start();
			
			$_SESSION['customerId']=$data['customerId'];
			$_SESSION['firstName']=$data['firstName'];
			
			$url = absolute_url ('viewCart.php');
			header("Location: $url");
			exit();
		} 
		else 
		{
			$errors = $data;
			foreach ($errors as $msg) 
			{ 
				echo " $msg<br />\n";
			}
		}
		mysqli_close($dbc);
	}
?>

<form action = "signIn.php" method = "post">
<div id = "form">
	<fieldset>
	<table>
		<tr>
			<td align = "left">E-mail:</td>
			<td align = "right"><input type = "text" name = "E-mail"/></td>
		</tr>
		<tr>
			<td align = "left">Password:</td>
			<td align = "right"><input type = "password" name = "Password"/></td>
		</tr>
	</table>
	</fieldset>
</div>
	<p><input type = "submit" value = "Sign In" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
</div>
<?php

include('includes/Footer.html');

?>
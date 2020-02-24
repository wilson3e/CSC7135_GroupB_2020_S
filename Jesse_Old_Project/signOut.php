<?php

include ('includes/Header.html');
echo '<div id = "content">';

if (!isset($_COOKIE['PHPSESSID']))
{
	require_once('./loginFunctions.php');
	$url = absolute_url('signIn.php');
	header("Location: $url");
}
else
{
	$_SESSION = array();
	session_destroy();
	setcookie('PHPSESSID', '', 0, '/', '', 0, 0);
	echo "<p>You have signed out.</p>";
}

echo '</div>';
include ('includes/Footer.html');
?>
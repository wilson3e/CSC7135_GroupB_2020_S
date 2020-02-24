<?php
	include('includes/Header.html');
	echo '<div id = "content">';
	
	if (!isset($_SESSION['customerId'])) 
	{
		require_once ('./loginFunctions.php');
		$url = absolute_url("signIn.php");
		header("Location: $url");
		exit();	
	}
	
	$id=$_SESSION['customerId'];

	require_once ('./mysqli_connect.php');
	$q = "Insert into invoice (customerId,time) values ($id,NOW())";
	$r = @mysqli_query ($dbc, $q);

	$od=@mysqli_insert_id($dbc);

	$q = "SELECT * FROM customers where customerId = $id";		
	$r = @mysqli_query ($dbc, $q);
	echo "<td>";
	
	$num = @mysqli_num_rows($r);
	$body="You have ordered the following\n";
	if ($num == 1)
	{
	   if (!empty($_SESSION['cart']))
	    {
		  foreach($_SESSION['cart'] as $pid=>$value)
		    {
			   $qty= $value['quantity'];
			   $qp = "Select * from product where productId='$pid'";
			   $rp = @mysqli_query ($dbc, $qp);
			   $rowp = mysqli_fetch_array($rp, MYSQLI_ASSOC);
			   $p = $rowp['price'];
			   
			   $q = "INSERT INTO orderitems (invoiceNumber,productId,quantity,price) VALUES ($od, $pid, $qty, $p)";
			   $ri = @mysqli_query ($dbc, $q);
			   if (!$ri)
					echo "Insertion failed!";
		    }
				echo 'Thank you for your patronage!<br>';
			mysqli_free_result ($r);
		}
		else
		{
			echo "Your cart is empty!";
		}
	}
	else
	{
		echo "Whoops! Something went wrong!";
	}
	echo '</td>';
	echo '</div>';
	include('includes/Footer.html');
?>
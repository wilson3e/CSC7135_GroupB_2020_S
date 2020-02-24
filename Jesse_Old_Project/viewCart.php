<?php
include('includes/Header.html');

echo '<div id = "content">';
echo '<td>';

if (isset($_POST['submitted'])) {
	foreach ($_POST['qty'] as $k => $v) {
		$pid = (int) $k;
		$qty = (int) $v;
		
		if ( $qty == 0 ) 
		{
			unset ($_SESSION['cart'][$pid]);
		} 
		elseif ( $qty > 0 ) 
		{
			$_SESSION['cart'][$pid]['quantity'] = $qty;
		}		
	} 
}

if (!empty($_SESSION['cart'])) 
{
   require_once('./mysqli_connect.php');
   $q="SELECT * FROM product where productId IN (";
   foreach($_SESSION['cart'] as $pid=>$value){
       $q .=$pid.',';
   }
   $q=substr($q,0,-1).')';
   $r=mysqli_query($dbc,$q);

   echo '<form action="viewCart.php" method="post">
     <table border="1" align="center">
     <tr>
     	<td align="left" width="15%"><b>Name</b></td>
		<td align="left" width="40%"><b>Description</b></td>
		<td align="right" width="15%"><b>Price per Pound</b></td>
		<td align="center" width="15%"><b>Qty</b></td>
		<td align="right" width="15%"><b>Total Price</b></td>
	  </tr>
     ';

	$total = 0;
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) 
	{
		$subtotal = $_SESSION['cart'][$row['productId']]['quantity'] * $row['price'];
		$total += $subtotal;
		
		echo "\t<tr>
		<td align=\"left\">{$row['name']}</td>
		<td align=\"left\">{$row['description']}</td>
		<td align=\"right\">\${$row['price']}</td>
		<td align=\"center\"><input type=\"text\" size=\"3\" 
		name=\"qty[{$row['productId']}]\" value=\"{$_SESSION['cart'][$row['productId']]['quantity']}\" /></td>
		<td align=\"right\">$" . number_format ($subtotal, 2) . "</td>
   	</tr>\n";
	
	}
	
	mysqli_close($dbc);

	echo '<tr>
		<td colspan="4" align="right"><b>Total:</b></td>
		<td align="right">$' . number_format ($total, 2) . '</td>
	</tr>
	</table>
	<div align="center"><input type="submit" name="submit" value="Update My Cart" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
	</form><p align="center">Enter a quantity of 0 to remove an item.
	<br/><br/><a href="shipping.php">Checkout</a></p>';
} 
else 
{
	echo '<p>Your cart is currently empty.</p>';
}
 echo '</td>';
 echo '</div>';
include('includes/Footer.html');
?>
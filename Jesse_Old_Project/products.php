<?php

include('includes/Header.html');
require_once ('./mysqli_connect.php');
?>

<?php
	echo '<div id = "content">';
	$q = 'Select productId,name,description,imageFile,price from product';
	$r = @mysqli_query ($dbc, $q);
	
	echo '<table align = "center" border = "0" >';
	$count = 0;
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		if($count==0)
			echo '<tr>';
		$count=(++$count)%2;
        echo '<td align="left"><a href="details.php?pid='.$row['productId'].'"><img src="images/'.$row['imageFile'].'" width="50" hight="50"/></a></td><td>$'.$row['price'].'</td>
        <td align="left"><a href="details.php?pid=' . $row['productId'].'"> ' . $row['name'] . '</a></td>
		<td align="left"><a href="addCart.php?pid=' . $row['productId'] .'"><img src="images/buy.png" /></a></td>';
        if($count==0)
			echo '</tr>';     
	}
	echo '</table>';
	echo '</div>';
?>

<?php

include('includes/Footer.html');

?>
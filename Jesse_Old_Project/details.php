<?php

include('includes/Header.html');
require_once('./mysqli_connect.php');

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) 
{
	$pid = $_GET['pid'];
} 
$q = "SELECT * FROM product where productId=$pid";
$r = @mysqli_query ($dbc, $q);

$num = mysqli_num_rows($r);

$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
echo '<div align = "center">';
echo '<a href = "addCart.php?pid=' . $row['productId'].'"><img src = "images/buy.png"></a>';
echo '</div>';
echo '<div id = "content">';
echo '<table><tr>';
echo '<td align = "left" rowspan = "3"><img src = "images/'.$row['imageFile'].'" width = 200 height = "200"/></td>';
echo '<td>'.$row['description'].'</td></tr><tr>';
echo '<td>$'.$row['price'].' dollars per pound'.'</td>';
echo '</tr></table>';
echo '</div>';
echo '<div align = "center">';
echo '<a href = "addCart.php?pid=' . $row['productId'].'"><img src = "images/buy.png"></a>';
echo '</div>';
?>

<?php

include('includes/Footer.html');

?>
<?php
include('includes/Header.html');
echo '<div id = "content">';
if(isset($_GET['pid']) && is_numeric($_GET['pid']))
{
   $pid=(int)$_GET['pid'];
   if(isset($_SESSION['cart'][$pid]))
   {
       $_SESSION['cart'][$pid]['quantity']++;
   }
   else
   {
       $_SESSION['cart'][$pid]['quantity']=1;
   }
echo "<td>The item is added to your cart! <br></td>";
echo '</div>';
echo '<div align = "center">';
echo '<form action = "products.php">';
echo '<input type = "submit" value = "Back to products" />';
echo '</form>';
echo '</div>';
}
else{
echo "<td>Not a valid item!</td>";
}
include ('includes/footer.html');
include('includes/Footer.html');
?>
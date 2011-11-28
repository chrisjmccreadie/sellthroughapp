<html>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js?ver=3.1.2'></script>
<script type="text/javascript">
function updatesell()
{
    
alert("yay");
}
</script>
<body>
<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$customer = $_GET["rcode"];
//echo $customer;
$query="SELECT * FROM `sellthrough2` where rcode = '$customer'  group by style, name  order by name ";
$result=mysql_query($query);
$num=mysql_numrows($result);

$i=0;
echo "<table>";
echo "<tr><td>Style</td><td>Quantity</td><td>Colour</td><td>Price</td><td>Number Sold</td></tr>";
while ($i < $num) {
    if (mysql_result($result,$i,"quantity") != '0')
    {
        $id = mysql_result($result,$i,"id");
        echo "<tr>";
    
        echo "<td>".mysql_result($result,$i,"style")."</td><td>".mysql_result($result,$i,"quantity")."</td><td>".mysql_result($result,$i,"colour")."</td><td>".mysql_result($result,$i,"price")."</td><td><input type='text' name='$id' id='$id' /></td>";
        echo "</tr>";
    }
    $i++;
}
echo "</table>";
echo '<input type="submit" value="Submit" onclick="updatesell()"/>';
mysql_close();

?>
</body>
</html>
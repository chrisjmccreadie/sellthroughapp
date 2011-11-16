<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$customer = $_GET["customer"];
echo $customer."ff";
$query="SELECT * FROM `sellthrough` where name = '$customer'  group by style, name  order by name ";
$result=mysql_query($query);
$num=mysql_numrows($result);

$i=0;
echo "<table>";
echo "<tr><td>Style</td><td>Fabric</td><td>Desc</td><td>Colour</td><td>WSP</td><td>Number Sold</td></tr>";
while ($i < $num) {
    echo "<tr>";
    
    echo "<td>".mysql_result($result,$i,"style")."</td><td>".mysql_result($result,$i,"fabric")."</td><td>".mysql_result($result,$i,"desc")."</td><td>".mysql_result($result,$i,"colour")."</td><td>".mysql_result($result,$i,"wholesaleprice")."</td><td><input type='text' name='num$i' /></td>";
    echo "</tr>";
    $i++;
}
echo "</table>";
mysql_close();

?>

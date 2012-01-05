<html>
<body>
<form name="form1" id="form1" action="updatecustomersold.php" method="POST">
<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$customer = $_GET["name"];
//echo $customer;
$query="SELECT * FROM `sellthrough2` where name = '$customer' ";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
echo "<table>";
echo "<tr><td>Style</td><td>Colour</td><td>Size</td><td>Price</td><td>Number Sold</td><td>Number Bought</td></tr>";
while ($i < $num) {
    if (mysql_result($result,$i,"quantity") != '0')
    {
        
             $sold = mysql_result($result,$i,"sold");
    $rsold = mysql_result($result,$i,"rsold");
 //echo $rsold;
 if ($sold == 0)
        $sold = $rsold;

        $id = mysql_result($result,$i,"id");
        echo "<tr>";
        echo "<td>"
        .mysql_result($result,$i,"style").
        "</td><td>"
        .mysql_result($result,$i,"colour").
        "</td><td>"
        .mysql_result($result,$i,"size").
        "</td><td>"
        .mysql_result($result,$i,"price").
        "</td><td >$sold</td>".
         "</td><td>"
        .mysql_result($result,$i,"quantity")."</td>";
        echo "</tr>";
    }
    $i++;
}
echo "</table>";
echo '<input type="submit" value="Submit"/>';
mysql_close();
?>
</form>
</body>
</html>
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
$query="SELECT * FROM `sellthrough2` where name = '$customer'  order by style";
$result=mysql_query($query);
$num=mysql_numrows($result);
echo mysql_error();
exit;
$i=0;

echo '<input type="submit" value="Submit"/>';
mysql_close();
?>
</form>
</body>
</html>
<?php
print_r($_POST);


foreach ($_POST as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
exit;
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$customer = $_GET["rcode"];
//echo $customer;
//$query="SELECT * FROM `sellthrough2` where rcode = '$customer'  group by style, name  order by name ";
//$result=mysql_query($query);
echo "done";
?>
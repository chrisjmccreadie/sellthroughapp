<?php
//fecth a list of urls mysql_connect(localhost,$username,$password);
$rcode = rand(0,11111111);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//print_r($_POST);
foreach ($_POST as $k => $v) {
    $query="INSERT INTO `sellthroughapp`.`sale` (`id`, `sellid`, `quantity`, `dateadded`,`rcode`) VALUES (NULL, '$k', '$v', CURRENT_TIMESTAMP,'$rcode')";
    $result=mysql_query($query);
    //update they have been added
}
echo "Thank you";

?>
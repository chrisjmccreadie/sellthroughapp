<?php
//fecth a list of urls mysql_connect(localhost,$username,$password);
//echo "kk".$_GET['data'];

$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//print_r($_POST);
foreach ($_POST as $k => $v) {
    echo "$k : $v";
    $query="update `sellthroughapp`.`sellthrough2` set `quantity` ='$v' where id = '$k'";
    $result=mysql_query($query);
    echo mysql_error();
    //update they have been added
}
echo "Thank you";

?>
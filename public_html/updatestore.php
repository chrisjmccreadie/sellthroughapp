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
 
    //check if it exists
    $query0 = "select * from `sellthroughapp`.postsale where id = '$k'";
    $result0 = mysql_query($query0);
    $num=mysql_numrows($result0);
    if ($num > 0)
      $query="update `sellthroughapp`.`postsale` set `per` ='$v' where id = '$k'";
    else
         $query="INSERT INTO  `sellthroughapp`.`postsale` (`sellthroughid` ,`per`)VALUES (NULL ,  '',  '')";
    $result=mysql_query($query);
    echo mysql_error();

    //update they have been added
}
  //  header('Location: storebreakdown.php');

echo "Thank you";

?>
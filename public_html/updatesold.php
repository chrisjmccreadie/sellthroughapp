<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$query="SELECT * FROM `sale`";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
        $sellid = mysql_result($result2,$i,"sellid");
        $sold = mysql_result($result2,$i,"quantity");
        echo "$sellid : $sold</br>";
 $i++;   
}


?>
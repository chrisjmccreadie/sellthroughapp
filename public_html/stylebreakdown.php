<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$query="SELECT style, country, COUNT( country ) AS ccount
FROM  `sellthrough2` 
GROUP BY style";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i = 0;
while ($i < $num)
{
    echo mysql_result($result,$i,"style");
     echo mysql_result($result,$i,"country");
      echo mysql_result($result,$i,"count");
    echo "<br/>";
    $i++;
//count
}




?>
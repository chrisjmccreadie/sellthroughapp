<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 


//clear the rsold
$query ="UPDATE  `sellthroughapp`.`sellthrough2` SET  `rsold` =  '0'";
$result=mysql_query($query);

$query="SELECT * FROM `sale`  order by sellid";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
while ($i < $num)
{
       $sellid = mysql_result($result,$i,"sellid");
       $sold = mysql_result($result,$i,"quantity");
       $query2="SELECT * FROM `sellthrough2` where id = '$sellid' ";
       $result2=mysql_query($query2);
       $sold2 = mysql_result($result2,0,"quantity");
       //$sold2 = 2;
       echo "$sellid : $sold : $sold2</br>";
      $sold2 = $sold+$sold2;
      $query3 ="UPDATE  `sellthroughapp`.`sellthrough2` SET  `rsold` =  '$sold2' where id = '$sellid'";
$result3=mysql_query($query3);

      $i++;   
}
?>
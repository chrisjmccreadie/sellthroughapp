<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$query="SELECT * FROM `sellthrough2`  where rcode = 0 group by  name ";
$result=mysql_query($query);
echo mysql_error();
$num=mysql_numrows($result);
while ($i < $num) {
    $n = rand(0, 10000000);
    if (!in_array($n, $rn)) {
        $rn[] = $n;
        $url = "http://sellthroughapp.fluxflex.com/sellthrough.php?rcode="+$n;
        //update the database
        $name = mysql_result($result,$i,"name");
        $name = str_replace("'","''",$name);
        echo $name."</br>";
        $query2="update  `sellthrough` set rcode ='$n',url='$url' where name = '".$name."'";
        $result2=mysql_query($query2);
        echo mysql_error();
        $i++;
    }
}
echo "done";

?>
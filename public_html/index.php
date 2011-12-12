<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$query="SELECT * FROM `sellthrough2` group by  name order by name";
$result=mysql_query($query);
$num=mysql_numrows($result);


$i=0;
echo "Customers</br>";
echo "<table>";
echo "<tr><td>Customer Name</td><td>URL</td><td>Complete</td><td>Name</td><td>Email Address</td><td>Action</td></tr>";

while ($i < $num) {
    echo "<tr>";
    $email  = mysql_result($result,$i,"email");
    if (mysql_result($result,$i,"added") == 0)
        $complete = "No";
    else
        $complete = "Yes";
   echo "<td>".mysql_result($result,$i,"name")."</td><td><a href='sellthrough.php?rcode=".mysql_result($result,$i,"rcode")."'>URL</a></td><td>$complete</td><td><input type='text' name='name' /></td><td><input type='text' name='email' value='$email' /></td><td><a href='editcustomer.php?id=".mysql_result($result,$i,"name")."'>Edit Bought </a><input type='submit' value='Submit' />
</td>";
     

echo "</tr>";
    $i++;
}
echo "</table>";
mysql_close();

?>

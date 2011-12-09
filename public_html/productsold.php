<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 
$query="SELECT sellthrough2.name,sellthrough2.style,sellthrough2.size,sellthrough2.price,sellthrough2.quantity as bought, sale.quantity as sold FROM sale LEFT JOIN sellthrough2
       ON (sale.sellid = sellthrough2.id)";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i = 0;
$out =  "<table>";
$out = $out. "<tr><td>Name</td><td>Style</td><td>Size</td><td>Price</td><td>Bought</td><td>Sold</td><tr>";
while ($i < $num)
{
    $out = $out. "<tr><td>";
    $out = $out. mysql_result($result,$i,"name")."</td>";
    $out = $out."<td>".mysql_result($result,$i,"style")."</td>";
    $out = $out."<td>". mysql_result($result,$i,"size")."</td>";
        $out = $out."<td>". mysql_result($result,$i,"price")."</td>";
        $out = $out."<td>". mysql_result($result,$i,"bought")."</td>";
            $out = $out."<td>". mysql_result($result,$i,"sold")."</td>";
    $out = $out. "<td></tr>";
    $i++;
//count

}
echo $out;




?>
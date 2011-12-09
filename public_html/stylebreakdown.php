<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 


$query = "select country from sellthrough2 group by country";
$result=mysql_query($query);
$num=mysql_numrows($result);

$out =  "<table><tr>";

$country = array();
while ($i < $num)
{
        $country[mysql_result($result,$i,"country")];
        $out = $out."<th>".mysql_result($result,$i,"country")."</th>";
        $out = $out."<th>%</th>";
    $i++;   
}
print_r($country);

//new query
$query="SELECT style, country, COUNT( country) AS ccount
FROM  `sellthrough2` 
GROUP BY country,style
ORDER BY style,country
";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i = 0;
$out = $out. "<tr><td>Style</td><td>Country<td/><td>Count</td></tr>";
while ($i < $num)
{
    $out = $out. "<tr><td>";
    $out = $out. mysql_result($result,$i,"style")."</td>";
    $out = $out."<td>".mysql_result($result,$i,"country")."</td>";
    $out = $out."<td>". mysql_result($result,$i,"ccount")."</td>";
    $out = $out. "<td></tr>";
    $i++;
//count
}
echo $out."</table>";




?>
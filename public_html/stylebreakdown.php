<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>


<script type="text/javascript" language="javascript" src="http://www.datatables.net/release-datatables/media/js/jquery.js"></script>
    	<script type="text/javascript" language="javascript" src="http://www.datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
</head>
<body>
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

$out =  '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"><thead>';

$country = array();
$i = 0;
$out = $out."<tr><th>Name</th>";
while ($i < $num)
{
  //  echo  mysql_result($result,$i,"country")."</br>";
        $country[$i]["name"] = mysql_result($result,$i,"country");
        $country[$i]["count"] = 0;

        $out = $out."<th>".mysql_result($result,$i,"country")."</th>";
        $out = $out."<th>%</th>";
    $i++;   
}
$out = $out."</tr></thead><tbody>";
//echo "wah ";
//print_r($country);


$query="SELECT style, country, COUNT( country) AS ccount
FROM  `sellthrough2` 
GROUP BY country,style
ORDER BY style,country
";

$result=mysql_query($query);
$num=mysql_numrows($result);
echo "$num";
$i = 0;
$style = "";
while ($i < $num)
{
    if ($style !=  mysql_result($result,$i,"style"))
    {
        if ($style != "")
        {
            //reset the vars
            $out = $out."<tr class=\"odd gradeX\"><td>$style</td>";
            
            foreach($country as $item )
            {
                $per = 0;
                $out = $out."<td>".$item["count"]."</td>";
                $out = $out."<td>".$per."</td>";
                
                $item["count"] = 0;   
            }
            $out = $out."</tr>";
            
        }
        switch (mysql_result($result,$i,"country")) 
    {
        case "AUSTRALIA":
            $country[0]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "AUSTRIA":
            $country[1]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "AZERBAIJAN":
            $country[2]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "BELGIUM":
            $country[3]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "CANADA":
            $country[4]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "CHINA":
            $country[5]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "CYPRUS":
            $country[6]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "FRANCE":
            $country[7]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "GERMANY":
            $country[8]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "GREECE":
            $country[9]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "HONG KONG":
            $country[10]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "ICELAND":
            $country[11]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "IRELAND":
            $country[12]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "ITALY":
            $country[13]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "JAPAN":
            $country[14]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "KOREA":
            $country[15]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "KUWAIT":
            $country[16]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "MONACO":
            $country[17]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "NETHERLANDS":
            $country[18]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "PORTUGAL":
            $country[19]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "RUSSIA":
            $country[20]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "SAUDI ARABIA":
            $country[21]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "SINGAPORE":
            $country[22]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "SOUTH AFRICA":
            $country[23]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "SPAIN":
            $country[24]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "ST. BARTHELEMY":
            $country[25]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "SWITZERLAND":
            $country[26]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "TURKEY":
            $country[27]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "UKRAINE":
            $country[28]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "UNITED ARAB EMIRATES":
            $country[29]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "UNITED KINGDOM":
            $country[30]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "USA":
            $country[31]["count"] = mysql_result($result,$i,"ccount");
            break;
    }
        //copy the style 
        $style = mysql_result($result,$i,"style")   ;         
    }
    $i++;
}
echo $out."</tbody></table>";
?>
</body>
</html>
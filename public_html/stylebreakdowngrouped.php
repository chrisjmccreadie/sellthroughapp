<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>

<style type="text/css" title="currentStyle">
            @import "http://www.datatables.net/release-datatables/media/css/demo_page.css"; @import "http://www.datatables.net/release-datatables/media/css/header.ccss";
    		@import "http://www.datatables.net/release-datatables/media/css/demo_table.css";
		</style>
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
$out = $out."<th>Total</th></tr></thead><tbody>";
//echo "wah ";
//print_r($country);


$query="SELECT sellthrough2.style, sellthrough2.country, COUNT( sellthrough2.country ) AS ccount, style.name
FROM  `sellthrough2` 
LEFT JOIN style ON sellthrough2.styleid = style.id
GROUP BY sellthrough2.style, sellthrough2.country, sellthrough2.styleid
ORDER BY sellthrough2.style, sellthrough2.country, sellthrough2.styleid
";

$result=mysql_query($query);
$num=mysql_numrows($result);
//echo "$num";
$i = 0;
$style = "";
while ($i <= $num)
{
    if ($style !=  mysql_result($result,$i,"name"))
    {
        if ($style != "")
        {
            //reset the vars
            $out = $out."<tr class=\"odd gradeX\"><td>$style</td>";
            $total = 0;
            foreach($country as $item )
            {
                $total = $total+$item["count"]  ;
            }
            foreach($country as $item )
            {
                $per = 0;
                $out = $out."<td>".$item["count"]."</td>";
                $per = $item["count"] /$total * 100;
                $per = number_format($per,0);
                $out = $out."<td>".$per."%</td>";
                $item["count"] = 0;   
            }
            $out = $out."<td>$total</td></tr>";
            
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
        $style = mysql_result($result,$i,"name")   ;         
    }
    $i++;
}
echo $out."</tbody></table>";
?>
</body>
</html>
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
$country = array();
$query = "select country from sellthrough2 group by country";
$result=mysql_query($query);
$num=mysql_numrows($result);
$out =  '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"><thead>';
$i = 0;
$out = $out."<tr><th>Name</th>";
while ($i < $num)
{
      $country[$i]["name"] = mysql_result($result,$i,"country");
        $country[$i]["count"] = 0;
        $out = $out."<th>".mysql_result($result,$i,"country")."</th>";
        $out = $out."<th>%</th>";
    $i++;   
}
$out = $out."<th>Total</th></tr></thead><tbody>";


$query="SELECT * from style";
$result=mysql_query($query);
$num=mysql_numrows($result);
echo mysql_error();
$i = 0;
//print_r($country);
while ($i < $num)
{
    $name=  mysql_result($result,$i,"name");
    $styleid=  mysql_result($result,$i,"id");
    $query2 = "SELECT country,count(rsold) as rsold,count(sold) as sold FROM `sellthrough2` WHERE `styleid` = '$styleid' group by country";
    echo $query2."</br>";
    $result2=mysql_query($query2);
    $num2=mysql_numrows($result2);
    echo $num2;
    echo mysql_error();
    $i2 = 0;
    while ($i2 < $num2)
    {
         $ccount = 0;
       //  $ccount=  mysql_result($result2,$i2,"ccount");
          $countryo=  mysql_result($result2,$i2,"country");
          //switch
          $sold = mysql_result($result2,$i2,"sold"); 
          $rsold=  mysql_result($result2,$i2,"rsold");
        //echo $rsold;
         if ( $sold == 0)
              $ccount = $rsold;
         else
             $ccount = $sold;
         
          $i2 =  $i2+1;       
       switch ($countryo) 
        {
        case "AUSTRALIA":
            $country[0]["count"] = $ccount;
            break;
        case "AUSTRIA":
            $country[1]["count"] = $ccount;
            break;
        case "AZERBAIJAN":
            $country[2]["count"] = $ccount;
            break;
        case "BELGIUM":
            $country[3]["count"] = $ccount;
            break;
        case "CANADA":
            $country[4]["count"] = $ccount;
            break;
        case "CHINA":
            $country[5]["count"] = $ccount;
            break;
        case "CYPRUS":
            $country[6]["count"] = $ccount;
            break;
        case "FRANCE":
            $country[7]["count"] = $ccount;
            break;
        case "GERMANY":
            $country[8]["count"] = $ccount;
            break;
        case "GREECE":
            $country[9]["count"] = $ccount;
            break;
        case "HONG KONG":
            $country[10]["count"] = $ccount;
            break;
        case "ICELAND":
            $country[11]["count"] = $ccount;
            break;
        case "IRELAND":
            $country[12]["count"] = $ccount;
            break;
        case "ITALY":
            $country[13]["count"] = $ccount;
            break;
        case "JAPAN":
            $country[14]["count"] = $ccount;
            break;
        case "KOREA":
            $country[15]["count"] = $ccount;
        case "KUWAIT":
            $country[16]["count"] = $ccount;
            break;
        case "MONACO":
            $country[17]["count"] = $ccount;
            break;
        case "NETHERLANDS":
            $country[18]["count"] = $ccount;
            break;
        case "PORTUGAL":
            $country[19]["count"] = $ccount;
            break;
        case "RUSSIA":
            $country[20]["count"] = $ccount;
            break;
        case "SAUDI ARABIA":
            $country[21]["count"] = $ccount;
            break;
        case "SINGAPORE":
            $country[22]["count"] = $ccount;
            break;
        case "SOUTH AFRICA":
            $country[23]["count"] = $ccount;
            break;
        case "SPAIN":
            $country[24]["count"] = $ccount;
            break;
        case "ST. BARTHELEMY":
            $country[25]["count"] = $ccount;
            break;
        case "SWITZERLAND":
            $country[26]["count"] = $ccount;
            break;
        case "TURKEY":
            $country[27]["count"] = $ccount;
            break;
        case "UKRAINE":
            $country[28]["count"] = $ccount;
            break;
        case "UNITED ARAB EMIRATES":
            $country[29]["count"] = $ccount;
            break;
        case "UNITED KINGDOM":
            $country[30]["count"] = $ccount;
            break;
        case "USA":
            $country[31]["count"] = $ccount;
            break;
    }
       
       //  echo "$i2 $countryo : count $ccount , sold : $sold, rsold : $rsold  </br>";
         
         //exit;
    }
    
    foreach($country as $item )
    {
        echo "Country :".$item["country"]." Count ".$item["count"]  ;  
    }
    $i = $i+1;
}

echo $out."</tbody></table>";
?>
</body>
</html>
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
    //echo "$name : $styleid";
      
    //get the countries
//    $query2="SELECT style, country, count(country) as ccount,sum(sold) as sold,sum(rsold) as rsold from sellthrough2 where styleid='$styleid' group by country";
$query2 =" SELECT style, country, sold,rsold from sellthrough2 where styleid='$styleid' ";
 
 //echo $query2;
    $result2=mysql_query($query2);
    $num2=mysql_numrows($result2);
    echo mysql_error();
    $i2 = 0;
    while ($i2 < $num2)
    {
       //  $ccount=  mysql_result($result2,$i2,"ccount");
          $countryo=  mysql_result($result2,$i2,"country");
          //switch
          $ccount = mysql_result($result2,$i2,"sold"); 
          $rsold=  mysql_result($result2,$i2,"rsold");
        //echo $rsold;
         if ( $ccount == 0)
              $ccount = $rsold;   
         
          $i2 =  $i2+1;
          
     
          
            switch ($countryo) 
        {
        case "AUSTRALIA":
           $ccount = $ccount+ $country[0]["count"];
            $country[0]["count"] = $ccount;
            break;
        case "AUSTRIA":
          $ccount = $ccount+ $country[1]["count"];
            $country[1]["count"] = $ccount;
            break;
        case "AZERBAIJAN":
          $ccount = $ccount+ $country[2]["count"];
            $country[2]["count"] = $ccount;
            break;
        case "BELGIUM":
             $ccount = $ccount+ $country[3]["count"];
            $country[3]["count"] = $ccount;
            break;
        case "CANADA":
            $ccount = $ccount+ $country[4]["count"];
            $country[4]["count"] = $ccount;
            break;
        case "CHINA":
           $ccount = $ccount+ $country[5]["count"];
            $country[5]["count"] = $ccount;
            break;
        case "CYPRUS":
            $ccount = $ccount+ $country[6]["count"];
            $country[6]["count"] = $ccount;
            break;
        case "FRANCE":
             $ccount = $ccount+ $country[7]["count"];
            $country[7]["count"] = $ccount;
            break;
        case "GERMANY":
            $ccount = $ccount+ $country[8]["count"];
            $country[8]["count"] = $ccount;
            break;
        case "GREECE":
            $ccount = $ccount+ $country[9]["count"];
            $country[9]["count"] = $ccount;
            break;
        case "HONG KONG":
            $ccount = $ccount+ $country[10]["count"];
            $country[10]["count"] = $ccount;
            break;
        case "ICELAND":
           $ccount = $ccount+ $country[11]["count"];
            $country[11]["count"] = $ccount;
            break;
        case "IRELAND":
            $ccount = $ccount+ $country[12]["count"];
            $country[12]["count"] = $ccount;
            break;
        case "ITALY":
            $ccount = $ccount+ $country[13]["count"];
            $country[13]["count"] = $ccount;
            break;
        case "JAPAN":
            $ccount = $ccount+ $country[14]["count"];
            $country[14]["count"] = $ccount;
            break;
        case "KOREA":
           $ccount = $ccount+ $country[15]["count"];
            $country[15]["count"] = $ccount;
        case "KUWAIT":
            $ccount = $ccount+ $country[16]["count"];
            $country[16]["count"] = $ccount;
            break;
        case "MONACO":
            $ccount = $ccount+ $country[17]["count"];
            $country[17]["count"] = $ccount;
            break;
        case "NETHERLANDS":
          $ccount = $ccount+ $country[18]["count"];
            $country[18]["count"] = $ccount;
            break;
        case "PORTUGAL":
            $ccount = $ccount+ $country[19]["count"];
            $country[19]["count"] = $ccount;
            break;
        case "RUSSIA":
             $ccount = $ccount+ $country[20]["count"];
            $country[20]["count"] = $ccount;
            break;
        case "SAUDI ARABIA":
            $ccount = $ccount+ $country[21]["count"];
            $country[21]["count"] = $ccount;
            break;
        case "SINGAPORE":
            $ccount = $ccount+ $country[22]["count"];
            $country[22]["count"] = $ccount;
            break;
        case "SOUTH AFRICA":
             $ccount = $ccount+ $country[23]["count"];
            $country[23]["count"] = $ccount;
            break;
        case "SPAIN":
            $ccount = $ccount+ $country[24]["count"];
            $country[24]["count"] = $ccount;
            break;
        case "ST. BARTHELEMY":
            $ccount = $ccount+ $country[25]["count"];
            $country[25]["count"] = $ccount;
            break;
        case "SWITZERLAND":
          $ccount = $ccount+ $country[26]["count"];
            $country[26]["count"] = $ccount;
            break;
        case "TURKEY":
          $ccount = $ccount+ $country[27]["count"];
            $country[27]["count"] = $ccount;
            break;
        case "UKRAINE":
           $ccount = $ccount+ $country[28]["count"];
            $country[28]["count"] = $ccount;
            break;
        case "UNITED ARAB EMIRATES":
            $ccount = $ccount+ $country[29]["count"];
            $country[29]["count"] = $ccount;
            break;
        case "UNITED KINGDOM":
            $ccount = $ccount+ $country[30]["count"];
            $country[30]["count"] = $ccount;
            break;
        case "USA":
           $ccount = $ccount+ $country[31]["count"];
            $country[31]["count"] = $ccount;
            break;
    }
 
          
          
    }
    
      $out = $out."<tr class=\"odd gradeX\"><td>$name</td>";
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
    
    
    $i = $i+1;
}

echo $out."</tbody></table>";
?>
</body>
</html>
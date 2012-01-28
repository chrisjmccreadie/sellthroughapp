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
//$query2 =" SELECT style, country, sold,rsold from sellthrough2 where styleid='$styleid' ";
 $query2 = "SELECT count(id),country,count(rsold),count(sold) FROM `sellthrough2` WHERE `styleid` = $styleid group by country";
 echo $query2."</br>";
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
         
        // echo "count $ccount</br>";
          $i2 =  $i2+1;
          
     
          
            switch ($countryo) 
        {
        case "AUSTRALIA":
           $ccount = $country[0]["count"]+1;
            $country[0]["count"] = $ccount;
            break;
        case "AUSTRIA":
          $ccount = $country[1]["count"]+1;
            $country[1]["count"] = $ccount;
            break;
        case "AZERBAIJAN":
          $ccount = $country[2]["count"]+1;
            $country[2]["count"] = $ccount;
            break;
        case "BELGIUM":
             $ccount = $country[3]["count"]+1;
            $country[3]["count"] = $ccount;
            break;
        case "CANADA":
            $ccount = $country[4]["count"]+1;
            $country[4]["count"] = $ccount;
            break;
        case "CHINA":
           $ccount = $country[5]["count"]+1;
            $country[5]["count"] = $ccount;
            break;
        case "CYPRUS":
            $ccount =$country[6]["count"]+1;
            $country[6]["count"] = $ccount;
            break;
        case "FRANCE":
             $ccount = $country[7]["count"]+1;
            $country[7]["count"] = $ccount;
            break;
        case "GERMANY":
            $ccount =  $country[8]["count"]+1;
            $country[8]["count"] = $ccount;
            break;
        case "GREECE":
            $ccount =  $country[9]["count"]+1;
            $country[9]["count"] = $ccount;
            break;
        case "HONG KONG":
            $ccount =  $country[10]["count"]+1;
            $country[10]["count"] = $ccount;
            break;
        case "ICELAND":
            $ccount =  $country[11]["count"]+1;
            $country[11]["count"] = $ccount;
            break;
        case "IRELAND":
            $ccount =  $country[12]["count"]+1;
            $country[12]["count"] = $ccount;
            break;
        case "ITALY":
            $ccount =  $country[13]["count"]+1;
            $country[13]["count"] = $ccount;
            break;
        case "JAPAN":
            $ccount =  $country[14]["count"]+1;
            $country[14]["count"] = $ccount;
            break;
        case "KOREA":
            $ccount =  $country[15]["count"]+1;
            $country[15]["count"] = $ccount;
        case "KUWAIT":
            $ccount =  $country[16]["count"]+1;
            $country[16]["count"] = $ccount;
            break;
        case "MONACO":
            $ccount =  $country[17]["count"]+1;
            $country[17]["count"] = $ccount;
            break;
        case "NETHERLANDS":
            $ccount =  $country[18]["count"]+1;
            $country[18]["count"] = $ccount;
            break;
        case "PORTUGAL":
            $ccount =  $country[19]["count"]+1;
            $country[19]["count"] = $ccount;
            break;
        case "RUSSIA":
            $ccount =  $country[20]["count"]+1;
            $country[20]["count"] = $ccount;
            break;
        case "SAUDI ARABIA":
            $ccount =  $country[21]["count"]+1;
            $country[21]["count"] = $ccount;
            break;
        case "SINGAPORE":
            $ccount =  $country[22]["count"]+1;
            $country[22]["count"] = $ccount;
            break;
        case "SOUTH AFRICA":
            $ccount =  $country[23]["count"]+1;
            $country[23]["count"] = $ccount;
            break;
        case "SPAIN":
            $ccount =  $country[24]["count"]+1;
            $country[24]["count"] = $ccount;
            break;
        case "ST. BARTHELEMY":
            $ccount =  $country[25]["count"]+1;
            $country[25]["count"] = $ccount;
            break;
        case "SWITZERLAND":
            $ccount =  $country[26]["count"]+1;
            $country[26]["count"] = $ccount;
            break;
        case "TURKEY":
            $ccount =  $country[27]["count"]+1;
            $country[27]["count"] = $ccount;
            break;
        case "UKRAINE":
            $ccount =  $country[28]["count"]+1;
            $country[28]["count"] = $ccount;
            break;
        case "UNITED ARAB EMIRATES":
            $ccount =  $country[29]["count"]+1;
            $country[29]["count"] = $ccount;
            break;
        case "UNITED KINGDOM":
            $ccount =  $country[30]["count"]+1;
            $country[30]["count"] = $ccount;
            break;
        case "USA":
            $ccount =  $country[31]["count"]+1;
            $country[31]["count"] = $ccount;
            break;
    }
 
          
          
    }
  //  print_r($country);
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
    
    //clear it
      foreach($country as $item )
      {
            $item["count"]  =0 ;
      }
    
    $i = $i+1;
}

echo $out."</tbody></table>";
?>
</body>
</html>
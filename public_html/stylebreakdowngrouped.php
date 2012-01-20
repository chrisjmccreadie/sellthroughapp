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


$query="SELECT * from style";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i = 0;
while ($i <= $num)
{
    $name=  mysql_result($result,$i,"name");
    $styleid=  mysql_result($result,$i,"id");
   
    //get the countries
    $query2="SELECT style, country from sellthrough2 where styleid='$styleid'";
    $result2=mysql_query($query2);
    $num2=mysql_numrows($result2);
    $i2 = 0;
    $aus = 0;
    $aust = 0;
    $aze = 0;
    $bel = 0;
    $can = 0;
    $chi = 0;
    $cyp = 0;
    $fra = 0;
    $ger = 0;
    $gre = 0;
    $hon = 0;
    $ice = 0;
    $ire = 0;
    $ita = 0;
    $jap = 0;
    $kor = 0;
    $kuw = 0;
    $mon = 0;
    $net = 0;
    $por = 0;
    $rus = 0;
    $sau = 0;
    $sin = 0;
    $sou = 0;
    $spa = 0;
    $st = 0;
    $swi = 0;
    $tur = 0;
    $ukr = 0;
    $ua=0;
    $us = 0;
    $uk = 0;
    $us = 0;
    while ($i2 <= $num2)
    {
        $country = mysql_result($result2,$i2,"country");
        $i2++;
        
switch ($country) 
    {
        case "AUSTRALIA":
            $aus++;
            break;
        case "AUSTRIA":
           $aust++;
            break;
        case "AZERBAIJAN":
           $aze++;
            break;
        case "BELGIUM":
            $bel++;
            break;
        case "CANADA":
            $can++;
            break;
        case "CHINA":
           $chi++;
            break;
        case "CYPRUS":
           $cyp++;
            break;
        case "FRANCE":
            $fra++;
            break;
        case "GERMANY":
         $ger++;
            break;
        case "GREECE":
           $gre++;
            break;
        case "HONG KONG":
           $hon++;
            break;
        case "ICELAND":
           $ice++;
            break;
        case "IRELAND":
          $ire++;
            break;
        case "ITALY":
            $ita++;
            break;
        case "JAPAN":
           $jap++;
            break;
        case "KOREA":
           $kor++;
            break;
        case "KUWAIT":$aus++;
          $kuw++;
            break;
        case "MONACO":
            $mon++;
            break;
        case "NETHERLANDS":
         $net++;
            break;
        case "PORTUGAL":
          $por++;
            break;
        case "RUSSIA":
           $rus++;
            break;
        case "SAUDI ARABIA":
            $country[21]["count"] = mysql_result($result,$i,"ccount");
            break;
        case "SINGAPORE":
           $sin++;
            break;
        case "SOUTH AFRICA":
           $sou++;
            break;
        case "SPAIN":
            $spa++;
            break;
        case "ST. BARTHELEMY":
            $st++;
            break;
        case "SWITZERLAND":
          $swi++;
            break;
        case "TURKEY":
            $tur++;
            break;
        case "UKRAINE":
           $ukr++;
            break;
        case "UNITED ARAB EMIRATES":
           $ua++;
            break;
        case "UNITED KINGDOM":
           $uk++;
            break;
        case "USA":
            $us++;
            break;
    } 
    
    
    }
    
    
       $out = $out."<tr><td>$name</td><td>$aus</td><td>$aust</td><td></td><td></td><td></td><td></td><td></td><td></td>
       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
    
    $i ++;
}
echo $out."</tbody></table>";

?>
</body>
</html>
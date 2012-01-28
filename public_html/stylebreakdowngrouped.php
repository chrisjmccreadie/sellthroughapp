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
    $query2 = "SELECT country,count(rsold),count(sold) FROM `sellthrough2` WHERE `styleid` = $styleid group by country";
    echo $query2."</br>";
    $result2=mysql_query($query2);
    $num2=mysql_numrows($result2);
    echo $num2;
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
         
         echo "$country : count $ccount</br>";
          $i2 =  $i2+1;          
    }
    $i = $i+1;
}

echo $out."</tbody></table>";
?>
</body>
</html>
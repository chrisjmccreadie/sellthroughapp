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


$query = "select name,sold,rsold from sellthrough2 group by name";
$result=mysql_query($query);
$num=mysql_numrows($result);
$out =  '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"><thead>';
$i = 0;
$out = $out."<tr><th>Name</th><th>Bought</th><th>Sold</th><th>Percentage</th></tr></thead>";
$pertotal = 0;
$perzeo = 0;
while ($i < $num)
{
     $name = mysql_result($result,$i,"name");
      $query2 = "SELECT name,sum(quantity) as bought, sum(sold) as sold, sum(rsold) as rsold FROM `sellthrough2` WHERE name = '$name'";
    $result2=mysql_query($query2);
    $bought = mysql_result($result2,0,"bought");
  
     $sold = mysql_result($result2,0,"sold");
    $rsold = mysql_result($result2,0,"rsold");
 //echo $rsold;
 if ($sold == 0)
        $sold = $rsold;
    /*
    if ($sold == 0)
    {
 
        $query2 = "SELECT name,sum(sold) as sold FROM `sellthrough2` WHERE name = '$name'";
        $result2=mysql_query($query2);
        $sold= mysql_result($result2,0,"sold");
    }
    */
     //echo "$per ff";
     $per = $sold / $bought * 100;
   $per = number_format($per,0);
   if ($per == 0)
       $perzero = $perzero +1;
   else
      $pertotal = $pertotal +1;
   $out = $out."<tr class=\"odd gradeX\"><td><a href=\"storebreakdown2.php?name=$name\">$name</a></td><td>$bought</td><td>$sold</td><td>$per %</td></tr>";
           
    $i++;
}
$pert = $pertotal / $i * 100;
$perz = $perzero / $i * 100;
$storet = $i /100 * 60;
$pert = number_format($pert,0);
$perz = number_format($perz,0);
$storet = number_format($storet,0);
echo "Stores Added $pertotal ($pert)</br>";
echo "Store Not Added $perzero ($perz)</br>";
echo "Stores to hit target $storet</br>";
echo $out."</tbody></table>";
?>

</body>
</html>
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
<form name="form1" id="form1" action="updatestore.php" method="POST">
<?php
//do it
//fecth a list of urls mysql_connect(localhost,$username,$password);
$username="sellthroughapp";
$password="SlTbckNB";
$database="sellthroughapp";
mysql_connect("sellthroughapp.mysql.fluxflex.com",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
//close the database 


$query = "select name,sold,rsold,styleid from sellthrough2 group by styleid";
$result=mysql_query($query);
$num=mysql_numrows($result);

$out =  '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"><thead>';
$i = 0;
$out = $out."<tr><th>Name</th><th>Bought</th><th>Sold</th><th>Percentage</th></tr></thead>";
$pertotal = 0;
$perzeo = 0;
$averageb = 0;
$averages = 0;
$averagep = 0;
$f = 0;
while ($i < $num)
{
     $styleid = mysql_result($result,$i,"styleid");
     
     $query3  = "select name from style where id = '$styleid'";
     //echo $query3;
      $result3=mysql_query($query3);
        $stylename = mysql_result($result3,0,"name");
        if ($styleid == 0)
            $stylename = "Unknown";
     
      $query2 = "SELECT id,sum(presale) as presale,sum(postsale) as postsale,name,sum(quantity) as bought, sum(sold) as sold, sum(rsold) as rsold FROM `sellthrough2` WHERE styleid = '$styleid'";
    $result2=mysql_query($query2);
   
   $id = mysql_result($result2,0,"id");
   
   $query3 = "select per from postsale where sellthroughid = '$id'";
       $result3=mysql_query($query3);
       $num3=mysql_numrows($result3);
       //echo mysql_error();
     //  echo "num".$num3;
       if ($num3 >0)
          $postsaleper = mysql_result($result3,0,"per");
       else
          $postsaleper = 0;
   $bought = mysql_result($result2,0,"bought");
    $presale = mysql_result($result2,0,"presale");
      $postsale = mysql_result($result2,0,"postsale");
     $sold = mysql_result($result2,0,"sold");
    $rsold = mysql_result($result2,0,"rsold");
 //echo $rsold;
 if ($sold == 0)
        $sold = $rsold;
   
   
   if ($sold > 0)
   {
        $averages = $averages+$sold;
        $averageb = $averageb+$bought;
   }
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
   {
    
       $perzero = $perzero +1;
   }
    else
       $pertotal = $pertotal +1;
   $out = $out."<tr class=\"odd gradeX\"><td><a href=\"catbreakdown2.php?name=$styleid\">$stylename</a></td><td>$bought</td><td>$sold</td><td>$per %</td> 
   </tr>";
           
    $i++;
}

/*
$pert = $pertotal / $i * 100;
$perz = $perzero / $i * 100;
$storet = $i /100 * 60;
$pert = number_format($pert,0);
$perz = number_format($perz,0);
$storet = number_format($storet,0);
$averagep = $averages / $averageb *100;
//$averageb = $averageb / $i;
//$averages = $averages / $i;
$averages = number_format($averages,0);
$averagep = number_format($averagep,0);
$averageb = number_format($averageb,0);
echo "Stores Added $pertotal ($pert)</br>";
echo "Store Not Added $perzero ($perz)</br>";
echo "Stores to hit target $storet 60%</br>";
*/
echo $out."</tbody></table>";
?>
</form>
</body>
</html>
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


$query = "select name from sellthrough2 group by name";
$result=mysql_query($query);
$num=mysql_numrows($result);
$out =  '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"><thead>';
$i = 0;
$out = $out."<tr><th>Name</th><th>Bought</th><th>Sold</th><th>Percentage</th></tr>";
while ($i < $num)
{
     $name = mysql_result($result,$i,"name");
      $query2 = "SELECT name,sum(quantity) as bought FROM `sellthrough2` WHERE name = '$name'";
    $result2=mysql_query($query2);
    $bought = mysql_result($result2,0,"bought");
     
     
     $sold = 0;
     $per = 0;
     $out = $out."<tr class=\"odd gradeX\"><td>$name</td><td>$bought</td><td>$sold</td><td>$per %</td></tr>";
           
    $i++;
}
echo $out."</tbody></table>";
?>

</body>
</html>
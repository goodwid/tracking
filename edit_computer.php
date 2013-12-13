<?
echo "<html><head><title>edit computer</title></head><body>\n";
include ("dbinfo.flaim.php");

$i=$_REQUEST["asset"];
$table=$_REQUEST["table"];

$titles = array (
	"computername",
	"computermodel",
	"computerfamily",
	"formfactor",
	"ram",
	"cpu",
	"serialno",
	"asset",
	"tagcolor",
	"bailout",
	"bailpass",
	"notes");

$query="SELECT * FROM $table WHERE asset='$i'";
mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$result=mysql_query($query);
$row=mysql_fetch_array($result);
mysql_close();

echo <<<EOF
<form action="update.php" method="POST">
<input type="hidden" name="table" value="computers">
EOF;

for ($j=0;$j< count($titles);$j++){
        $k=$j+1;
        echo "$titles[$j]: <input type=\"text\" name=\"$titles[$j]\" value=\"$row[$j]\"><br />\n";
    }
echo <<<EOF
Check to delete: <input type="checkbox" name="delete_row" value="yes"><br>
<input type="submit" value="Submit changes">

</body></html>
EOF;
?>


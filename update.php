<?

include ("./dbinfo.flaim.php");

echo <<<EOF
<html> <head> <meta http-equiv="refresh" content="4;url=view_computer.php">
<title>updating</title>
</head>
<body>
EOF;

$computername=$_REQUEST["computername"];
$computermodel=$_REQUEST["computermodel"];
$computerfamily=$_REQUEST["computerfamily"];
$formfactor=$_REQUEST["formfactor"];
$ram=$_REQUEST["ram"];
$cpu=$_REQUEST["cpu"];
$serialno=$_REQUEST["serialno"];
$asset=$_REQUEST["asset"];
$tagcolor=$_REQUEST["tagcolor"];
$bailout=$_REQUEST["bailout"];
$bailpass=$_REQUEST["bailpass"];
$notes=$_REQUEST["notes"];
$table=$_REQUEST["table"];
$delete_row=$_REQUEST["delete_row"];

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

if ($delete_row=="yes") {
	$query="DELETE FROM $table WHERE asset='$asset'";
	mysql_query($query);
        echo "Row deleted.  \n";
}
else {
	$query="UPDATE $table SET computername='$computername',computermodel='$computermodel',computerfamily='$computerfamily',formfactor='$formfactor',ram='$ram',cpu='$cpu',serialno='$serialno',asset='$asset',tagcolor='$tagcolor',bailout='$bailout',bailpass='$bailpass',notes='$notes' WHERE asset='$asset'";
	mysql_query($query);
	echo "Info successfully updated.";
}

mysql_close();


echo " </body> </html>";


?>

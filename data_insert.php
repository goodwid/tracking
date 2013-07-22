<?
include ("./dbinfo.inc.php");

echo <<< EOF
<html>
<head><!-- <meta http-equiv="refresh" content="2;URL=tracking.html"> -->
<title>Uploaded!</title>
</head>
<body>
EOF;

$disp=$_REQUEST["disp"];
$computername=$_REQUEST["computername"];
$username=$_REQUEST["username"];
$win7temp=$_REQUEST["win7activation"];
if ($win7temp="yes")
  { $win7activation="yes"; }
   else
  { $win7activation="no"; }
$officetemp=$_REQUEST["officeactivation"];
if ($officetemp="yes")
  { $officeactivation="yes"; }
   else
  { $officeactivation="no"; }

$computermodel=$_REQUEST["computermodel"];
$computerfamily=$_REQUEST["computerfamily"];
$formfactor=$_REQUEST["formfactor"];
$ram=$_REQUEST["ram"];
$serialno=$_REQUEST["serialno"];
$asset=$_REQUEST["asset"];
$tagcolor=$_REQUEST["tagcolor"];
$bailout=$_REQUEST["bailout"];
$bailpass=$_REQUEST["bailpass"];
$modification=$_REQUEST["modification"];
$retirement=$_REQUEST["retirement"];
$notes=$_REQUEST["notes"];

$timestamp=date("j F Y H:i");

$query="INSERT INTO $table VALUES ('','$disp','$computername','$username','$win7activation','$officeactivation','$computermodel','$computerfamily','$formfactor','$ram','$serialno','$asset','$tagcolor','$bailout','$bailpass','$modification','$retirement','$notes','$timestamp')";

echo "the query is $query.<br>";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query($query);
mysql_close();


$myFile = "/tmp/tracking.csv";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "$disp,$computername,$username,$win7activation,$officeactivation,$computermodel,$computerfamily,$ram,$serialno,$asset,$tagcolor,$bailout,$bailpass,$modification,$retirement,$notes,$timestamp\n";
fwrite($fh, $stringData);
fclose($fh);




echo "Info successfully inserted into $table.";
echo " </body> </html>";
?>

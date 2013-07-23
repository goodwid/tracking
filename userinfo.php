<?

$id=$_REQUEST["id"];
$name=$_REQUEST["name"];

echo <<<EOF
<html><head>
<title>User info for $name</title>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
</head>
<body>
EOF;

include ("./dbinfo.inc.php");

$query="SELECT * FROM $table where id = $id";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database);

$result=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);

$i=0;

$id=mysql_result($result,$i,"id");
$disp=mysql_result($result,$i,"disp");
$computername=mysql_result($result,$i,"computername");
$username=mysql_result($result,$i,"username");
$win7activation=mysql_result($result,$i,"win7activation");
$officeactivation=mysql_result($result,$i,"officeactivation");
$computermodel=mysql_result($result,$i,"computermodel");
$computerfamily=mysql_result($result,$i,"computerfamily");
$formfactor=mysql_result($result,$i,"formfactor");
$ram=mysql_result($result,$i,"ram");
$serialno=mysql_result($result,$i,"serialno");
$asset=mysql_result($result,$i,"asset");
$tagcolor=mysql_result($result,$i,"tagcolor");
$bailout=mysql_result($result,$i,"bailout");
$bailpass=mysql_result($result,$i,"bailpass");
$modification=mysql_result($result,$i,"modification");
$retirement=mysql_result($result,$i,"retirement");
$notes=mysql_result($result,$i,"notes");
$timeentered=mysql_result($result,$i,"timestamp");

mysql_close();

echo <<<EOF
<label for="disp">Disposition:</label><input value="$disp" /><br />
<label for="computername">Computer Name:</label><input value="$computername" /><br />
<label for="username">User:</label><input value="$username" /><br />
<label>Windows 7 activation:</label>$win7activation<br />
<label>Office 2010 activation:</label> $officeactivation<br />
<label>Computer Model:</label> <input value="$computermodel" /><br />
<label>Computer Type:</label> <input value="$computerfamily" /><br />
<label>Form Factor:</label> <input value="$formfactor" /><br />
<label>RAM:</label> $ram<br />
<label>Serial No.:</label> $serialno<br />
<label>Asset Tag:</label> $asset<br />
<label>Tag Color:</label> $tagcolor<br />
<label>Bailout username:</label> $bailout<br />
<label>Bailout password:</label> $bailpass<br />
<label>Modifications:</label><input value='$modification'><br />
<label>Retirement Reason:</label><input value='$retirement'><br />
<label>Notes:</label><input value='$notes' width=100px><br />
<label>Entered on </label>$timeentered<br />
EOF;


echo "</body></html>";

?>

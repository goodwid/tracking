<?

echo <<< EOF
<html>
<head>
	<title>computer viewer</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/style.css">
</head>
<body>

EOF;

include ("./dbinfo.flaim.php");

$query="select * from computers order by asset";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$result=mysql_query($query);
$num=mysql_numrows($result);

echo <<<EOF
	<p>
	<a href="computers.html">Go back to the beginning</a>
	</p>
	<table border="1" cellpadding="4">
	<caption>Computers</caption>
	<tr>
	<th>Computer Name</th>
	<th>Model</th>
	<th>Family</th>
	<th>Form Factor</th>
	<th>RAM</th>
	<th>CPU</th>
	<th>SN</th>
	<th>Asset</th>
	<th>tag color</th>
	<th>bailout username</th>
	<th>bailout password</th>
	<th>Notes</th>
	</tr>

EOF;


$i=0;
while ($i < $num) {

	$computername=mysql_result($result,$i,"computername");
	$serialno=mysql_result($result,$i,"serialno");
	$computermodel=mysql_result($result,$i,"computermodel");
	$computerfamily=mysql_result($result,$i,"computerfamily");
	$formfactor=mysql_result($result,$i,"formfactor");
	$ram=mysql_result($result,$i,"ram");
	$cpu=mysql_result($result,$i,"cpu");
	$serialno=mysql_result($result,$i,"serialno");
	$asset=mysql_result($result,$i,"asset");
	$tagcolor=mysql_result($result,$i,"tagcolor");
	$bailout=mysql_result($result,$i,"bailout");
	$bailpass=mysql_result($result,$i,"bailpass");
	$notes=mysql_result($result,$i,"notes");

        if ($i%2==0) { 
		echo "<tr bgcolor=\"#ffffff\">"; }
            else { 
		echo "<tr bgcolor=\"#ffffcc\">"; }
	echo <<<EOF
        <td>$computername</td>
	<td>$computermodel</td>
	<td>$computerfamily</td>
	<td>$formfactor</td>
	<td>$ram</td>
	<td>$cpu</td>
	<td>$serialno</td>
	<td>$asset</td>
	<td>$tagcolor</td>
	<td>$bailout</td>
	<td>$bailpass</td>
	<td><input value="$notes"></td>
	<td><form action="edit_computer.php" method="POST"><input type="hidden" name="asset" value="$asset"><input type="hidden" name="table" value="computers"><input type="submit" value="Edit" ></form></td>
    </tr>
EOF;

        $i++;
}


echo "</table>";
mysql_close();

echo "</body></html>";

?>

<?

echo "<html><head>";
echo "<title>data viewer</title></head><body>";

include ("./dbinfo.inc.php");

$query="SELECT * FROM $table";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$result=mysql_query($query);
$num=mysql_numrows($result);

echo <<<EOF
<p>
<a href="index.html">Go back to the beginning</a>
</p>
<table border="1" cellpadding="4">
<caption>Data</caption>
<tr>><th>Computer Name</th><th>username</th>><th>Family</th><th>RAM</th>><th>asset</th>><th>notes</th><th>timeentered</th>
</tr>

EOF;

$i=0;
while ($i < $num) {

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

    if ($i%2==0) { 
	echo "<tr bgcolor=\"#ffffff\">"; }
      else { 
	echo "<tr bgcolor=\"#bbbbbb\">"; }
echo <<<EOF
        <td>$computername</td>
	<td>$username</td>
	<td>$computerfamily</td>
	<td>$ram</td>
	<td>$asset</td>
	<td><input value="$notes"></td>
	<td>$timeentered</td>
        <td><input type="button" value="More Info" onclick="window.open('./userinfo.php?id=$id&name=$username',name='userinfo')"</tr>
    </tr>
EOF;
/*
        <td>$id</td><td>$disp</td><td>$computername</td><td>$username</td><td>$win7activation</td><td>$officeactivation</td>
	<td>$computermodel</td><td>$computerfamily</td><td>$formfactor</td><td>$ram</td><td>$serialno</td><td>$asset</td><td>$tagcolor</td>
	<td>$bailout</td><td>$bailpass</td><td>$modification</td><td>$retirement</td><td><input value="$notes"></td><td>$timeentered</td>
*/

    $i++;
}


echo "</table>";
mysql_close();

echo "</body></html>";

?>

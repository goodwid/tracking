<?
include ("./dbinfo.flaim.php");


$notes=$_REQUEST["notes"];
$table=$_REQUEST["table"];

switch ($table) {
	case "computers":
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
		$query="INSERT INTO $table VALUES ('$computername','$computermodel','$computerfamily','$formfactor','$ram','$cpu','$serialno','$asset','$tagcolor','$bailout','$bailpass','$notes');";
		$url="computers.html";
		break;
	case "people":
		$name=$_REQUEST["name"];
		$startdate=$_REQUEST["startdate"];
		$termdate=$_REQUEST["termdate"];
		$department=$_REQUEST["department"];
		$monitors=$_REQUEST["22_in_monitors"];
		$query="INSERT INTO $table VALUES ('','$name','$startdate','$termdate','$department','$monitors','$notes');";
		$url="people.html";	
		break;
	case "locations";
		$url="locations.html";
		break;
}

echo "<html><head><meta http-equiv=\"refresh\" content=\"40;URL=$url\">";
echo "<title>Uploaded!</title> </head> <body>";

echo "query = $query";
echo "<a href=\"$url\"> go back</a>";
mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query($query) or die(mysql_error());
mysql_close();

echo "Info successfully inserted into $table.";
echo " </body> </html>";
?>

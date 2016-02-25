<?
echo <<<EOF
<html>
<head>
<title>edit computer</title>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
</head>

<body>

EOF;
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
	$name=$titles[$j];	
	switch ($name) {
		case "computername":
		case "computerfamily":
		case "notes":
        		echo "<label for=\"$name\">$name:</label> <input type=\"text\" name=\"$name\" value=\"$row[$j]\" class=\"input1\"><br />\n";
			break;
		case "computermodel":
		case "ram":
		case "cpu":
		case "serialno":
		case "asset":
		case "bailout":
		case "bailpass":
        		echo "<label for=\"$name\">$name:</label> <input type=\"text\" name=\"$name\" value=\"$row[$j]\" class=\"input2\"><br />\n";
			break;
		case "formfactor":
			echo "<label for=\"$name\">$name:</label> <select name=\"$name\" class=\"input2\" required />";
			if ($row[$j]=="Desktop") {
				echo "<option value=\"Desktop\" selected>Desktop</option>";
				echo "<option value=\"Laptop\">Laptop</option>";
			} else {
				echo "<option value=\"Desktop\">Desktop</option>";
				echo "<option value=\"Laptop\" selected>Laptop</option>";
			}
			echo "</select>";
			echo "<br />";
			break;
		case "tagcolor":
                        echo "<label for=\"$name\">$name:</label> <select name=\"$name\" class=\"input2\" required />";
			if ($row[$j]=="Blue") {
                       		echo "<option value=\"Blue\" selected>Blue</option>";
                        	echo "<option value=\"Red\">Red</option>";
			} else {
                       		echo "<option value=\"Blue\">Blue</option>";
                        	echo "<option value=\"Red\" selected>Red</option>";
			}
                        echo "</select>";
			echo "<br />";
                        break;
	}


    }
echo <<<EOF
<label for="delete_row">Check to delete:</label><input type="checkbox" name="delete_row" value="yes"><br>
<input  class="sub-button" type="submit" value="Submit changes">

</body></html>
EOF;
?>


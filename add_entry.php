include ("./dbinfo.inc.php");

echo <<< EOF
<html>
<head><meta http-equiv="refresh" content="4;URL=uploader.html">
<title>Uploaded!</title>
</head>
<body>
EOF;

$title=$_REQUEST["title"];
$artist_first=$_REQUEST["artist_first"];
$artist_last=$_REQUEST["artist_last"];
$show_title=$_REQUEST["show_title"];
$year=$_REQUEST["year"];
$artwork_height=$_REQUEST["artwork_height"];
$artwork_width=$_REQUEST["artwork_width"];
$artwork_depth=$_REQUEST["artwork_depth"];

# Input sanitization should go here.

$target="upload/";
$filename=basename($_FILES['uploaded']['name']);
$path = $target . $filename ;
 $ok=1;
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $path))
 {
 echo "The file $filename has been uploaded";
 list($image_height, $image_width, $type, $attr)=getimagesize($path);
 }
 else {
 echo "Sorry, there was a problem uploading your file.";
 }

echo "<br />";

$query="INSERT INTO $table VALUES ('','$title','$artist_first','$artist_last','$show_title','$year','$artwork_height','$artwork_width','$artwork_depth','$image_height','$image_width','$path')";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query($query);
mysql_close();

echo "Info successfully inserted into $table.";
echo " </body> </html>";
?>

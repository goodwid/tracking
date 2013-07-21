<?
include ("./dbinfo.inc.php");

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="CREATE TABLE $table (id int(6) NOT NULL auto_increment,disp enum('Deployed','Returned','Modified','New') NOT NULL,computername varchar(20) NOT NULL,username varchar(60) NOT NULL,win7activation enum('yes','no') NOT NULL,officeactivation enun('yes','no') NOT NULL,computermodel varchar(20) NOT NULL,computerfamily varchar(30) NOT NULL,formfactor enum('Desktop','Laptop') NOT NULL,ram int(10) NOT NULL,serialno varchar(20) NOT NULL,asset varchar(10) NOT NULL,tagcolor eunm('Blue,'Red') NOT NULL,bailout varchar(20) NOT NULL,bailpass varchar(20) NOT NULL,modification text NOT NULL,retirement text NOT NULL,notes text NOT NULL,timestamp datetime(),PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";

mysql_query($query);
mysql_close();
?>
New DB created.

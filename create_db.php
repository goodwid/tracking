<?
include ("./dbinfo.flaim.php");

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="CREATE TABLE computers (computername varchar(20) NOT NULL, computermodel varchar(20) NOT NULL, computerfamily varchar(30) NOT NULL, formfactor enum('Desktop','Laptop') NOT NULL, ram int(10), cpu varchar(20), serialno varchar(20) NOT NULL, asset varchar(10) NOT NULL, tagcolor enum('Blue','Red') NOT NULL, bailout varchar(20), bailpass varchar(20), notes text NOT NULL, PRIMARY KEY (asset));";
mysql_query($query);

$query="create table people (id int(6) not null auto_increment unique,name varchar(60),start_date date, term_date date, department varchar(30), 22_in_monitors boolean, notes text,  PRIMARY KEY (id));";
mysql_query($query);

$query="create table locations (id int(6) not null auto_increment unique, loc_id varchar(10) not null,panel_id varchar(10) not null, location_type varchar (30) not null, notes text, primary key (id));";
mysql_query($query);

$query="create table deployments (id int(6) not null auto_increment unique, start_date date not null, end_date date, comp_id varchar(10) not null, people_id int(6) not null, loc_id int(6) not null, foreign key (comp_id) references computers(asset), foreign key (people_id) references people(id), foreign key (loc_id) references location(id), primary key(id));";
mysql_query($query);

mysql_close();
?>
New DB created.

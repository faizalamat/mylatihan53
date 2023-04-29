<?php
$conn = mysql_connect("localhost","root","");
$dbase = mysql_select_db("latihandb",$conn);
if (!$dbase) { die("RALAT SAMBUNGAN KE PANGKALAN DATA"); }
?>
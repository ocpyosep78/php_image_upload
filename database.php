<?php
// database
// server: localhost
// username: root
// password: root
// database name: a_picture
mysql_connect("localhost", "root", "root") or die(mysql_error()); 
mysql_select_db("a_picture") or die(mysql_error());
?>
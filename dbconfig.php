<?php
    /// localhost //////////////////////
    date_default_timezone_set('Asia/Dhaka');
    header('Content-Type: text/html; charset=utf-8');

    $user='root';
    $password=''; 
    $database='scl';
    $connection = @mysql_connect("localhost",$user,$password) or die( mysql_error());
    @mysql_select_db($database) or die( "Unable to select database");
    mysql_set_charset('utf8', $connection); 
    
?>
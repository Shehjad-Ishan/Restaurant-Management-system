<?php

$user="root";
$password="";
$db="restaurant";

$db=new mysqli("localhost",$user,$password,$db) or die("Unable to connect");

echo "Well done";
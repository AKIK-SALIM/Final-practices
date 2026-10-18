<?php
$attend=$_POST["attendee"];
$capacity=$_POST["seat-capacity"];
$price=$_POST["ticket-price"];

$screen=ceil($attend/$capacity);
$empty_seat=($screen*$capacity)-$attend;

$wasted=$empty_seat*$price;

echo "Screen: ".$screen."<br>";
echo "Empty Seats: ".$empty_seat."<br>";
echo "Wasted Money: ".$wasted."<br>";

?>
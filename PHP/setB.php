<?php
$distance=$_POST["mission-distance"];
$energy_per_meter=$_POST["energy-meter"];
$battery_capacity=$_POST["capacity"];

$total_energy=$distance*$energy_per_meter;

$module=ceil($total_energy/$battery_capacity);

$unused_energy=($battery_capacity*$module)-$total_energy;

$efficiency=$unused_energy/100;

$status="";

if($efficiency<=10){
    $status="Efficient";
}
else if($efficiency>10 && $efficiency<=25){
    $status="Acceptable";
}
else if($efficiency>25){
    $status="Wasteful";
}

echo "Total Energy Required: ".$total_energy ."<br>";
echo "Battery Module: ".$module ."<br>";
echo "Unused Energy: ".$unused_energy ."<br>";
echo "Status: ".$status ."<br>";

?>
<?php

$mission_dis=$_POST["mission-distance"];
$energy_consume=$_POST["energy-consumption"];
$capacity=$_POST["battery-capacity"];

$total_energy=$mission_dis*$energy_consume;

$modules=ceil($total_energy/$capacity);

$unused_energy=($capacity*$modules)-$total_energy;

$energy_efficiency=($unused_energy/$total_energy)*100;

$status="";

if($energy_efficiency<=10){
    $status="Efficient";
}
else if($energy_efficiency>10 && $energy_efficiency<=25){
    $status="Acceptable";
}
else if($energy_efficiency>25){
    $status="Wasteful";
}

echo "Total Energy Required: ". $total_energy."<br>";
echo "Battery Modules: ". $modules."<br>";
echo "Unused Energy: ". $unused_energy."<br>";
echo "Status: ". $status."<br>";

?>
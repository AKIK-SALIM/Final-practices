<?php
$item_sold=$_POST["items-sold"];
$item_nums=$_POST["item-number"];
$target=$_POST["target"];

$total_sold=$item_sold*$item_nums;

$perform="";

if($total_sold>=500){
    $perform="Excellent";
}
else if($total_sold>=300 && $total_sold<500){
    $perform="Good";
}
else if($total_sold>=150 && $total_sold<300){
    $perform="Average";
}
else{
    $perfrom="Poor";
}

$result=abs($total_sold-$target);

$res="";

if($total_sold==$target){
    $res="Target met exactly ";
}
else if($total_sold>$target){
    $res="Above target by ";
}
else if($total_sold<$target){
    $res="Below target by ";
}

echo "Total items: ".$total_sold."<br>";
echo "Performance: ".$perform."<br>";
echo "Result: ".$res. $result."<br>";
?>
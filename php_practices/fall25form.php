<?php
$item_sold=$_POST["sold-items"];
$item_number=$_POST["item-numbers"];
$targeted_items=$_POST["target"];

$total_item=$item_sold*$item_number;
$perform="";

if($total_item>=500){
    $perform="Excellent";
}
else if($total_item>=300 && $total_item<500){
    $perform="Good";
}
else if($total_item>=150 && $total_item<300){
    $perform="Average";
}
else{
    $perform="Poor";
}

$result="";

$diff=abs($total_item-$targeted_items);

if($total_item==$targeted_items){
    $result="Target met exactly ";
}
else if($total_item>$targeted_items){
    $result="Above target by ";
}
else if($total_item<$targeted_items){
    $result="Below target by ";
}

echo "Total items: ". $total_item."<br>";
echo "Performance: ".$perform."<br>";
echo "Result: ".$result.$diff."<br>";

?>
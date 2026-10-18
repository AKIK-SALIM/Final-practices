<?php
$credit_per_course=$_POST["credit-per-course"];
$course_completed=$_POST["course-completed"];
$targeted_credit=$_POST["target-credit"];

$total_credits=$credit_per_course*$course_completed;

$progress="";

if($total_credits>=120){
    $progress="Excellent";
}
else if($total_credits>=90 && $total_credits<120){
    $progress="Good";
}
else if($total_credits>=60 && $total_credits<90){
    $progress="Average";
}
else{
    $progress="Poor";
}

$diff=abs($total_credits-$targeted_credit);

$compares="";

if($total_credits>$targeted_credit){
    $compare="Above target by ";
}
else if($total_credits<$targeted_credit){
    $compare="Below target by ";
}
else{
    $compare="Target met exactly ";
}

echo "Progress: ".$progress." ";
echo "Result: ".$compare.$diff;

?>
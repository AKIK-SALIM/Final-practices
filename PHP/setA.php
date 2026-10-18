<?php
$credit_course=$_POST["credit-earned"];
$completed_course=$_POST["course-completed"];
$target=$_POST["target-credit"];

$total_credit_earned=$credit_course*$completed_course;

$feedback="";

if($total_credit_earned>=120){
    $feedback="Excellent";
}
else if($total_credit_earned>=90 && $total_credit_earned<120){
    $feedback="Good";
}
else if($total_credit_earned>=60 && $total_credit_earned<90){
    $feedback="Average";
}
else{
    $feedback="Poor";
}
$result=abs($total_credit_earned-$target);

$review="";

if($total_credit_earned==$target){
    $review="Target met exactly ";
}
else if($total_credit_earned>$target){
    $review="Above target by ";
}
else if($total_credit_earned<$target){
    $review="Below target by ";
}

echo "Total Credits: ".$total_credit_earned."<br>";
echo "Progress: ". $feedback. "<br>";
echo "Result: ".$review. $result."<br>";

?>
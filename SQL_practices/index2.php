<?php

//Connection

$conn=new mysqli("localhost","root","","uiuweb_final");

if($conn->connect_error==false){
    echo "Connection Successful <br>";
}

//Show total number of students per letter grade

$sql="
SELECT lettergrade, COUNT(*) AS Total
FROM student_final
GROUP BY lettergrade;
";

$result=$conn->query($sql);

if($result-> num_rows>0){
    echo "<br> Query 1========<br>";
    while($row=$result->fetch_assoc()){
        echo "Lettergrades: ".$row["lettergrade"]."|| Total: ".$row["Total"]."<br>";
    }
}
//Update letter grades
$sql="
UPDATE student_final
SET lettergrade='C'
WHERE grade<80 AND grade<=85;
";
$result=$conn->query($sql);

//Add bonus marks

$sql="
UPDATE student_final
SET grade=grade+5
WHERE grade>80 AND grade>=85;
";
$result=$conn->query($sql);
//Courses by popularity

$sql="
SELECT coursetitle, COUNT(*) AS numStudent
FROM student_final
GROUP BY coursetitle
ORDER BY numStudent ASC;
";

$result=$conn->query($sql);
if($result->num_rows>0){
    echo "Query 4=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Course Title: ". $row["coursetitle"]." || Number of Student: ".$row["numStudent"]."<br>";
    }
}

?>
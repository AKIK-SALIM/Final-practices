<?php
//Connection
$conn=new mysqli("localhost","root","","tourism");

if($conn->connect_error==false){
    echo "Connection Successful <br>";
}

//Query 1
$sql="
SELECT spotName, region, rating
FROM tourist_spot
GROUP BY rating
HAVING rating> 4.5 OR spotName='Beach'
ORDER BY rating DESC;
";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo "<br> Query1=======<br>";
    while($row=$result->fetch_assoc()){
        echo "SpotName: ".$row["spotName"]." ||Region: ". $row["region"]." ||Rating: ".$row["rating"]."<br>";
    }
}
//Query 2
$sql="
UPDATE tourist_spot
SET rating= rating+0.2, 
    entryFee=entryFee * 1.1
WHERE (rating>=4.0 AND rating<=4.5) AND entryFee>0 ;
";
$result=$conn->query($sql);
//Query 3

$sql="
SELECT category,
       COUNT(*) AS spotNum,
       AVG(rating) AS avg_rating,
       visitorPerYear
FROM tourist_spot
GROUP BY category
HAVING avg_rating>4.4 
ORDER BY avg_rating DESC 
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<br> Query3=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Category: ".$row["category"]." ||Number of spots: ". $row["spotNum"]." ||Average Rating: ".$row["avg_rating"]." ||Total Visitors: ".$row["visitorPerYear"]."<br>";
    }
}
//Query 4
$sql="
SELECT region,
       SUM(entryFee*visitorPerYear) AS yearly_revenue
FROM tourist_spot
GROUP BY region
HAVING yearly_revenue > 1000000
ORDER BY yearly_revenue DESC;
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<br> Query4=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Region: ".$row["region"]." ||Total Yearly Revenue: ".$row["yearly_revenue"]."<br>";
    }
}
?>
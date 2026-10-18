<?php
//Connection
$conn=new mysqli("localhost","root","","tourism");

if($conn->connect_error==false){
    echo "Connection Successful<br>";

}

//Query-1
$sql="
SELECT spotName, region,rating 
FROM tourist_spot
WHERE rating>4.5 OR spotName='Beach';
";

$result=$conn->query($sql);

if($result->num_rows>0){
    echo "<br> Query 1=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Spotname: ".$row["spotName"]." || Region: ".$row["region"]. " || Rating:".$row["rating"]."<br>";
    }
}

//Query-2
$sql="
UPDATE tourist_spot 
SET rating=rating+0.2,
    entryFee=entryFee*0.9 
WHERE (rating>=4.0 AND rating<=4.5) AND entryFee>0;
";

$result=$conn->query($sql);

//Query-3
$sql="
SELECT category,
       COUNT(*) AS spotNum,
       AVG(rating) AS avg_rating,
       visitorPerYear
FROM tourist_spot
GROUP BY category
HAVING avg_rating > 4.4
ORDER BY avg_rating DESC;
";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo "<br> Query 3=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Category: ".$row["category"]." ||Number of Spot: ".$row["spotNum"]." ||Visitor/Year: ".$row["visitorPerYear"]."|| Average_Rating: ".$row["avg_rating"]."<br>";
    }
}
//Query-4
$sql="
SELECT region,
       SUM(entryFee*visitorPerYear) AS yearly_revenue
FROM tourist_spot
GROUP BY region
HAVING yearly_revenue>=1000000
ORDER BY yearly_revenue DESC;
";

$result=$conn->query($sql);

if($result->num_rows>0){
    echo "<br> Query 4=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Region: ".$row["region"]." || Total yearly Revenue: ".$row["yearly_revenue"]."<br>";
    }
}


?>
<?php

//Connection
$conn=new mysqli("localhost","root","","shop");

if($conn->connect_error==false){
    echo "Connection Successful<br>";
}

//Selection query: show items with stock>50
$sql="
 SELECT * 
 FROM items
 WHERE stock<50;
";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo "<br> Query1=======<br>";
    while($row=$result->fetch_assoc()){
        echo "Item Name: ".$row["name"]." || item price: ".$row["price"]."<br>";
    }
}
//Update query: Increase stock of items by 10 where stock=30
$sql="
UPDATE items
SET stock=stock+10
WHERE stock<50;
";
$result=$conn->query($sql);
/*
SELECT column choose | aggregation(SUM,AVG,COUNT)
FROM <table_name>
WHERE <condition on individual row|condition without aggregation>
GROUP BY <for each column>
HAVING <condition on aggregation>
GROUP BY <column_name> DESC|ASC
LIMIT <n> (top n results)
*/



?>
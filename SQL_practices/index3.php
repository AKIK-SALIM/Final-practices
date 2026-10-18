<?php

$conn=new mysqli("localhost","root","","uiu_bookshop");

if($conn->connect_error==false){
    echo "Connection Successful<br>";
}

//Query-1
$sql="
SELECT category
FROM book_info
WHERE category='Programming'
ORDER BY price DESC;
";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo"Query 1======"."<br>";
    while($row=$result->fetch_assoc()){
        echo "Category: ".$row["category"]."<br>";
    }
}
//Query-2
$sql="
SELECT category,booktitle, author, price
FROM book_info
WHERE price>400 AND category='Programming';
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo"Query 2======"."<br>";
    while($row=$result->fetch_assoc()){
        echo "Category: ".$row["category"]."|| Book Title: ".$row["booktitle"]."|| Author: ".$row["author"]."Price: ".$row["price"]."<br>";
    }
}
//Query-3
$sql="
SELECT category,stock
FROM book_info
WHERE stock<20
";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo"Query 3======"."<br>";
    while($row=$result->fetch_assoc()){
        echo "Category: ".$row["category"]."|| Stock: ".$row["stock"]."<br>";
    }
}
//Query-4
$sql="
SELECT SUM(price*stock) AS totalWorth
FROM book_info;
";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo"Query 4======"."<br>";
    while($row=$result->fetch_assoc()){
        echo "Total Worth: ".$row["totalWorth"]."<br>";
    }
}
//Query-5
$sql="
UPDATE book_info
SET price=price*0.9 
WHERE category='Language';
";
$result=$conn->query($sql);

?>
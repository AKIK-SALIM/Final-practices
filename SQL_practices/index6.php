<?php

//Connection
$conn=new mysqli("localhost","root","","sundarban");

if($conn->connect_error==false){
    echo "Connection Successful <br>";
}
//Query 1
$sql="
SELECT categoryName,categoryID,
       SUM(revenue) AS total_revenue
FROM sales_data
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<br> Query 1========<br>";
    while($row=$result->fetch_assoc()){
        echo "Category Id: ".$row["categoryID"]." || Category Name: ".$row["categoryName"]." || Total Revenue: ".$row["total_revenue"]."<br>";
    }
}
//Query 2
$sql="
UPDATE sales_data 
SET categoryName='Low Performing'
WHERE revenue < 40000;
";
$result=$conn->query($sql);
//Query 3
$sql="
UPDATE sales_data
SET revenue= revenue * 1.1
WHERE revenue > 70000;
";
$result=$conn->query($sql);
//Query 4
$sql="
SELECT productName,
       categoryName,
       revenue,
    CASE
       WHEN revenue > (
           SELECT AVG(s2.revenue)
           FROM sales_data s2
           WHERE s2.categoryID = sales_data.categoryID
       )
       THEN 'Top Seller'
       ELSE 'Regular Seller'
    END AS sellerlabel
FROM sales_data;
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<br> Query 4========<br>";
    while($row=$result->fetch_assoc()){
        echo "Product Name: ".$row["productName"]." || Category Name: ".$row["categoryName"]." || Label: ".$row["sellerlabel"]."<br>";
    }
}

?>
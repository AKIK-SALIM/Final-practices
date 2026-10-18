<?php

//Connection
$conn=new mysqli("localhost","root","","campus_library");

if($conn->connect_error==false){
    echo "Connection Successful<br>";
}
//Query 1
$sql="
SELECT stat,
       COUNT(*) AS total_books
FROM book_loans
GROUP BY stat
HAVING total_books>1;
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<br>Query 1==========<br>";
    while($row=$result->fetch_assoc()){
        echo "Status: ".$row["stat"]." ||Total Number of books: ".$row["total_books"]."<br>";
    }
}
//Query2
$sql="
UPDATE book_loans
SET stat='Grace Period',
    penaltyFee=0.00
WHERE stat='Overdue' AND daysOverdue < 7;
";
$result=$conn->query($sql);

//Query 3
$sql="
UPDATE book_loans
SET penaltyFee=penaltyFee*1.10
WHERE penaltyFee>20 AND penaltyFee*1.10 <50.00;
";
$result=$conn->query($sql);

//Query4 
$sql="
SELECT bookTitle,
       SUM(penaltyFee) AS total_penaltyFee
FROM book_loans
GROUP BY bookTitle
ORDER BY total_penaltyFee ASC;
";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<br>Query 4==========<br>";
    while($row=$result->fetch_assoc()){
        echo "Book title: ".$row["bookTitle"]." || Total Penalty Fee: ".$row["total_penaltyFee"]."<br>";
    }
}
?>
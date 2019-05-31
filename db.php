<?php

//getting connections with database
require_once("../../conf/auth.php");
$connection = mysqli_connect("$host","$user","$pswd","$dbnm");
if(!isset($connection)){
    echo "not connected";
}
else if(isset($connection)){
    echo " connected";
}

//sql query to create database
$sql = "CREATE TABLE IF NOT EXISTS booking (
    bookingNum int NOT NULL AUTO_INCREMENT UNIQUE,
    name varchar(100) NOT NULL,
    phone int (15) NOT NULL,
    unitNumP varchar(100) ,
    streetNumP varchar(100) NOT NULL,
    streetNameP varchar(100) NOT NULL,
    suburbP varchar(100) NOT NULL,
    timeP time NOT NULL,
    dateP date NOT NULL,
    suburbD varchar(100) NOT NULL,
    
    bookingTime time,
    bookingDate date,
    combined datetime,
    status varchar(50) DEFAULT 'unassigned',
    
    PRIMARY KEY (bookingNum)
);";

//example to create a record inside database
"INSERT INTO booking (name, phone, unitNump,streetNumP, streetNameP, suburbP, timeP ,dateP, suburbD, bookingTime, bookingDate, combined, status)
VALUES ('Coco','123456789',' ', '1A','Main Ave','CBD', '11:00', '1999-10-10', 'New Lynn', now(), CURDATE(),CURRENT_TIMESTAMP , status)
";

//execute query
$result = $connection->query($sql);
//close connection
mysqli_close($connection);
?>




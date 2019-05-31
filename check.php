<?php
//get all the data passed from xhr object
    $name = $_POST['name'];
    $phone=$_POST['phone'];
    $unitNumP=$_POST['unitNumP'];
    $streetNumP=$_POST['streetNumP'];
    $streetNameP=$_POST['streetNameP'];
    $suburbP=$_POST['suburbP'];
    $timeP=$_POST['timeP'];
    $dateP=$_POST['dateP'];
    $suburbD=$_POST['suburbD'];
    $status="unassigned";
    $time= date("h:i:sa");
    $date=date("Y-m-d");

//compare date time
    if($dateP>$date||$dateP<=$date&&$timeP>=$time){

        require_once("../../conf/auth.php");
        $connection = mysqli_connect("$host","$user","$pswd","$dbnm");
//        check the connections
        if ($connection === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
// get the date and time
        $combinedDT = date('Y-m-d H:i:s', strtotime("$dateP $timeP"));

//insert data into database using sql
        $sql ="INSERT INTO booking(name, phone, unitNump,streetNumP, streetNameP, suburbP, timeP ,dateP, suburbD, bookingTime, bookingDate,combined, status)
                        VALUES ('".$name."','".$phone."' , '".$unitNumP."' ,'".$streetNumP."' ,'".$streetNameP."' , '".$suburbP."' ,'".$timeP."'  , '".$dateP."'  ,'".$suburbD."' ,'".$time."', '".$date."','".$combinedDT."','".$status."')";
//execute sql query and see if it able to execute
        if (mysqli_query($connection, $sql)) {
            echo "<h2>Records added successfully.</h2>";
//get the newest data which will be the latest data fetched
            $sqlNew="SELECT  bookingNum, timeP, dateP FROM booking ORDER BY bookingNum DESC LIMIT 1  ";
            $result = $connection->query($sqlNew);
//            return booking reference
            while($row = $result->fetch_assoc()) {
                echo "<br> <h3>Thank you! Your booking reference number is : ". $row["bookingNum"]. " You will be picked up in front of your provided address at  ". $row["timeP"]. " on " . $row["dateP"] . " </h3><br>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
//        close database connection
        mysqli_close($connection);
    }else{
        echo "please check time";
    }











    ?>
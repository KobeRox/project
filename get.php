<html>
    <header>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </header>

</html>


<?php
//get database connection
require_once("../../conf/auth.php");
$connection = mysqli_connect("$host","$user","$pswd","$dbnm");
if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//get all the status is unassigned data record
    $sql="SELECT * FROM booking WHERE status = 'unassigned'; ";
    $result = $connection->query($sql);



// print out all the data as a table
    if($result-> num_rows >0){
        echo "<table class=\"table  table-dark\">
                
                    <tr>
                    <th scope='col'>Booking Number</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Phone</th>
                    <th scope='col'>Unit Number</th>
                    <th scope='col'>Street Number</th>
                    <th scope='col'>Street Name</th>
                    <th scope='col'>Suburb</th>
                    <th scope='col'>Time </th>
                    <th scope='col'>Date </th>
                    <th scope='col'>Destination Suburb</th>
                    <th scope='col'>Booking Time</th>
                    <th scope='col'>Booking Date</th>
                    <th scope='col'>Status</th>
                    </tr>
                
";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>".$row["bookingNum"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["phone"]."</td>
                        <td>".$row["unitNumP"]."</td>
                        <td>".$row["streetNumP"]. "</td>
                        <td>".$row["streetNameP"]."</td>
                        <td>".$row["suburbP"]."</td>
                        <td>".$row["timeP"]."</td>
                        <td>".$row["dateP"]."</td>
                        <td>".$row["suburbD"]."</td>
                        <td>".$row["bookingTime"]."</td>
                        <td>".$row["bookingDate"]."</td>
                        <td>".$row["status"]."</td></tr>
                ";
        }

        echo " </table> ";
    }else{
//        if no result
        echo "zero result";
    }

//close connections

mysqli_close($connection);


?>
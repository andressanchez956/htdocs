<?php
    include_once "../../dbh.php";

    $sql = "SELECT * FROM hotel ORDER BY Customernumber DESC LIMIT 1";
    $result = $conn->query($sql);
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Submitted</title>
     <!-- <link rel="stylesheet" href="../../styles.css"> -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 </head>
 <body>
     <h2 style="color: green;font-family: sans-serif;font-weight: bold;text-align: center;">Reservation submitted successfully!</h2>
     <br>
     <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th>Customer Number</th>
                <th>Room Type</th>
                <th>Number of Guests</th>
                <th>Name</th>
                <th>Email</th>
                <th>Arrival</th>
                <th>Departure</th>
                <th>Free Pickup</th>
                <th>Flight Number</th>
                <th>Other Request</th>
            </tr>
            </thead>
            <tbody> 
                <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                ?>
                        <tr>
                        <td><?php echo $row['Customernumber']; ?></td>
                        <td><?php echo $row['RoomType']; ?></td>
                        <td><?php echo $row['Numberofguests']; ?></td>
                        <td><?php echo $row['FullName']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Arrival']; ?></td>
                        <td><?php echo $row['Departure']; ?></td>
                        <td><?php echo $row['Freepickup']; ?></td>
                        <td><?php echo $row['FlightNumber']; ?></td>
                        <td><?php echo $row['Otherrequest']; ?></td>
                        </tr>                       
                <?php
                    }
                ?>                
            </tbody>
        </table>
    </div>
 </body>
 </html>
<?php
    session_start();

    include_once "../dbh.php";

    $sql = "SELECT * FROM hotel";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <?php
        if(isset($_SESSION['status'])) {
            echo '<h2 style="color: green;font-family: sans-serif;font-weight: bold">Record deleted successfully</h2>';
            unset($_SESSION['status']);
        }
    ?>    
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
                <th>Actions</th>
            </tr>
            </thead>
            <tbody> 
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
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
                            <td><a class="btn btn-info" href="../formu?edit=<?php echo $row['Customernumber']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?del=<?php echo $row['Customernumber']; ?>">Delete</a></td>
                            </tr>                       
                <?php       }
                    }
                ?>                
            </tbody>
        </table>
    </div> 
</body>
</html>
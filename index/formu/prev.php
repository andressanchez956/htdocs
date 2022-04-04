<?php 
    include_once "../dbh.php";

        if (isset($_POST['update'])) {
            $customernumber = $_POST['Customernumber'];
            $roomtype = $_POST['Roomtype'];
            $numguests = $_POST['Numberofguests'];
            $name = $_POST['FullName'];
            $email = $_POST['Email'];
            $arrival = $_POST['Arrival'];
            $departure = $_POST['Departure'];
            $freepickup = $_POST['Freepickup'];
            $flightnum = $_POST['FlightNumber'];
            $other = $_POST['Otherrequest'];

            $sql = "UPDATE `hotel` SET `RoomType`='$roomtype',`Numberofguests`='$numguests',`FullName`='$name',`Email`='$email',`Arrival`='$arrival', `Departure`='$departure', `Freepickup`='$freepickup', `FlightNumber`='$flightnum', `Otherrequest`='$other' WHERE `Customernumber`='$customernumber'"; 
            $result = $conn->query($sql); 

            if ($result == TRUE) {
                echo "Record updated successfully.";

            } else {
                echo "Error:" . $sql . "<br>" . $conn->error;
            }
        } 

    if (isset($_GET['edit'])) {
        $custNum = $_GET['edit']; 

        $sql = "SELECT * FROM `hotel` WHERE `Customernumber`='$id'";
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) {        
            while ($row = $result->fetch_assoc()) {
                $rType = $row['RoomType'];
                $numGuests = $row['Numberofguests'];
                $name = $row['FullName'];
                $mail  = $row['Email'];
                $arr = $row['Arrival'];
                $dep = $row['Departure'];
                $freePick = $row['Freepickup'];
                $flightNum = $row['FlightNumber'];
                $otherReq = $row['Otherrequest'];
            } 
        ?>

            <h2>Reservation Update Form</h2>
            <form action="" method="post">

            <fieldset>
                <legend>Enter your information:</legend>
                Room Type:<br>
                <input type="text" name="rType" value="<?php echo $rType; ?>">
                <input type="hidden" name="custNum" value="<?php echo $custNum; ?>">
                <br>
                Number of Guests:<br>
                <input type="text" name="numGuests" value="<?php echo $numGuests; ?>">
                <br>
                Full Name:<br>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <br>
                Email:<br>
                <input type="email" name="mail" value="<?php echo $mail; ?>">
                <br>
                Arrival:<br>
                <input type="datetime" name="arr" value="<?php echo $arr; ?>">
                <br>
                Departure:<br>
                <input type="datetime" name="dep" value="<?php echo $dep; ?>">
                <br>
                Free pickup?:<br>
                <input type="radio" name="freePick" value="yes" <?php if($freePick == 'yes'){ echo "checked";} ?>>Yes, Sure!
                <input type="radio" name="freePick" value="no" <?php if($freePick == 'no'){ echo "checked";} ?>>No, I already rented a car.
                <br>
                Flight  Number:<br>
                <input type="text" name="flightNum" value="<?php echo $flightNum; ?>">
                <br>
                Other Requests:<br>
                <input type="text" name="otherReq" value="<?php echo $otherReq; ?>">
                <br><br>
                <input type="submit" value="Update" name="update">
            </fieldset>
            </form> 
            </body>
            </html> 

        <?php
        } else { 
            header('Location: index.php?update=success');
        } 
    }
?> 
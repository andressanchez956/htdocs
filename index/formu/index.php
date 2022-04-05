<?php 
    include_once "../dbh.php";

    if (isset($_POST['update'])) {
        $customernumber = $_POST['Customernumber'];
        $roomtype = $_POST['room-type'];
        $numguests = $_POST['num-guests'];
        $name = $_POST['fname'] . ' ' . $_POST['lname'];
        $email = $_POST['mail'];

        $arrival = $_POST['arrivalDate'] . ' ' . $_POST['arrivalTime'];
        $departure = $_POST['departureDate'] . ' ' . $_POST['departureTime'];

        $freepickup = $_POST['pickup'];
        $flightnum = $_POST['flightNum'];

        if (!$_POST['other']) {
            $other = 'N/A';
        } else {
            $other = $_POST['other'];
        }

        $sql = "UPDATE `hotel` SET `RoomType`='$roomtype',`Numberofguests`='$numguests',`FullName`='$name',`Email`='$email',`Arrival`='$arrival', `Departure`='$departure', `Freepickup`='$freepickup', `FlightNumber`='$flightnum', `Otherrequest`='$other' WHERE `Customernumber`='$customernumber'"; 
        $result = $conn->query($sql); 

        if ($result == TRUE) { 
?>
            <h2 style="color:green;font-family: sans-serif">Reservation updated successfully</h2>

<?php   } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 

    if (isset($_GET['edit'])) {
        $custNum = $_GET['edit']; 

        $sql = "SELECT * FROM `hotel` WHERE `Customernumber`='$custNum'";
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) {        
            while ($row = $result->fetch_assoc()) {
                $rType = $row['RoomType'];
                $numGuests = $row['Numberofguests'];

                $name = explode(' ', $row['FullName']);
                $fname = $name[0];
                $lname = $name[1];

                $mail  = $row['Email'];

                $arr_datetime = explode(' ', $row['Arrival']);
                $arr_date = $arr_datetime[0];
                $arr_time = $arr_datetime[1];
                
                $dep_datetime = explode(' ', $row['Departure']);
                $dep_date = $dep_datetime[0];
                $dep_time = $dep_datetime[1];

                $freePick = $row['Freepickup'];
                $flightNum = $row['FlightNumber'];
                $otherReq = $row['Otherrequest'];
            } 
?>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Reservations</title>
                <link rel="stylesheet" href="../styles.css">

                <script>
                    function validateForm(doc) {
                        if (doc.fname.value == "") {
                            alert("Please enter your first name.");
                            doc.fname.focus();
                            return false;
                        }
                        if (doc.lname.value == "") {
                            alert("Please enter your last name.");
                            doc.lname.focus();
                            return false;
                        }
                        if (doc.mail.value == "") {
                            alert("Please enter your email.");
                            doc.mail.focus();
                            return false;
                        }
                        if (!doc.arrivalDate.value) {
                            alert("Please enter your arrival date.");
                            doc.arrivalDate.focus();
                            return false;
                        }
                        if (!doc.arrivalTime.value) {
                            alert("Please enter your arrival time.");
                            doc.arrivalTime.focus();
                            return false;
                        }
                        if (!doc.departureDate.value) {
                            alert("Please enter your departure date.");
                            doc.departureDate.focus();
                            return false;
                        }
                        if (!doc.departureTime.value) {
                            alert("Please enter your departure time.");
                            doc.departureTime.focus();
                            return false;
                        }

                        var checked_pickup = doc.querySelector('input[name = "pickup"]:checked');
                        if(checked_pickup == null) {
                            alert('Please select a pickup option');
                            return false;
                        }

                        if (doc.flightNum.value == "") {
                            alert("Please enter your flight number.");
                            doc.flightNum.focus();
                            return false;
                        }
                    }
                </script>
            </head>
            <body>
                <form onsubmit="return validateForm(this);" action="" method="POST">
                    <h1>Update Hotel Booking</h1>
                    <ul>
                        <li>
                            <label for="room-type">Room Type *</label>
                            <select required name="room-type" id="room-type">
                                <option value="<?php echo $rType; ?>"><?php echo $rType; ?></option>
                                <option value="King">King</option>
                                <option value="Queen">Queen</option>
                                <option value="Twin">Twin</option>
                                <option value="Penthouse">Penthouse</option>
                            </select>
                        </li>
                        <input type="hidden" name="Customernumber" value="<?php echo $custNum; ?>">
                        <li>
                            <label for="num-guests">Number of Guests *</label>
                            <select required name="num-guests" id="num-guests">
                                <option value="<?php echo $numGuests; ?>"><?php echo $numGuests; ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </li>
                        <li>
                            <label>Name *</label>
                            <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">
                            <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>">
                        </li>
                        <li>
                            <label for="mail">Email *</label>
                            <input type="email" name="mail" id="mail" value="<?php echo $mail; ?>">
                        </li>
                        <li>
                            <label>Arrival *</label>
                            <input type="date" name="arrivalDate" id="arrival-date" value="<?php echo $arr_date; ?>">
                            <input type="time" name="arrivalTime" id="arrival-time" value="<?php echo $arr_time; ?>">
                        </li>
                        <li>
                            <label>Departure *</label>
                            <input type="date" name="departureDate" id="departure-date" value="<?php echo $dep_date; ?>">
                            <input type="time" name="departureTime" id="departure-time" value="<?php echo $dep_time; ?>">
                        </li>
                        <li>
                            <label for="pickup">Free Pickup *</label>
                            <input type="radio" name="pickup" id="yes" value="yes" <?php if($freePick == 'yes'){ echo "checked";} ?>>
                                <label for="yes">Yes, Sure!</label>
                            <br>
                            <input type="radio" name="pickup" id="no" value="no" <?php if($freePick == 'no'){ echo "checked";} ?>>
                                <label for="no">No, I already rented a car.</label>                
                        </li>
                        <li>
                            <label for="flightNum">Flight Number *</label>
                            <input type="text" name="flightNum" id="flight-num" value="<?php echo $flightNum; ?>">
                        </li>
                        <li>
                            <label for="other" id="otherLabel">Other requests</label>
                            <input type="text" name="other" id="other" value="<?php echo $otherReq; ?>">
                        </li>
                        <li class="button">
                            <button type="submit" value="Update" name="update">Update Reservation</button>
                        </li>
                    </ul>
                </form>
            </body>
            </html>
     
<?php   } else { 
            header('Location: index/formv');
        } 
    }
?>
<?php
    session_start();
    include_once "../dbh.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php
        if(isset($_SESSION['status'])) {
            echo '<h2 style="color:green;font-family: sans-serif">Reservation submitted successfully</h2>';
            unset($_SESSION['status']);
        }
    ?>
    <form action="submit_res.php" method="POST">
        <h1>Hotel Booking</h1>
        <ul>
            <li>
                <label for="room-type">Room Type *</label>
                <select required name="room-type" id="room-type">
                    <option value="">Please Select</option>
                    <option value="King">King</option>
                    <option value="Queen">Queen</option>
                    <option value="Twin">Twin</option>
                    <option value="Penthouse">Penthouse</option>
                </select>
            </li>
            <li>
                <label for="num-guests">Number of Guests *</label>
                <select required name="num-guests" id="num-guests">
                    <option value="">Please Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </li>
            <li>
                <label>Name *</label>
                <input type="text" name="fname" id="fname" placeholder="First">
                <input type="text" name="lname" id="lname" placeholder="Last">
            </li>
            <li>
                <label for="mail">Email *</label>
                <input type="email" name="mail" id="mail" placeholder="john@company.com">
            </li>
            <li>
                <label>Arrival *</label>
                <input type="date" name="arrival-date" id="arrival-date">
                <input type="time" name="arrival-time" id="arrival-time">
            </li>
            <li>
                <label>Departure *</label>
                <input type="date" name="departure-date" id="departure-date">
                <input type="time" name="departure-time" id="departure-time">
            </li>
            <li>
                <label for="pickup">Free Pickup *</label>
                <input type="radio" name="pickup" id="yes" value="yes">
                    <label for="yes">Yes, Sure!</label>
                <br>
                <input type="radio" name="pickup" id="no" value="no">
                    <label for="no">No, I already rented a car.</label>               
            </li>
            <li>
                <label for="flight-num">Flight Number *</label>
                <input type="text" name="flight-num" id="flight-num" placeholder="C1209">
            </li>
            <li>
                <label for="other" id="otherLabel">Other requests</label>
                <input type="text" name="other" id="other">
            </li>
            <li class="button">
                <button type="submit">Complete Reservation</button>
            </li>
        </ul>
    </form>
</body>
</html>
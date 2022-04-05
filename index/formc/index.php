<?php
    include_once "../dbh.php";
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
    <form onsubmit="return validateForm(this)" action="submit_res.php" method="POST">
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
                <input type="date" name="arrivalDate" id="arrival-date">
                <input type="time" name="arrivalTime" id="arrival-time">
            </li>
            <li>
                <label>Departure *</label>
                <input type="date" name="departureDate" id="departure-date">
                <input type="time" name="departureTime" id="departure-time">
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
                <input type="text" name="flightNum" id="flight-num" placeholder="C1209">
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
<?php
    include_once '../dbh.php';

    $roomtype = $_POST['room-type'];
    $numguests = $_POST['num-guests'];
    $name = $_POST['fname'] . ' ' . $_POST['lname'];
    $email = $_POST['mail'];

    $arrival_date = $_POST['arrivalDate'];
    $departure_date = $_POST['departureDate'];
    $arrival_time = $_POST['arrivalTime'];
    $departure_time = $_POST['departureTime'];

    $arrival = date('Y-m-d H:i:s', strtotime("$arrival_date $arrival_time"));
    $departure = date('Y-m-d H:i:s', strtotime("$departure_date $departure_time"));

    $freepickup = $_POST['pickup'];
    $flightnum = $_POST['flightNum'];

    if (!$_POST['other']) {
        $other = 'N/A';
    } else {
        $other = $_POST['other'];
    }

    $sql = "INSERT INTO hotel (RoomType, Numberofguests, FullName, Email, Arrival, Departure, Freepickup, FlightNumber, Otherrequest) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt, "sssssssss", $roomtype, $numguests, $name, $email, $arrival, $departure, $freepickup, $flightnum, $other);
        mysqli_stmt_execute($stmt);

        header("Location: formsuccess");
    }
    
    $conn->close();

    
?>
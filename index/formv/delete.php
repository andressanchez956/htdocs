<?php 
session_start();

include_once "../dbh.php"; 

if (isset($_GET['del'])) {
    $custNum = $_GET['del'];
    $sql = "DELETE FROM `hotel` WHERE `Customernumber`='$custNum'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        $_SESSION['status'] = TRUE;
        header('Location: ../formv');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 
?>


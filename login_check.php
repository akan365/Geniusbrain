<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "project";

$connect = mysqli_connect($host, $username, $password, $db);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set("Africa/Kampala");
$time = date("H:i:s");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='" . $user . "' AND password ='" . $pass . "' ";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['username'] = $user;
        if (empty($row['recored_time'])) {
            $updatedquery = "UPDATE user SET recored_time='" . $time . "' WHERE username='" . $user . "'";
            if (mysqli_query($connect, $updatedquery)) {
                echo "First login successful. " . $row['username'];
                echo "<br><a href='logout.php'>LOG OUT</a></br>";
            } else {
                echo "Error updating recorded time: " . mysqli_error($connect);
            }
        }
        elseif (empty($row['recored_time_2'])) {
            $updatequery = "UPDATE user SET recored_time_2='" . $time . "' WHERE username='" . $user . "'";
            if (mysqli_query($connect, $updatequery)) {
                echo "Second login successful.";
                echo "<br><a href='home.php'>Go to Home page</a></br>";

                $firstlogintime=$row['recored_time'];
                $secondlogintime=$time;
                $time1=strtotime($firstlogintime);
                $time2=strtotime($secondlogintime);
                $timediff=$time2-$time1;

                $hours=round($timediff/3600,4);
                $minutes=round(($timediff/3600)/60,4);
                $seconds=$timediff;

                echo "Hours spent working: ".$hours. " Minutes: ".$minutes. " Seconds: ".$seconds;

            } else {
                echo "Error updating recorded time: " . mysqli_error($connect);
            }
        }
        else {
            $resetQuery = "UPDATE user SET recored_time=NULL, recored_time_2=NULL WHERE username='" . $user . "'";
            if (mysqli_query($connect, $resetQuery)) {
                echo "<br>Login times have been reset.";
                echo "<br><a href='log_in.php'>LOG IN</a></br>";
            } else {
                echo "Error resetting recorded times: " . mysqli_error($connect);
            }
        }
    } else {
        echo "Invalid login details.";
    }
}
?>

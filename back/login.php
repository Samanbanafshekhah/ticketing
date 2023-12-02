<?php
require_once "DBHost.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ticketing";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM user WHERE username= '$username' AND password= '$password'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        header("location: success.html");
        exit();
    } else {
        header("location: error.html");
        exit();
    }

    $conn->close();
}



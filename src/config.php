<?php

$conn = mysqli_connect("hostname", "username", "password", "dbname");

if ($conn) {
    // echo "connected";
} else {
    echo "not connected";
}

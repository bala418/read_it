<?php

$conn = mysqli_connect("localhost", "root", "", "reddit");

if ($conn) {
    // echo "connected";
} else {
    echo "not connected";
}

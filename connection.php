<?php

$conn = new mysqli("localhost", "root", "", "banner");
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}
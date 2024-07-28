<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $firstname = $data["firstname"];
    $age = $data["age"];
    $favoritePet = $data["favoritePet"];

    echo "These are the data that you send";
    echo "<br>";
    echo $firstname;
    echo "<br>";
    echo $age;
    echo "<br>";
    echo $favoritePet;

    header("Location: ../index.php");
}
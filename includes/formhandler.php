<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $firstname = $data["firstname"];
    $age = $data["age"];
    $favoritePet = $data["favoritePet"];

    try {
        require_once "dbh.php";

        $query = "INSERT INTO  users(firstname, age, favoritePet) VALUES(:firstname, :age, :favoritePet);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":favoritePet", $favoritePet);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    header("Location: ../index.php");
}
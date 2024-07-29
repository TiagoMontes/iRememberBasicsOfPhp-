<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $firstname = $data["firstname"];
    $age = $data["age"];
    $favoritePet = $data["favoritePet"];

    $lowerCaseFirstname = strtolower($firstname);
    if(!(preg_match('/us$/', $lowerCaseFirstname) === 1)){
        echo "<img src='../assets/explosion.jpg' alt='this is a explosion, i told you'/>";
        echo "<br>";
        echo "<h1>I TOLD YOU</h1>";

        echo ">return</button>";

        die();
    }

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

        header("Location: ../pages/index.php");

        die();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    header("Location: ../pages/index.php");
}
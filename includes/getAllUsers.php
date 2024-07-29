<?php
    global $pdo;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            require_once "dbh.php";

            $query = "SELECT * FROM users";

            $stmt = $pdo->prepare($query);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pdo = null;
            $stmt = null;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        header("Location: ../pages/index.php");
    }
?>
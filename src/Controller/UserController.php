<?php
namespace App\Controller;

use App\Entity\User;
use Config\DBConnection\Database;
use PDOException;

class UserController {
    public function handleFormSubmission() {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitForm'])) {
                $firstname = $_POST['firstname'];
                $age = $_POST['age'];
                $favoritePet = $_POST['favoritePet'];

                $lowerCaseFirstname = strtolower($firstname);
                if (!(preg_match('/us$/', $lowerCaseFirstname) === 1)) {
                    header("Location: ../../myWebsite/pages/explosion.php");
                    die();
                }

                $user = new User();
                $user->setFirstname($lowerCaseFirstname);
                $user->setAge($age);
                $user->setFavoritePet($favoritePet);

                // Database connection
                $database = new Database();
                $pdo = $database->getPdo();

                // Prepare the query
                $query = "INSERT INTO users (firstname, age, favoritePet) VALUES (:firstname, :age, :favoritePet)";
                $stmt = $pdo->prepare($query);

                // Bind parameters
                $firstnameValue = $user->getFirstname();
                $ageValue = $user->getAge();
                $favoritePetValue = $user->getFavoritePet();
                $stmt->bindParam(":firstname", $firstnameValue);
                $stmt->bindParam(":age", $ageValue);
                $stmt->bindParam(":favoritePet", $favoritePetValue);

                // Execute the statement
                $stmt->execute();

                // Close the connection
                $pdo = null;
                $stmt = null;

                // Output the results
                header("Location: ../../myWebsite/pages/index.php");
                die();
        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

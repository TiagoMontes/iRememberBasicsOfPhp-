<?php
namespace App\Controller;

use App\Entity\User;
use Config\DBConnection\Database;

class UserController {
    public function handleFormSubmission()
    {
        try {
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

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllUsers()
    {
        try {
            $database = new Database();
            $pdo = $database->getPdo();

            // Prepare the query
            $query = "SELECT * FROM users";
            $stmt = $pdo->prepare($query);

            // execute the query
            $stmt->execute();

            // get result of query
            $result = $stmt->fetchAll();

            $pdo = null;
            $stmt = null;

            return $result;
        } catch (\Exception $e) {
            return throw new \Exception($e->getMessage());
        }
    }
}

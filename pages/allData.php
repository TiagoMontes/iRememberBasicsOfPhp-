<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List all data</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>
<body>
    <main>
        <?php

        use App\Controller\UserController;

        require_once "../src/Controller/UserController.php";

        $userController = new UserController();
        $allUsers = $userController->getAllUsers();

//        TODO - use this to print the array
//        foreach($result as $row){
//            echo '<pre>';print_r($row); echo '</pre>';
//        }


        if(empty($allUsers)){
            echo "<div>";
            echo "<h1>there are no results!</h1>";
            echo "</div>";
        }

        if(!empty($allUsers)){
            echo "<div>";
            echo "<table id='table-users'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Firstname</th>";
            echo "<th>Age</th>";
            echo "<th>Favorite Pet</th>";

            echo "</tr>";
            foreach($allUsers as $row){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['favoritePet'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>

        <form action="index.php" method="POST">
            <button>Return</button>
        </form>
    </main>

</body>
</html>
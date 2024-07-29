<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>
<body>
    <main>
        <h1>Don't worry! This is a simple form, i will not steal your data... I think</h1>
        <p>Your firstname must have the ending -us</p>

        <form id="initial-form" action="../includes/formhandler.php" method="POST">
            <label for="firstname">
                <input
                    id="firstname"
                    name="firstname"
                    type="text"
                    placeholder="What is your firstname?"
                />
            </label>

            <label for="age">
                <input
                    id="age"
                    name="age"
                    type="number"
                    placeholder="What is your age?"
                />
            </label>

            <label for="favoritePet">
                <select id="favoritePet" name="favoritePet">
                    <option value="cat" selected>cat</option>
                    <option value="dog">dog</option>
                    <option value="capybara">capybara</option>
                </select>
            </label>

            <button type="submit" name="submitForm">Submit</button>
        </form>

        <form action="allData.php" method="POST">
            <button>view all data</button>
        </form>
    </main>

</body>
</html>
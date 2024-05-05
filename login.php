<?php
session_start();

$users = [
    [
        'username' => 'admin',
        'password' => 'admin123'
    ],
    [
        'username' => 'user',
        'password' => 'user123'
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loggedIn = false;
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $loggedIn = true;
            break;
        }
    }

    if ($loggedIn) {
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit();
    } else {
        $error = "Credenziali non valide. Riprova.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid red;
        }

        .container {
            height: 450px;
            width: 350px;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            gap: 30px;
            border-radius: 10px;
            background-color: #244855;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        h2 {
           font-size: 50px;
           color: #FBE9D0;
        }

        label {
            color: #FBE9D0;
            font-size: 20px;
        }

        input {
            border: none;
            height: 30px;
            width: 200px;
            border-radius: 10px;
        }

        button {
            background-color: #E64833;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 15px;


        }


    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
        <h2>Login</h2>
            <?php if (isset($error)) { ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php } ?>
            <form method="post">
                <div>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Accedi</button>
            </form>
        </div>
    </div>
</body>

</html>
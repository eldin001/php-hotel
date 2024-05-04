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
    <title>Login</title>
</head>
<body>
    <h2>Accesso</h2>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Accedi</button>
    </form>
</body>
</html>

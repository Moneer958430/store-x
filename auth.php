<?php

session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=storexdb;charset=utf8",
            "root",
            null
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM auth WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":password", sha1($password));
        $stmt->execute();
        //echo $stmt->fetch();
        if ($stmt->fetch()) {
            $_SESSION["user"] = $username;

            header("Location: index.php");
        }
    } catch (PDOException $e) {
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Store X</title>
</head>

<body>
    <main class="login-container">
        <form action="" method="post">
            <label for="username">Username</label>
            <br/>
            <input type="text" name="username" required />
            <br />
            <label for="password">Password</label>
            <br/>
            <input type="password" name="password" required />
            <br/>
            <input type="submit" name="submit" value="Submit" />
        </form>
    </main>
</body>

</html>
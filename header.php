<?php 
    session_start();

    if (isset($_GET["logout"]) && $_GET["logout"] == "true") {
        unset($_SESSION["user"]);
    }

    if (!isset($_SESSION["user"])) {
        header("Location: auth.php");
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
    <?php include_once "utils.php"; ?>
    <?php include_once "db.php"; ?>

    <div class="container">

        <header>
            <h2 class="title">Store X Dashboard</h2>
            <a href="?logout=true" class="logout">Log out</a>
        </header>

        <main class="flex">

            <div class="column-sidebar">
                <ul>
                    <li><a href="items.php" class="menu-item">Items</a></li>
                    <li><a href="customers.php" class="menu-item">Customers</a></li>
                    <li><a href="transactions.php" class="menu-item">Transactions</a></li>
                </ul>
            </div>

            <div class="column-main">
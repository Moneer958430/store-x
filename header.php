<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Store X</title>
</head>

<body>
    <?php include_once "db.php"; ?>

    <div class="container">

        <header>
            <h2>Store X Dashboard</h2>
        </header>

        <main class="flex">

            <div class="column-sidebar">
                <ul>
                    <li><a href="items.php">Items</a></li>
                    <li><a href="customers.php">Customers</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                </ul>
            </div>

            <div class="column-main">
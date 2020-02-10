<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=storexdb;charset=utf8",
            "root", null);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 
            "CREATE TABLE IF NOT EXISTS item (" .
                "ID INT AUTO_INCREMENT PRIMARY KEY," .
                "Name VARCHAR(255) NOT NULL," .
                "Price DOUBLE NOT NULL" .
            ");" .
            
            "CREATE TABLE IF NOT EXISTS customer (" .
                "ID INT AUTO_INCREMENT PRIMARY KEY," .
                "Name VARCHAR(255) NOT NULL," .
                "Email VARCHAR(255) NULL," .
                "Phone VARCHAR(255) NOT NULL" .
            ");" .
            
            "CREATE TABLE IF NOT EXISTS transaction (" .
                "ID INT AUTO_INCREMENT PRIMARY KEY," .
                "CustomerID INT," .
                "timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP," .
                "FOREIGN KEY (CustomerID)" .
                    "REFERENCES customer (ID)" .
            ");".
            
            "CREATE TABLE IF NOT EXISTS transaction_entry (" .
                "ID INT AUTO_INCREMENT PRIMARY KEY," .
                "TransactionID INT," .
                "ItemID INT," .
                "Quantity INT NOT NULL," .
                "FOREIGN KEY (TransactionID)" .
                    "REFERENCES transaction (ID)," .
                "FOREIGN KEY (ItemID)" .
                    "REFERENCES item (ID)" .
            ");";
        $pdo->exec($sql);
        $output = "Database connection established.";
    } catch (PDOException $e) {
        $output = "Unable to connect ot he database server: " . $e->getMessage();
    }
    // echo $output;
?>


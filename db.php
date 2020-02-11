<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=storexdb;charset=utf8",
            "root", null);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE IF NOT EXISTS item (";
        $sql .= " ID INT AUTO_INCREMENT PRIMARY KEY,";
        $sql .= " Name VARCHAR(255) NOT NULL,";
        $sql .= " Price DOUBLE NOT NULL";
        $sql .= " );";
        $sql .= "CREATE TABLE IF NOT EXISTS customer (";
        $sql .= " ID INT AUTO_INCREMENT PRIMARY KEY,";
        $sql .= " Name VARCHAR(255) NOT NULL,";
        $sql .= " Email VARCHAR(255) NULL,";
        $sql .= " Phone VARCHAR(255) NOT NULL";
        $sql .= " );";
        $sql .= "CREATE TABLE IF NOT EXISTS transaction (";
        $sql .= " ID INT AUTO_INCREMENT PRIMARY KEY,";
        $sql .= " CustomerID INT,";
        $sql .= " timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,";
        $sql .= " FOREIGN KEY (CustomerID) REFERENCES customer (ID)";
        $sql .= " );";
        $sql .= "CREATE TABLE IF NOT EXISTS transaction_entry (";
        $sql .= " ID INT AUTO_INCREMENT PRIMARY KEY,";
        $sql .= " TransactionID INT,";
        $sql .= " ItemID INT,";
        $sql .= " Quantity INT NOT NULL,";
        $sql .= " FOREIGN KEY (TransactionID) REFERENCES transaction (ID),";
        $sql .= " FOREIGN KEY (ItemID) REFERENCES item (ID)";
        $sql .= " );";
        
        $pdo->exec($sql);
        $output = "Database connection established.";
    } catch (PDOException $e) {
        $output = "Unable to connect ot he database server: " . $e->getMessage();
    }
    // echo $output;
?>


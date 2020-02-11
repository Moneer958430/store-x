<?php include_once "header.php"; ?>
<?php
try {
    $sql = "SELECT transaction.ID as ID, customer.Name as Name, transaction.timestamp as DateTime,"; 
    $sql .= " SUM(transaction_entry.Quantity * item.Price) as Total";
    $sql .= " FROM transaction, customer, transaction_entry, item"; 
    $sql .= " WHERE transaction.CustomerID = customer.ID AND";
    $sql .= " transaction_entry.TransactionID = transaction.ID AND transaction_entry.ItemID = item.ID";
    $sql .= " GROUP BY transaction.ID";

    $result = $pdo->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<table>
    <tr>
        <th>Date/Time</th>
        <th>Customer</th>
        <th>Total</th>
    </tr>

    <?php
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo  "<td>" . rinse($row["DateTime"]) . "</td>";
        echo  "<td>" . rinse($row["Name"]) . "</td>";
        echo  "<td>" . rinse($row["Total"]) . "</td>";
        echo  "<td><a href='transaction_details.php?ID=" . $row["ID"] . "'>Details</a></td>";
        echo "</tr>";
    }
    ?>

</table>
    <?php include_once "footer.php"; ?>
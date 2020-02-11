<?php include_once "header.php"; ?>
<?php
if (!isset($_GET["ID"])) {
}
try {
    $sqlItem = "SELECT item.Name as Name, Item.Price as Price, transaction_entry.Quantity as Quantity,";
    $sqlItem .= " (transaction_entry.Quantity * item.Price) as Total";
    $sqlItem .= " FROM transaction_entry, item, transaction";
    $sqlItem .= " WHERE transaction_entry.ItemID = item.ID AND transaction_entry.TransactionID = transaction.ID";
    $sqlItem .= " AND transaction.ID = :id";

    $stmtItem = $pdo->prepare($sqlItem);
    $stmtItem->bindValue(":id", $_GET["ID"]);
    $stmtItem->execute();

    $sqlCustomer = "SELECT customer.Name as Name, customer.Email as Email, customer.Phone as Phone,";
    $sqlCustomer .= " transaction.timestamp as DateTime";
    $sqlCustomer .= " FROM transaction, customer";
    $sqlCustomer .= " WHERE transaction.CustomerID = customer.ID AND transaction.ID = :id";

    $stmtCustomer = $pdo->prepare($sqlCustomer);
    $stmtCustomer->bindValue(":id", $_GET["ID"]);
    $stmtCustomer->execute();
    $customer = $stmtCustomer->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<div>
    <p><b>Date: </b><?php echo rinse($customer["DateTime"]) ?></p>
    <p><b>Customer: </b><?php echo rinse($customer["Name"]) ?></p>
    <?php if ($customer["Email"] !== NULL) : ?>
        <p><b>Email: </b><?php echo rinse($customer["Email"]) ?></p>
    <?php endif; ?>
    <p><b>Phone: </b><?php echo rinse($customer["Phone"]) ?></p>
</div>

<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>

    <?php
    while ($row = $stmtItem->fetch()) {
        echo "<tr>";
        echo  "<td>" . rinse($row["Name"]) . "</td>";
        echo  "<td>" . rinse($row["Price"]) . "</td>";
        echo  "<td>" . rinse($row["Quantity"]) . "</td>";
        echo  "<td>" . rinse($row["Total"]) . "</td>";
        echo "</tr>";
    }
    ?>

</table>
<?php include_once "footer.php"; ?>
<?php include_once "header.php"; ?>
<?php
try {
    $sql = "SELECT * FROM item";
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<a href="item.php" class="create">Create</a>
<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
    </tr>

    <?php
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo  "<td>" . rinse($row["Name"]) . "</td>";
        echo  "<td>" . rinse($row["Price"]) . "</td>";
        echo  "<td><a href='item.php?ID=" . $row["ID"] . "'>Edit/Delete</a></td>";
        echo "</tr>";
    }
    ?>

</table>
    <?php include_once "footer.php"; ?>
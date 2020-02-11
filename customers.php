<?php include_once "header.php"; ?>

<?php
try {
    $sql = "SELECT * FROM customer";
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

    <?php
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo  "<td>" . $row["Name"] . "</td>" ;
        echo  "<td>" . $row["Email"] . "</td>" ;
        echo  "<td>" . $row["Phone"] . "</td>" ;
        echo "</tr>";
    }
    ?>

</table>

<?php include_once "footer.php"; ?>
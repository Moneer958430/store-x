<?php include_once "header.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["ID"])) {
        $id = $_GET["ID"];
    }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["name"]) && isset($_POST["price"])) {
        $sql = "UPDATE item SET name = :name, price = :price WHERE ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $_POST["ID"]);
        $stmt->bindValue(":name", $_POST["name"]);
        $stmt->bindValue(":price", $_POST["price"]);
        $stmt->execute();

        header("Location: items.php");
    } else if (isset($_POST["name"]) && isset($_POST["price"])) {
        $sql = "INSERT INTO item SET name = :name, price = :price";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":name", $_POST["name"]);
        $stmt->bindValue(":price", $_POST["price"]);
        $stmt->execute();

        header("Location: items.php");
    } else if (isset($_POST["ID"])) {
        $sql = "DELETE FROM item WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $_POST["ID"]);
        $stmt->execute();

        header("Location: items.php");
    }
}
?>

<form action="" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" required />
    <br />
    <lable for="price">Price</lable>
    <input type="text" name="price" required />
    <br />
    <?php if (isset($id)) : ?>
        <input type="hidden" name="ID" value="<?php echo $id ?>" />
    <?php endif; ?>
    <input type="submit" name="submit" value="Submit" />
</form>

<?php if (isset($id)) : ?>
    <form action="" method="post">
        <input type="hidden" name="ID" value="<?php echo $id ?>" />
        <input type="submit" name="delete" value="Delete" class="delete" />
    </form>
<?php endif; ?>


<?php include_once "footer.php"; ?>
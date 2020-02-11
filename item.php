<?php include_once "header.php"; ?>

<?php
if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "SELECT * FROM item WHERE ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["ID"])) {
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
        try {
            $sql = "DELETE FROM item WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $_POST["ID"]);
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() === "23000") {
                echo "<script>alert('You cannt delete this item because it is listed in existing transactions.');</script>";
                $prevent = true;
            }
        }


        if ($prevent !== true) {
            header("Location: items.php");
        }
    }
}
?>

<form action="" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo isset($id) === true ? $result["Name"] : '' ?>" required />
    <br />
    <lable for="price">Price</lable>
    <input type="number" name="price" value="<?php echo isset($id) === true ? $result["Price"] : '' ?>" required />
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
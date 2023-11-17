<?php
/** @var $pdo PDO */
require_once "../../database.php";

$id = $_GET['id'] ?? '';
$statement = $pdo->prepare("DELETE FROM products_crud_2 WHERE id = :id;");
$statement->bindValue(':id', $id);
$statement->execute();
?>
<?php include_once "../../views/partials/header.php"; ?>
    <?php
    $statement = $pdo->prepare("SELECT * FROM products_crud_2;");
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="products-section">
        <div class="products-content container">
            <div class="products-list">
                <h3>Selecciona un producto para eliminar</h3>
                <ul class="list-group products">
                    <?php foreach ($products as $product): ?>
                        <?php echo '<a href="delete.php?id='.$product["id"].'"><li class="list-group-item product-item">'.$product["title"].'</li></a>'; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php include_once "../../views/partials/footer.php";?>
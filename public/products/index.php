<?php
/** @var $pdo PDO */
require_once "../../database.php";

$statement = $pdo->prepare('SELECT * FROM products_crud_2 ORDER BY rate DESC;');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include_once "../../views/partials/header.php"; ?>
    <section class="products-section">
        <div class="products-content container">
            <div class="swiper products-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $product): ?>
                    <div class="swiper-slide">
                        <div class="card" style="width: 18rem;">
                            <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['title'] ?></h5>
                                <p class="card-text"><?= $product['description'] ?></p>
                                <div class="price-container">
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                    <h4><?= number_format($product['price'], 2, '.', ',') ?></h4>
                                </div>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php include_once "../../views/partials/footer.php";?>
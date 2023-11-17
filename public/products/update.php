<?php
/** @var $pdo PDO */
require_once "../../database.php";

$id = $_GET['id'] ?? '';

$images_path = 'images';
$title =  '';
$description = '';
$price = 0;
$rate = 0;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edit_product = getEditProduct(false) ?? '';
    # Obtengo la información del formulario por POST
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $rate = $_POST['rate'] ?? '';
    $image = $_FILES['image'] ?? null;
    $id = $_POST['id'];
//    echo "<pre>";
//    print_r($title);
//    print_r($description);
//    print_r($price);
//    print_r($rate);
//    echo "<pre>";
//    exit;

    # Valido campos vacíos
    if(empty($title)) $title = $edit_product['title'];
    if(empty($description)) $description = $edit_product['description'];
    if(empty($price)) $price = $edit_product['price'];
    if(empty($rate)) $rate = $edit_product['rate'];
    # Valido la calificación dada, que no exceda las 5 estrellas y que no sean menor a 0
    if(empty($rate) || $rate < 0) $rate = 0;
    if($rate > 5) $rate = 5;

    # Verifico si existe la carpeta de imagenes
    if(!is_dir($images_path)) mkdir($images_path);
    $path = '';
    if($image){
        if($image['name']) {
            # Si se cargó una imagen en el servidor, borramos la imagen actual y su carpeta
            unlink($edit_product['image']);
            if($edit_product['image'] !== 'images/empty.jpg') {
                rmdir(dirname($edit_product['image']));
            }
            $new_dir_path = $images_path.'/'.getRandomString(8);
            mkdir($new_dir_path);
            $path = $new_dir_path.'/'.$image['name'];
            move_uploaded_file($image['tmp_name'], $path);
        }
    }
    else $path = $edit_product['image'];
    if($id){
        $statement = $pdo->prepare('UPDATE products_crud_2 SET 
                           title = :title, 
                           description = :description, 
                           image = :image, 
                           price = :price, 
                           rate = :rate WHERE id = :id;');
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':image', $path);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':rate', $rate);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}

function getRandomString($n) {
    $str = '';
    $letters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < $n; $i++) $str .= $letters[rand(0, strlen($letters) - 1)];
    return $str;
}

function getEditProduct($method) {
    global $pdo;
    $id = $method ? $_GET['id'] : $_POST['id'];
    $statement = $pdo->prepare("SELECT * FROM products_crud_2 WHERE id = :id;");
    $statement->bindValue(':id', $id);
    $statement->execute();
    $edit_product = $statement->fetch(PDO::FETCH_ASSOC);
    return $edit_product;
}

?>
<?php include_once "../../views/partials/header.php"; ?>
    <?php
          $statement = $pdo->prepare("SELECT * FROM products_crud_2;");
          $statement->execute();
          $products = $statement->fetchAll(PDO::FETCH_ASSOC);
          if($id) $_product = getEditProduct(true);
          ?>
    <section class="products-section">
        <div class="products-content container">
            <div class="edit-container">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <h2>Selecciona un producto para editar</h2>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Sube una imagen para tu producto</label>
                        <input  name="image" class="form-control form-control-sm" id="formFileSm" type="file" <?php if(!$id) echo 'disabled'; ?>>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input value="<?= $_product['title'] ?? '' ?>" name="title" type="text" class="form-control" id="title" placeholder="Título de ejemplo" <?php if(!$id) echo 'disabled'; ?>>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Este es un producto 👍" <?php if(!$id) echo 'disabled'; ?>><?= $_product['description'] ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input value="<?= $_product['price'] ?? '' ?>" name="price" type="number" class="form-control" id="price" min="0" value="0" <?php if(!$id) echo 'disabled'; ?>>
                    </div>
                    <div class="mb-3">
                        <label for="rate" class="form-label">Calificación</label>
                        <div class="rate-container">
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <input value="<?= $_product['rate'] ?? '' ?>" name="rate" type="number" class="form-control" id="rate" min="0" max="5" value="1" <?php if(!$id) echo 'disabled'; ?>>
                            </div>
                            <input type="hidden" name="id" value="<?= $_product['id'] ?>">
                            <button type="submit" class="btn btn-primary" <?php if(!$id) echo 'disabled'; ?>>Agregar</button>
                        </div>
                    </div>
                </form>
                <div class="products-list">
                    <h3>Productos Actuales</h3>
                    <ul class="list-group products">
                        <?php foreach ($products as $product): ?>
                            <?php echo '<a href="update.php?id='.$product["id"].'"><li class="list-group-item product-item">'.$product["title"].'</li></a>'; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php include_once "../../views/partials/footer.php";?>
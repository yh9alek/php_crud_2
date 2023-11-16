<?php
/** @var $pdo PDO */
require_once "../../database.php";

$images_path = 'images';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Obtengo la información del formulario por POST
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;
    $rate = $_POST['rate'] ?? 0;
    $image = $_FILES['image'] ?? null;

    $errors = [];
    # Valido campos vacíos
    if(empty($title)) $errors[] = 'El título no se proporcionó.';
    if(empty($description)) $errors[] = 'La descripción no se proporcionó.';
    if(empty($price)) $errors[] = 'El precio no se proporcionó.';
    # Valido la calificación dada, que no exceda las 5 estrellas y que no sean menor a 0
    if(empty($rate) || $rate < 0) $rate = 0;
    if($rate > 5) $rate = 5;

    # Verifico si existe la carpeta de imagenes
    echo $images_path;
    if(!is_dir($images_path)) mkdir($images_path);

    if(empty($erros)){
        $path = '';
        if($image) {
            $new_dir_path = $images_path.'/'.getRandomString(8);
            mkdir($new_dir_path);
            $path = $new_dir_path.'/'.$image['name'];
            move_uploaded_file($image['tmp_name'], $path);
        }

        $statement = $pdo->prepare('INSERT INTO products_crud_2 (title, description, image, price, rate) 
        VALUES (:title, :description, :image, :price, :rate);');
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':image', $path);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':rate', $rate);
        $statement->execute();
        header('Location: index.php');
    }
}

function getRandomString($n) {
    $str = '';
    $letters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < $n; $i++) $str .= $letters[rand(0, strlen($letters) - 1)];
    return $str;
}

?>
<?php include_once "../../views/partials/header.php"; ?>
    <section class="products-section">
        <div class="products-content container">
            <?php if(!empty($errors)): ?>
                <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="create.php" method="post" enctype="multipart/form-data">
                <h2>Añade un nuevo producto</h2>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Sube una imagen para tu producto</label>
                    <input name="image" class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Título de ejemplo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Este es un producto 👍"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input name="price" type="number" class="form-control" id="price" min="0" value="0">
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">Calificación</label>
                    <div class="rate-container">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <input name="rate" type="number" class="form-control" id="rate" min="0" max="5" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php include_once "../../views/partials/footer.php";?>
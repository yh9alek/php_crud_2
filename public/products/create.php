<?php include_once "../../views/partials/header.php"; ?>
    <section class="products-section">
        <div class="products-content container">
            <form action="create.php" method="post">
                <h2>Añade un nuevo producto</h2>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Sube una imagen para tu producto</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Título de ejemplo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Este es un producto 👍"></textarea>
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
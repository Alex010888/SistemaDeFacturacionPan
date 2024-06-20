<?php
include("../../db.php");

// Procesar el borrado del producto
if (isset($_GET['txtID']) && !empty($_GET['txtID'])) {
    $txtID = $_GET['txtID'];

    try {
        // Obtener los datos del producto antes de eliminarlo
        $sentencia = $conn->prepare("SELECT foto FROM productos WHERE id = :id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_ASSOC);

        // Eliminar la foto del producto si existe
        if (isset($registro_recuperado['foto']) && !empty($registro_recuperado['foto'])) {
            $rutaFoto = "../../uploads/" . $registro_recuperado['foto'];
            if (file_exists($rutaFoto)) {
                unlink($rutaFoto);
            }
        }

        // Preparar y ejecutar la sentencia SQL para eliminar el producto
        $sentencia = $conn->prepare("DELETE FROM productos WHERE id = :id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();

        echo "Producto eliminado correctamente";
        exit;
    } catch (PDOException $e) {
        echo "Error al eliminar el producto: " . $e->getMessage();
    }
}

// Obtener la lista de productos
try {
    $sentencia = $conn->prepare("SELECT *, (SELECT nombre FROM categorias WHERE categorias.id = productos.categoria_id LIMIT 1) AS categoria FROM productos");
    $sentencia->execute();
    $listar_tbl_pan = $sentencia->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener la lista de productos: " . $e->getMessage();
}

?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">Lista de productos</div>
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    <div class="card-body">
        <!-- Agregamos el campo de búsqueda -->
        <div class="mb-3">
            <label for="searchInput" class="form-label">Buscar producto:</label>
            <input type="text" class="form-control" id="searchInput" placeholder="Ingrese el nombre del producto">
        </div>

        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="productTable">
                    <?php foreach ($listar_tbl_pan as $registro) { ?>
                        <tr>
                            <td scope="row"><?php echo $registro["id"]; ?></td>
                            <td><?php echo $registro["nombre"]; ?></td>
                            <td><?php echo $registro["precio"]; ?></td>
                            <td><?php echo $registro["categoria"]; ?></td>
                            <td>
                                <img width="100" src="../../uploads/<?php echo $registro['foto']; ?>" alt="Foto del producto">
                            </td>
                            <td><?php echo $registro["fecha"]; ?></td>
                            <td>
                                <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>">Editar</a>
                                <a class="btn btn-danger delete-product" href="#" data-product-id="<?php echo $registro['id']; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>

<!-- Script de AJAX para la búsqueda en vivo y eliminar producto -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // AJAX para búsqueda en vivo
        $('#searchInput').on('keyup', function() {
            var searchText = $(this).val().toLowerCase();
            $.ajax({
                url: 'search_products.php',
                method: 'POST',
                data: { searchText: searchText },
                success: function(response) {
                    $('#productTable').html(response);
                }
            });
        });

        // AJAX para eliminar producto
        $('.delete-product').on('click', function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            if (confirm('¿Está seguro de eliminar este producto?')) {
                $.ajax({
                    url: 'index.php',
                    method: 'GET',
                    data: { txtID: productId },
                    success: function(response) {
                        alert('Producto eliminado correctamente');
                        // Recargar la lista de productos después de eliminar
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Error al eliminar el producto');
                        console.error(error);
                    }
                });
            }
        });
    });
</script>

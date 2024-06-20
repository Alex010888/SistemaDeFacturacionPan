<?php include("../../db.php");

if (isset($_GET['txtID']) && !empty($_GET['txtID'])) {
    $txtID = $_GET['txtID'];

    // Obtener los datos del producto antes de eliminarlo
    $sentencia = $conn->prepare("SELECT foto FROM productos WHERE id = :id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    // Eliminar la foto del producto si existe
    if (isset($registro_recuperado['foto']) && $registro_recuperado['foto'] != "") {
        $rutaFoto = "../../uploads/" . $registro_recuperado['foto'];
        if (file_exists($rutaFoto)) {
            unlink($rutaFoto);
        }
    }

    // Preparar y ejecutar la sentencia SQL para eliminar el producto
    $sentencia = $conn->prepare("DELETE FROM productos WHERE id = :id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();

    // Redirigir a la página principal después de eliminar el producto
    header("Location: index.php");
    exit;
}

$sentencia = $conn->prepare("SELECT *,(SELECT nombre FROM categorias WHERE categorias.id=productos.categoria_id limit 1) as categoria FROM productos");
$sentencia->execute();
$listar_tbl_pan = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">Lista de productos</div>
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listar_tbl_pan as $registro) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $registro["id"]; ?></td>
                            <td><?php echo $registro["nombre"]; ?></td>
                            <td><?php echo $registro["precio"]; ?></td>
                            <td><?php echo $registro["categoria"]; ?></td>
                            <td>
                                <img width="100" src="../../uploads/<?php echo $registro['foto']; ?>" 
                                    class="img-fluid rounded-top" alt="Foto del Producto"
                                    data-toggle="modal" data-target="#imageModal"
                                    onclick="document.getElementById('modalImage').src='../../uploads/<?php echo $registro['foto']; ?>'">
                            </td>
                            <td><?php echo $registro["fecha"]; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="eliminar.php?txtID=<?php echo $registro['id']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Imagen del Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Imagen del Producto">
            </div>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>

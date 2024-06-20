<?php
include("../../db.php");
if (isset($_GET['txtID']) && !empty($_GET['txtID'])) {
    $txtID = $_GET['txtID'];

    // Preparar y ejecutar la sentencia SQL para eliminar el producto
    $sentencia = $conn->prepare("DELETE FROM productos WHERE id = :id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    
}
?>
<?php include("../../templates/header.php");
 ?>
<div class="card">
    <div class="card-header">Datos para registrar productos</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre" />
            </div>
            <div class="mb-3">
                <label for="Foto" class="form-label">Foto del producto</label>
                <input type="file" class="form-control" name="Foto" id="Foto" aria-describedby="helpId" placeholder="Foto" />
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="Precio" id="Precio" aria-describedby="helpId" placeholder="Precio" />
            </div>
            <div class="mb-3">
                <label for="Categoria" class="form-label">Categoria</label>
                <select class="form-select form-select-sm" name="Categoria" id="Categoria">
             
                   
                    <option value="">Seleccione una categoría</option>
                    <?php
                    // Conexión a la base de datos usando PDO
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "panaderiadb";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Consulta para obtener las categorías
                        $sentencia = $conn->prepare("SELECT id, nombre FROM categorias");
                        $sentencia->execute();
                        $listar_tbl_pan = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($listar_tbl_pan as $categoria) {
                            echo "<option value='" . $categoria['id'] . "'>" . $categoria['nombre'] . "</option>";
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
                </select>
                
                </select>
             
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion" />
            </div>
            <div class="mb-3">
                <label for="Fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="Fecha" id="Fecha" aria-describedby="emailHelpId" placeholder="Fecha" />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
           
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

<?php
// Procesar el formulario al ser enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $precio = $_POST['Precio'];
    $categoria_id = $_POST['Categoria'];
    $descripcion = $_POST['Descripcion'];
    $fecha = $_POST['Fecha'];

    // Procesar la subida de la foto
    $foto = "";
    if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] == 0) {
        $foto = basename($_FILES['Foto']['name']);
        $rutaDestino = "../../uploads/" . $foto;
        move_uploaded_file($_FILES['Foto']['tmp_name'], $rutaDestino);
    }

    // Conexión a la base de datos usando PDO
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sentencia SQL para insertar el producto
        $sql = "INSERT INTO productos (nombre, precio, foto, categoria_id, descripcion, fecha) VALUES (:nombre, :precio, :foto, :categoria_id, :descripcion, :fecha)";
        $sentencia = $conn->prepare($sql);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':precio', $precio);
        $sentencia->bindParam(':foto', $foto);
        $sentencia->bindParam(':categoria_id', $categoria_id);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':fecha', $fecha);

        //$foto_fecha= new Datetime();

        //$nombreArchivo_foto = ($foto='')?$foto_fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"";


        $sentencia->execute();

        echo "Nuevo registro creado exitosamente";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>

 <?php include("../../templates/footer.php");
 ?>
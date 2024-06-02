<?php 
include("../../db.php");
$sentencia=$conn->prepare("SELECT * FROM `productos`");
$sentencia->execute();
$listar_tbl_pan = $sentencia->fetchAll(PDO::FETCH_ASSOC);

print_r($listar_tbl_pan);
?>

<?php include("../../templates/header.php");
 ?>
 </br>
 <div class="card">
    <div class="card-header">Lista de productos</div>
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a
    >
    <div class="card-body">
    <div
    class="table-responsive-sm"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
                <th scope="col">Foto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar_tbl_pan as $registro){?>
                <tr class="">
                <td scope="row"><?php echo $registro["nombre"]?></td>
                <td>1.60</td>
                <td>1</td>
                <td>img.jpg</td>
                <td>dd/mm/yy</td>
                <td>
                <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="#"
                            role="button"
                            >Agregar</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php"
                            role="button"
                            >Eliminar</a
                        >
</td>
            </tr>
                <?php }?>
           
        </tbody>
    </table>
</div>

    </div>
    
 </div>
 

<?php include("../../templates/footer.php");
 ?>

<?php include("../../templates/header.php");
 ?>
 <?php 
 include("../../db.php")
if($_POST){
    print_r($_POST);

      //Recolectando los datos
      $nombre = (isset($_POST["Nombre"])?$_POST["Nombre"]:"");
      
}

 ?>
 </br>
 <div class="card">
    <div class="card-header">Datos para registrar productos</div>
    <div class="card-body">
        <form action="process_form.php" method="post" enctype="multipart/form-data">
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
                    <option selected>Categoria</option>
                    <option value="New Delhi">New Delhi</option>
                    <option value="Istanbul">Istanbul</option>
                    <option value="Jakarta">Jakarta</option>
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
            <button type="submit" class="btn btn-success">Agregar</button>
            <a class="btn btn-primary" href="editar.php" role="button">Editar</a>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

 

 <?php include("../../templates/footer.php");
 ?>
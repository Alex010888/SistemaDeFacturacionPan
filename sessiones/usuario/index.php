<?php include("../../templates/header.php");
 ?>
 <br/>
<div class="card">
    <div class="card-header"><h4>Usuarios</h4></div>
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
            class="table-responsive"
        >
            <table
                class="table "
            >
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">Alex</td>
                        <td>img.jpg</td>
                        <td>--</td>
                        <td>0000</td>
                        <td>Fecha</td>
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
                            href="#"
                            role="button"
                            >Eliminar</a
                        >
</td>
                        
                    </tr>
                  
                </tbody>
            </table>
        </div>
        
</div>

<?php include("../../templates/footer.php");
 ?>

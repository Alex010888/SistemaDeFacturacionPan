<?php include("../../templates/header.php");
 ?>
 </br>
 <div class="card">
    <div class="card-header">Datos</div>
    <div class="card-body">

        <form action="" method="post" enctype="multipatr/form-data">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name=""
                    id="Nombre"
                    aria-describedby="helpId"
                    placeholder="Nombre"
                />
                <div class="mb-3">
                <label for="" class="form-label">Foto</label>
                <input
                    type="file"
                    class="form-control"
                    name="Foto"
                    id="Foto"
                    aria-describedby="helpId"
                    placeholder="Foto"
                />
                <div class="mb-3">
                    <label for="Puesto" class="form-label">Puesto</label>
                    <input
                    type="text"
                    class="form-control"
                    name="Puesto"
                    id="Puesto"
                    aria-describedby="helpId"
                    placeholder="Puesto"
                />
                <label for="ciudad" class="form-label">Ciudad</label>
                    <select
                        class="form-select form-select-sm"
                        name="ciudad"
                        id="ciudad"
                    >
                        <option selected>Selecionar ciudad</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>
            
                <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input
                    type="password"
                    class="form-control"
                    name="Contraseña"
                    id="Contraseña"
                    aria-describedby="helpId"
                    placeholder="Contraseña"
                />
           
                
                <div class="mb-3">
                    <label for="" class="form-label">Fecha</label>
                    <input
                        type="date"
                        class="form-control"
                        name="Fecha"
                        id="Fecha"
                        aria-describedby="emailHelpId"
                        placeholder="Fecha"
                    />
                    
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Agregar
                </button>
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="editar.php"
                    role="button"
                    >Editar</a
                >
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="index.php"
                    role="button"
                    >Cancelar</a
                >
                
                
                </div>
                
            </div>
            
            </div>
            
            </div>
            

        </form>

    </div>
   
 </div>
 

 <?php include("../../templates/footer.php");
 ?>
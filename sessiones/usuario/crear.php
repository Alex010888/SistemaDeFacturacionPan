<?php include("../../templates/header.php");
 ?>
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
                <label for="" class="form-label">Apellido</label>
                <input
                    type="text"
                    class="form-control"
                    name="Apellido"
                    id="Apellido"
                    aria-describedby="helpId"
                    placeholder="Apellido"
                />
            <div class="mb-3">
                <label for="" class="form-label">Foto</label>
                <input
                    type="file"
                    class="form-control"
                    name="Foto"
                    id="Foto"
                    aria-describedby="helpId"
                    placeholder=""
                />
                <div class="mb-3">
                    <label for="Puesto" class="form-label">Puesto</label>
                    <select
                        class="form-select form-select-sm"
                        name="Puesto"
                        id="Puesto"
                    >
                        <option selected>Select one</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>
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
                    href="index.php"
                    role="button"
                    >Cancealar</a
                >
                
                
                </div>
                
            </div>
            
            </div>
            
            </div>
            

        </form>

    </div>
    <div class="card-footer text-muted">Footer</div>
 </div>
 

 <?php include("../../templates/footer.php");
 ?>
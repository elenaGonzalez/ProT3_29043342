<div class="p-5 d-flex align-items-center justify-content-center">
    <div class="w-50">
            <form class="bg-success-subtle p-2" id="formulario_registro" onsubmit="return validar_registro()" >
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">* Nombre</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    name="nombre" placeholder="Nombre">
                    <p id="pn" class="text-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">* Apellido</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" 
                    name="apellido" placeholder="Apellido">
                    <p id="pa" class="text-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">* Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput3" 
                    name="email" placeholder="email@ejemplo.com">
                    <p id="pe" class="text-danger"></p>
                    <p id="pe2" class="text-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">* Usuario</label>
                    <input type="usuario" class="form-control" id="exampleFormControlInput4" 
                    name="usuario" placeholder="Nombre de usuario">
                    <p id="pu" class="text-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">* Contraseña</label>
                    <input type="password" id="exampleFormControlInput5" class="form-control" 
                    name="contraseña" placeholder="Contraseña">
                    <p id="pc" class="text-danger"></p>
                </div>
                 <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">* Repetir Contraseña</label>
                    <input type="password" id="exampleFormControlInput5" class="form-control" 
                    name="repetir_contraseña" placeholder="Repetir Contraseña">
                    <p id="prc" class="text-danger"></p>
                    <p id="prc2" class="text-danger"></p>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
                <button type="button" class="btn btn-sm btn-danger" onclick="limpiar_f_registro()">Cancelar</button>
            </form>
           
        </div>
</div>
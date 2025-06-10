<div class="p-5 d-flex align-items-center justify-content-center">
    <div class="w-50">
        <form class="bg-success-subtle p-2"  action="perfil" id="formulario_login" onsubmit="return validar_login()">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" 
                name="email" placeholder="Email">
                <p id="logine" class="text-danger"></p>
                <p id="logine2" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" 
                name="contraseña" placeholder="Contraseña">
                <p id="loginc" class="text-danger"></p>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Ingresar</button>
            <button type="button" class="btn btn-sm btn-danger" onclick="limpiar_f_login()">Cancelar</button>
            <p>No está registrado?<a href="registro"> Regístrese aquí</a></p>
        </form>
    </div>
</div>
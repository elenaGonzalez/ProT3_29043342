<div class="p-5 d-flex align-items-center justify-content-center ">
    <div class="w-50">
        <form class="bg-success-subtle p-2" action="" id="formulario_contacto" onsubmit="return validar_contacto()">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">* Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"
                name="nombre" placeholder="Nombre">
                <p id="cn" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">* Apellido</label>
                <input type="text" class="form-control" id="exampleFormControlInput2"
                    name="apellido" placeholder="Apellido">
                <p id="ca" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="my_select" class="form-label"> Servicio</label>
                <select class="form-select form-select-sm" aria-label="Small select example" name="servicio" id="my_select">
                    <option selected>Seleccione Servicio deseado:</option>
                    <option value="playa">Dia de Playa</option>
                    <option value="esteros">Esteros del Ibera</option>
                    <option value="empedrado">Empedrado</option>
                    <option value="itati">Itati</option>
                </select>
                <p id="cs" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">* Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput4"
                    name="email" placeholder="email@ejemplo.com" autocomplete="email">
                <p id="ce" class="text-danger"></p>
                <p id="ce2" class="text-danger"></p>

            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput5" class="form-label">* Celular</label>
                <input type="text" class="form-control" id="exampleFormControlInput5"
                    name="celular" placeholder="Numero de celular">
                <p id="cc" class="text-danger"></p>
            </div>
            <div class="mb-3">
                <label for="floatingTextarea" class="form-label">* Consulta</label>
                <textarea class="form-control" name="consulta" placeholder="Consulta" id="floatingTextarea"></textarea>
                <p id="cm" class="text-danger"></p>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Consultar</button>
            <button type="button" class="btn btn-sm btn-danger" onclick="limpiar_f_contacto()">Cancelar</button>
        </form>
        </div>
</div>
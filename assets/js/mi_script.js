
function en_construccion() {
    alert("En construcción");
}

function limpiar_f_registro() {
    document.getElementById("formulario_registro").reset();
}

function limpiar_f_contacto() {
    document.getElementById("formulario_contacto").reset();
}

function limpiar_f_login() {
    document.getElementById("formulario_login").reset();
}

function validar_registro() {
    let n = document.forms["formulario_registro"]["nombre"].value;
    let a = document.forms["formulario_registro"]["apellido"].value;
    let e = document.forms["formulario_registro"]["email"].value;
    let u = document.forms["formulario_registro"]["usuario"].value;
    let c = document.forms["formulario_registro"]["contraseña"].value;
    let rc = document.forms["formulario_registro"]["repetir_contraseña"].value;

    let mensaje_n = document.getElementById("pn");
    let mensaje_a = document.getElementById("pa");
    let mensaje_e = document.getElementById("pe");
    let mensaje_e2 = document.getElementById("pe2");
    let mensaje_u = document.getElementById("pu");
    let mensaje_c = document.getElementById("pc");
    let mensaje_rc = document.getElementById("prc");
    let mensaje_rc2 = document.getElementById("prc2");

    mensaje_n.innerHTML = "";
    mensaje_a.innerHTML = "";
    mensaje_e.innerHTML = "";
    mensaje_e2.innerHTML = "";
    mensaje_u.innerHTML = "";
    mensaje_c.innerHTML = "";
    mensaje_rc.innerHTML = "";
    mensaje_rc2.innerHTML = "";

    let error = false;

    if (n == "") {
        mensaje_n.innerHTML = "El campo Nombre no puede ser vacio";
        error = true;
    }
    if (a == "") {
        mensaje_a.innerHTML = "El campo Apellido no puede ser vacio";
        error = true;
    }
    if (e == "") {
        mensaje_e.innerHTML = "El campo Email no puede ser vacio";
        error = true;
    }
    if (validarEmail(e) != true) {
        mensaje_e2.innerHTML = "El campo Email debe tener el siguiente formato email@ejemplo.com";
        error = true;
    }
    if (u == "") {
        mensaje_u.innerHTML = "El campo Usuario no puede ser vacio";
        error = true;
    }
    if (c == "") {
        mensaje_c.innerHTML = "El campo Contraseña no puede ser vacio";
        error = true;
    }
    if (rc == "") {
        mensaje_rc.innerHTML = "El campo Repetir Contraseña no puede ser vacio";
        error = true;
    }
    if (rc !== c) {
        mensaje_rc2.innerHTML = "Las Contraseñas no coinciden";
        error = true;
    }

    if (error) {
        return false;
    }
    alert(`${n}, gracias por registrarte!!`);
    limpiar_f_registro();
}

function validar_contacto(e) {
    let cn = document.forms["formulario_contacto"]["nombre"].value;
    let ca = document.forms["formulario_contacto"]["apellido"].value;
    let cs = document.forms["formulario_contacto"]["servicio"].value;
    let ce = document.forms["formulario_contacto"]["email"].value;
    let cc = document.forms["formulario_contacto"]["celular"].value;
    let cm = document.forms["formulario_contacto"]["consulta"].value;

    let mensaje_cn = document.getElementById("cn");
    let mensaje_ca = document.getElementById("ca");
    let mensaje_cs = document.getElementById("cs");
    let mensaje_ce = document.getElementById("ce");
    let mensaje_ce2 = document.getElementById("ce2");
    let mensaje_cc = document.getElementById("cc");
    let mensaje_cm = document.getElementById("cm");

    mensaje_cn.innerHTML = "";
    mensaje_ca.innerHTML = "";
    mensaje_cs.innerHTML = "";
    mensaje_ce.innerHTML = "";
    mensaje_ce2.innerHTML = "";
    mensaje_cc.innerHTML = "";
    mensaje_cm.innerHTML = "";

    let error_c = false;

    if (cn == "") {
        mensaje_cn.innerHTML = "El campo Nombre no puede ser vacio";
        error_c = true;
    }
    if (ca == "") {
        mensaje_ca.innerHTML = "El campo Apellido no puede ser vacio";
        error_c = true;
    }
    if (cs == "") {
        mensaje_cs.innerHTML = "El campo Servicio no puede ser vacio";
        error_c = true;
    }
    if (ce == "") {
        mensaje_ce.innerHTML = "El campo Email no puede ser vacio";
        error_c = true;
    }
    if (validarEmail(ce) != true) {
        mensaje_ce2.innerHTML = "El campo Email debe tener el siguiente formato email@ejemplo.com";
        error_c = true;
    }
    if (cc == "") {
        mensaje_cc.innerHTML = "El campo Celular no puede ser vacio";
        error_c = true;
    }
    if (cm == "") {
        mensaje_cm.innerHTML = "El campo Mensaje no puede ser vacio";
        error_c = true;
    }

    if (error_c) {
        return false;
    }
    alert(`${cn}, gracias por tu consulta. Nos comunicaremos en breve!!`);
    limpiar_f_contacto();
}

function validar_login() {
    console.log("En validar login");

    let le = document.forms["formulario_login"]["email"].value;
    let lc = document.forms["formulario_login"]["contraseña"].value;

    let mensaje_le = document.getElementById("logine");
    let mensaje_le2 = document.getElementById("logine2");
    let mensaje_lc = document.getElementById("loginc");

    mensaje_le.innerHTML = "";
    mensaje_le2.innerHTML = "";
    mensaje_lc.innerHTML = "";

    let error_l = false;

    if (le == "") {
        mensaje_le.innerHTML = "El campo Email no puede ser vacio";
        error_l = true;
    }
    if (validarEmail(le) != true) {
        mensaje_le2.innerHTML = "El campo Email debe tener el siguiente formato email@ejemplo.com";
        error_l = true;
    }
    if (lc == "") {
        mensaje_lc.innerHTML = "El campo Contraseña no puede ser vacio";
        error_l = true;
    }
    if (error_l) {
        return false;
    }
    alert(`Funcionalidad en desarrollo!!`);

}

function validarEmail(email) {
    let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return regex.test(email);
}

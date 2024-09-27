<<<<<<< HEAD
// //FUNCION DE CONEXION PARA ACCEDER A LOS DATOS DE MYSQL


function tabla(){

}


=======
//INTENTO PARA QUE PUEDA RECONOCER EL ANCHO DE PANTALLA Y VOLVER RESPONSIVO EL SITIO
function dimensionarTabla(){
    //COMENTADO PORQUE NO JALA LAS DIMENSIONES 
    // if(window.matchMedia("(max-width: 1155px)".match)){
    //     document.getElementById("tablaPrincipal") = "";
    // }

    var dimensionar = '<?php $obtDatInf->obtener_datos_infraestructuraT2(); ?>';

    document.getElementById("tablauno").innerHTML = dimensionar;
    console.log("recargando");
}
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
/*--------------------------------------------------------------------------------*/


//FUNCION PARA QUE MUESTRE Y LIGUE EL REGISTRO QUE SE VA A CALENDARIZAR
function mostrarmejora(qstr)
{
    var xhttp;
 
    if (qstr == "") {
 
        document.getElementById("tabladatos").innerHTML = "";
        return;
 
    }

<<<<<<< HEAD
=======
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabladatos").innerHTML = this.responseText;
    
    }
    };
    
    xhttp.open("GET", "../../include/Consulta_infraestructura.php?q="+qstr, true);
    xhttp.send();
}
//-----------------------------------------------------------------------

//MUESTRA EL REGISTRO QUE SE VA A ELIMINAR PARA QUE PREGUNTE SI ESTAS SEGURO
function eliminarRegistro(qstr)
{
    var xhttp;
    if (qstr == "") {
        document.getElementById("tabladatos").innerHTML = "";
        return;
    }
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
    xhttp = new XMLHttpRequest();
 
    xhttp.onreadystatechange = function() {
<<<<<<< HEAD
    
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabladatos").innerHTML = this.responseText;
    
=======
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tabladatosEliminar").innerHTML = this.responseText;
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
    }
    };
    
    xhttp.open("GET", "../../include/Consulta_infraestructura.php?q="+qstr, true);
    xhttp.send();
<<<<<<< HEAD
}
//-----------------------------------------------------------------------

//MUESTRA EL REGISTRO QUE SE VA A ELIMINAR PARA QUE PREGUNTE SI ESTAS SEGURO
function eliminarRegistro(qstr)
{
    var xhttp;
 
    if (qstr == "") {
 
        document.getElementById("tabladatos").innerHTML = "";
        return;
 
    }
 
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
 
    if (this.readyState == 4 && this.status == 200) {
 
        document.getElementById("tabladatosEliminar").innerHTML = this.responseText;
 
    }
 
    };
    
    xhttp.open("GET", "../../include/Consulta_infraestructura.php?q="+qstr, true);
    xhttp.send();
=======
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
}
//-----------------------------------------------------------------------------

//CONSULTA LA FUNCION QUE MUESTRA EL HISTORIAL DE REGISTROS EN LA BD Y LOS MUESTRA
function mostrarcalendario(qstr)
{
    var xhttp;
    
    if (qstr == "") {
    
        document.getElementById("CalendarioAnual").innerHTML = "";
        return;
    
    }
    
    xhttp = new XMLHttpRequest();
    console.log(xhttp);
<<<<<<< HEAD
    
=======
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
    xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {

        document.getElementById("CalendarioAnual").innerHTML = this.responseText;

    }

    };
<<<<<<< HEAD
    
=======
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
    xhttp.open("GET", "../../include/consulta_calendario.php?q="+qstr, true);
    xhttp.send();
}
//----------------------------------------------------------

function cerrartabla(){
        window.location.href = "../Historial_infraestructura";
        return;   
}

function eliminarcalendario(qstr)
{
    var xhttp;
    
    if (qstr == "") {
        document.getElementById("CalendarioAnual").innerHTML = "";
        return;
    }
    
    xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CalendarioAnual").innerHTML = this.responseText;
    }

    };
    
    xhttp.open("GET", "../../include/eliminar_calendarizacion.php?q="+qstr, true);
    xhttp.send();
}

function cambiarEstatus(qId, qstr)
{
    var xhttp;
    
    if (qstr == "") {
        document.getElementById("tabladatos").innerHTML = "";
        return;
    }
    
    xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {

        if(qstr == "Reprogramado"){
            const MioffCanvas = new bootstrap.Offcanvas(document.getElementById('reprogramacion'));
            document.getElementById("consultacalendario").innerHTML = this.responseText;
            MioffCanvas.show();
        }
        else{
            const toastLiveExample = document.getElementById('liveToast');
            document.getElementById("respuesta").innerHTML = this.responseText;
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
        }
    }
    };

    xhttp.open("GET", "../../funciones_php/Cambio_calendario.php?q="+qId+"&"+"r="+qstr, true);
    xhttp.send();
}

function mostrarregistro(qstr)
{
    var xhttp;

    if (qstr == "") {
        document.getElementById("consultaeliminar").innerHTML = "";
        return;
    }

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("consultaeliminar").innerHTML = this.responseText;
    }
    };

    xhttp.open("GET", "../../funciones_php/consulta_regcalendario.php?q="+qstr, true);
    xhttp.send();
}

function mostrarusuario(qstr)
{
    var xhttp;

    if (qstr == "") {
        document.getElementById("tabladatos").innerHTML = "";
        return;
    }

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tabladatosusuarios").innerHTML = this.responseText;
        document.getElementById("tabladatosusuariosb").innerHTML = this.responseText;
    }
    };

    xhttp.open("GET", "../funciones_php/Consulta_usuario.php?q="+qstr, true);
    xhttp.send();
}

function comprobarClave() {
    let clave = document.getElementsByName("nueva_contrasenna");

    if (clave[0].value == clave[1].value) {
       return true;
    } else {
       alert("Las dos claves son distintas...");
       return false;
    }
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)

    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity() || comprobarClave() == false) {
                event.preventDefault()
                event.stopPropagation()
            }
  
          form.classList.add('was-validated')
        }, false)
<<<<<<< HEAD
    })
=======
      })
>>>>>>> 726e8b0079d7368b19cdc5c8d1321cc20ee2dfef
  })()

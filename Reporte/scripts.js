function validar(){
    anio = document.getElementById("anio").value;
   

    if(anio.length == 0){
        alert("Seleccione un valor");
        return false;
    }

    return true;
}
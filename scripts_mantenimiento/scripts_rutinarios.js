// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

//Obtencion de fecha de hoy
function diahoy() {
var fecha = new Date();
var day = ("0" + fecha.getDate()).slice(-2);
var month = ("0" + (fecha.getMonth() + 1)).slice(-2);
var today = fecha.getFullYear() + "-" + (month) + "-" + (day);
document.getElementById("fecha").value = today;
}

function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
  const expires = "expires=" + date.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
  const nameEQ = name + "=";
  const ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function loadForm() {
  
  const entrada_salida = getCookie('entrada_salida');
  const bio_acce_prin = getCookie('bio_acce_prin');
  const bio_oficina = getCookie('bio_oficina');
  const bio_vigilancia = getCookie('bio_vigilancia');
  const bio_esclusa = getCookie('bio_esclusa');
  const bio_triage = getCookie('bio_triage');
  const bio_cpd = getCookie('bio_cpd');
  const bio_ce = getCookie('bio_ce');
  const bio_observaciones = getCookie('bio_observaciones');
  const lamp_emer_recepcion = getCookie('lamp_emer_recepcion');
  const lamp_emer_pasillos = getCookie('lamp_emer_pasillos');
  const lamp_emer_cpd1 = getCookie('lamp_emer_cpd1');
  const lamp_emer_cpd2 = getCookie('lamp_emer_cpd2');
  const lamp_emer_ce1 = getCookie('lamp_emer_ce1');
  const lamp_emer_ce2 = getCookie('lamp_emer_ce2');
  const lamp_emer_obser = getCookie('lamp_emer_obser');
  const cctv_pasillo = getCookie('cctv_pasillo');
  const cctv_cpd1 = getCookie('cctv_cpd1');
  const cctv_cpd2 = getCookie('cctv_cpd2');
  const cctv_recepcion = getCookie('cctv_recepcion');
  const cctv_ce = getCookie('cctv_ce');
  const cctv_entrada360 = getCookie('cctv_entrada360');
  const cctv_sal_emer = getCookie('cctv_sal_emer');
  const cctv_cuart_maqui = getCookie('cctv_cuart_maqui');
  const cctv_entra_princ = getCookie('cctv_entra_princ');
  const cctv_esclusa = getCookie('cctv_esclusa');
  const cctv_observaciones = getCookie('cctv_observaciones');
  const aap_1_cpd_alert = getCookie('aap_1_cpd_alert');
  const aap_2_cpd_alert = getCookie('aap_2_cpd_alert');
  const aap_1_ce_alert = getCookie('aap_1_ce_alert');
  const aap_2_ce_alert = getCookie('aap_2_ce_alert');
  const aap_1_cpd_aire = getCookie('aap_1_cpd_aire');
  const aap_2_cpd_aire = getCookie('aap_2_cpd_aire');
  const aap_1_ce_aire = getCookie('aap_1_ce_aire');
  const aap_2_ce_aire = getCookie('aap_2_ce_aire');
  const aap_observaciones = getCookie('aap_observaciones');
  const hidra_mano1_cpd = getCookie('hidra_mano1_cpd');
  const hidra_mano2_cpd = getCookie('hidra_mano2_cpd');
  const hidra_mano_observaciones = getCookie('hidra_mano_observaciones');
  const incendia_cpd = getCookie('incendia_cpd');
  const incendia_ce = getCookie('incendia_ce');
  const incendia_observaciones = getCookie('incendia_observaciones');
  const ups_1 = getCookie('ups_1');
  const ups_2 = getCookie('ups_2');
  const kwred_consumo = getCookie('kwred_consumo');
  const kwsalida_dctyc = getCookie('kwsalida_dctyc');
  const kwsalida_lns1 = getCookie('kwsalida_lns1');
  const kwsalida_lns2 = getCookie('kwsalida_lns2');
  const kvatotal = getCookie('kvatotal');
  const ups_observaciones = getCookie('ups_observaciones');
  const electrogeno_fugagenerador_a = getCookie('electrogeno_fugagenerador_a');
  const electrogeno_fugagenerador_b = getCookie('electrogeno_fugagenerador_b');
  const electrogeno_ruidogenerador_a = getCookie('electrogeno_ruidogenerador_a');
  const electrogeno_ruidogenerador_b = getCookie('electrogeno_ruidogenerador_b');
  const electrogeno_observaciones = getCookie('electrogeno_observaciones');

  if (entrada_salida) {document.querySelector(`input[name="entrada_salida"][value="${entrada_salida}"]`).checked = true;}
  if (bio_acce_prin) {document.querySelector(`input[name="bio_acce_prin"][value="${bio_acce_prin}"]`).checked = true;}
  if (bio_oficina) {document.querySelector(`input[name="bio_oficina"][value="${bio_oficina}"]`).checked = true;}
  if (bio_vigilancia) {document.querySelector(`input[name="bio_vigilancia"][value="${bio_vigilancia}"]`).checked = true;}
  if (bio_esclusa) {document.querySelector(`input[name="bio_esclusa"][value="${bio_esclusa}"]`).checked = true;}
  if (bio_triage) {document.querySelector(`input[name="bio_triage"][value="${bio_triage}"]`).checked = true;}
  if (bio_cpd) {document.querySelector(`input[name="bio_cpd"][value="${bio_cpd}"]`).checked = true;}
  if (bio_ce) {document.querySelector(`input[name="bio_ce"][value="${bio_ce}"]`).checked = true;}
  if (bio_observaciones) document.getElementById('bio_observaciones').value = bio_observaciones;
  if (lamp_emer_recepcion) {document.querySelector(`input[name="lamp_emer_recepcion"][value="${lamp_emer_recepcion}"]`).checked = true;}
  if (lamp_emer_pasillos) {document.querySelector(`input[name="lamp_emer_pasillos"][value="${lamp_emer_pasillos}"]`).checked = true;}
  if (lamp_emer_cpd1) {document.querySelector(`input[name="lamp_emer_cpd1"][value="${lamp_emer_cpd1}"]`).checked = true;}
  if (lamp_emer_cpd2) {document.querySelector(`input[name="lamp_emer_cpd2"][value="${lamp_emer_cpd2}"]`).checked = true;}
  if (lamp_emer_ce1) {document.querySelector(`input[name="lamp_emer_ce1"][value="${lamp_emer_ce1}"]`).checked = true;}
  if (lamp_emer_ce2) {document.querySelector(`input[name="lamp_emer_ce2"][value="${lamp_emer_ce2}"]`).checked = true;}
  if (lamp_emer_obser) document.getElementById('lamp_emer_obser').value = lamp_emer_obser;
  if (cctv_pasillo) {document.querySelector(`input[name="cctv_pasillo"][value="${cctv_pasillo}"]`).checked = true;}
  if (cctv_cpd1) {document.querySelector(`input[name="cctv_cpd1"][value="${cctv_cpd1}"]`).checked = true;}
  if (cctv_cpd2) {document.querySelector(`input[name="cctv_cpd2"][value="${cctv_cpd2}"]`).checked = true;}
  if (cctv_recepcion) {document.querySelector(`input[name="cctv_recepcion"][value="${cctv_recepcion}"]`).checked = true;}
  if (cctv_ce) {document.querySelector(`input[name="cctv_ce"][value="${cctv_ce}"]`).checked = true;}
  if (cctv_entrada360) {document.querySelector(`input[name="cctv_entrada360"][value="${cctv_entrada360}"]`).checked = true;}
  if (cctv_sal_emer) {document.querySelector(`input[name="cctv_sal_emer"][value="${cctv_sal_emer}"]`).checked = true;}
  if (cctv_cuart_maqui) {document.querySelector(`input[name="cctv_cuart_maqui"][value="${cctv_cuart_maqui}"]`).checked = true;}
  if (cctv_entra_princ) {document.querySelector(`input[name="cctv_entra_princ"][value="${cctv_entra_princ}"]`).checked = true;}
  if (cctv_esclusa) {document.querySelector(`input[name="cctv_esclusa"][value="${cctv_esclusa}"]`).checked = true;}
  if (cctv_observaciones) document.getElementById('cctv_observaciones').value = cctv_observaciones;
  if (aap_1_cpd_alert) {document.querySelector(`input[name="aap_1_cpd_alert"][value="${aap_1_cpd_alert}"]`).checked = true;}
  if (aap_2_cpd_alert) {document.querySelector(`input[name="aap_2_cpd_alert"][value="${aap_2_cpd_alert}"]`).checked = true;}
  if (aap_1_ce_alert) {document.querySelector(`input[name="aap_1_ce_alert"][value="${aap_1_ce_alert}"]`).checked = true;}
  if (aap_2_ce_alert) {document.querySelector(`input[name="aap_2_ce_alert"][value="${aap_2_ce_alert}"]`).checked = true;}
  if (aap_1_cpd_aire) {document.querySelector(`input[name="aap_1_cpd_aire"][value="${aap_1_cpd_aire}"]`).checked = true;}
  if (aap_2_cpd_aire) {document.querySelector(`input[name="aap_2_cpd_aire"][value="${aap_2_cpd_aire}"]`).checked = true;}
  if (aap_1_ce_aire) {document.querySelector(`input[name="aap_1_ce_aire"][value="${aap_1_ce_aire}"]`).checked = true;}
  if (aap_2_ce_aire) {document.querySelector(`input[name="aap_2_ce_aire"][value="${aap_2_ce_aire}"]`).checked = true;}
  if (aap_observaciones) document.getElementById('aap_observaciones').value = aap_observaciones;
  if (hidra_mano1_cpd) {document.querySelector(`input[name="hidra_mano1_cpd"][value="${hidra_mano1_cpd}"]`).checked = true;}
  if (hidra_mano2_cpd) {document.querySelector(`input[name="hidra_mano2_cpd"][value="${hidra_mano2_cpd}"]`).checked = true;}
  if (hidra_mano_observaciones) document.getElementById('hidra_mano_observaciones').value = hidra_mano_observaciones;
  if (incendia_cpd) {document.querySelector(`input[name="incendia_cpd"][value="${incendia_cpd}"]`).checked = true;}
  if (incendia_ce) {document.querySelector(`input[name="incendia_ce"][value="${incendia_ce}"]`).checked = true;}
  if (incendia_observaciones) document.getElementById('incendia_observaciones').value = incendia_observaciones;
  if (ups_1) {document.querySelector(`input[name="ups_1"][value="${ups_1}"]`).checked = true;}
  if (ups_2) {document.querySelector(`input[name="ups_2"][value="${ups_2}"]`).checked = true;}
  if (kwred_consumo) document.getElementById('kwred_consumo').value = kwred_consumo;
  if (kwsalida_dctyc) document.getElementById('kwsalida_dctyc').value = kwsalida_dctyc;
  if (kwsalida_lns1) document.getElementById('kwsalida_lns1').value = kwsalida_lns1;
  if (kwsalida_lns2) document.getElementById('kwsalida_lns2').value = kwsalida_lns2;
  if (kvatotal) document.getElementById('kvatotal').value = kvatotal;
  if (ups_observaciones) document.getElementById('ups_observaciones').value = ups_observaciones;
  if (electrogeno_fugagenerador_a) {document.querySelector(`input[name="electrogeno_fugagenerador_a"][value="${electrogeno_fugagenerador_a}"]`).checked = true;}
  if (electrogeno_fugagenerador_b) {document.querySelector(`input[name="electrogeno_fugagenerador_b"][value="${electrogeno_fugagenerador_b}"]`).checked = true;}
  if (electrogeno_ruidogenerador_a) {document.querySelector(`input[name="electrogeno_ruidogenerador_a"][value="${electrogeno_ruidogenerador_a}"]`).checked = true;}
  if (electrogeno_ruidogenerador_b) {document.querySelector(`input[name="electrogeno_ruidogenerador_b"][value="${electrogeno_ruidogenerador_b}"]`).checked = true;}
  if (electrogeno_observaciones) document.getElementById('electrogeno_observaciones').value = electrogeno_observaciones;
}


/*PERTENECE AL BOTON DE LAMPARAS DE EMERGENCIA*/ 
document.getElementById('Lamparas-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");
    
      const content = document.getElementById("contenedorbody");

      

            /*PARA QUE SE MUESTRE EL SEGUNDO FORMULARIO*/
      if(form2.style.display == "none" || form22.style.display == ""){
        form2.style.display = "block";
        form22.style.display = "block";

        form1.style.display = "none";
        form11.style.display = "none"; 
    
        form3.style.display = "none";
        form33.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form5.style.display = "none";
        form55.style.display = "none"; 
        
        form6.style.display = "none";
        form66.style.display = "none"; 
    
        form7.style.display = "none";
        form77.style.display = "none"; 
    
        form8.style.display = "none";
        form88.style.display = "none"; 
      }

    if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
        content.style.height = "98%";
    }
}


        /*PERTENECIENTE AL BOTON DE BIOMETRICOS*/
document.getElementById('biometricos-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");
    
      const content = document.getElementById("contenedorbody");

      
      
      if(form1.style.display == "none" || form11.style.display == ""){
      /*PARA QUE SE MUESTRE EL PRIMER FORMULARIO*/
        form1.style.display = "block";
        form11.style.display = "block";
       
        
        form2.style.display = "none";
        form22.style.display = "none"; 
    
        form3.style.display = "none";
        form33.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form5.style.display = "none";
        form55.style.display = "none"; 
        
        form6.style.display = "none";
        form66.style.display = "none"; 
    
        form7.style.display = "none";
        form77.style.display = "none"; 
    
        form8.style.display = "none";
        form88.style.display = "none"; 
      }

    if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
       content.style.height = "100%";
    }
      
}


        /*PERTENECE AL BOTON DE CAMARAS DE CCTV*/
document.getElementById('camaras-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");    
      
      const content = document.getElementById("contenedorbody");
      

      if(form3.style.display == "none" || form33.style.display == ""){
      /*PARA QUE SE MUESTRE EL TERCER FORMULARIO*/
        form3.style.display = "block";
        form33.style.display = "block";
        

        form2.style.display = "none";
        form22.style.display = "none"; 
    
        form1.style.display = "none";
        form11.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form5.style.display = "none";
        form55.style.display = "none"; 
        
        form6.style.display = "none";
        form66.style.display = "none"; 
    
        form7.style.display = "none";
        form77.style.display = "none"; 
    
        form8.style.display = "none";
        form88.style.display = "none"; 
      }

      if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
        content.style.height = "125%";
    } 
      
}

document.getElementById('aap-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1   = document.getElementById("form1");
      const form11  = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2   = document.getElementById("form2");
      const form22  = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3   = document.getElementById("form3");
      const form33  = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4   = document.getElementById("form4");
      const form44  = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5   = document.getElementById("form5");
      const form55  = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6   = document.getElementById("form6");
      const form66  = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7   = document.getElementById("form7");
      const form77  = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8   = document.getElementById("form8");
      const form88  = document.getElementById("form88");    

      const content = document.getElementById("contenedorbody");
      
      if(form4.style.display == "none" || form44.style.display == ""){
      /*PARA QUE SE MUESTRE EL CUARTO FORMULARIO*/
        form4.style.display  = "block";
        form44.style.display = "block";
        

        form2.style.display  = "none";
        form22.style.display = "none"; 
    
        form1.style.display  = "none";
        form11.style.display = "none"; 
    
        form3.style.display  = "none";
        form33.style.display = "none"; 
    
        form5.style.display  = "none";
        form55.style.display = "none"; 
        
        form6.style.display  = "none";
        form66.style.display = "none"; 
    
        form7.style.display  = "none";
        form77.style.display = "none"; 
    
        form8.style.display  = "none";
        form88.style.display = "none"; 
      }

    if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
        content.style.height = "135%";
    }
}

            /*PERTENECE AL BOTON INSTALACION HIDRAULICA DE AA-P*/
document.getElementById('hidraulica_aap-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");    
      
      const content = document.getElementById("contenedorbody");

      if(form5.style.display == "none" || form55.style.display == ""){
      /*PARA QUE SE MUESTRE EL QUINTO FORMULARIO*/
        form5.style.display = "block";
        form55.style.display = "block";
        
        form2.style.display = "none";
        form22.style.display = "none"; 
    
        form1.style.display = "none";
        form11.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form3.style.display = "none";
        form33.style.display = "none"; 
        
        form6.style.display = "none";
        form66.style.display = "none"; 
    
        form7.style.display = "none";
        form77.style.display = "none"; 
    
        form8.style.display = "none";
        form88.style.display = "none"; 
      }

      if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
            content.style.height = "75%";
        }
    
}

            /*PERTENECE AL BOTON DE SISTEMA CONTRA INCENDIOS*/
document.getElementById('incendios-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");  
      const content = document.getElementById("contenedorbody");  
      

      if(form6.style.display == "none" || form66.style.display == ""){
      /*PARA QUE SE MUESTRE EL SEXTO FORMULARIO*/
        form6.style.display = "block";
        form66.style.display = "block";
        
        
        form2.style.display = "none";
        form22.style.display = "none"; 
    
        form1.style.display = "none";
        form11.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form5.style.display = "none";
        form55.style.display = "none"; 
        
        form3.style.display = "none";
        form33.style.display = "none"; 
    
        form7.style.display = "none";
        form77.style.display = "none"; 
    
        form8.style.display = "none";
        form88.style.display = "none"; 
      }

      if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
            content.style.height = "78%";
        }
      
}

        /*PERTENECE AL BOTON DE UPS*/
document.getElementById('ups-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");
      const content = document.getElementById("contenedorbody"); 


      if(form7.style.display == "none" || form77.style.display == ""){
      /*PARA QUE SE MUESTRE EL SEPTIMO FORMULARIO*/
        form7.style.display = "block";
        form77.style.display = "block";
        
        form2.style.display = "none";
        form22.style.display = "none"; 
    
        form1.style.display = "none";
        form11.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form5.style.display = "none";
        form55.style.display = "none"; 
        
        form6.style.display = "none";
        form66.style.display = "none"; 
    
        form3.style.display = "none";
        form33.style.display = "none"; 
    
        form8.style.display = "none";
        form88.style.display = "none"; 
      }

      if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
            content.style.height = "115%";
        }
    
      
}


        /*PERTENECE AL BOTON DE GRUPO DE ELECTROGENO DE EMERGENCIA*/
document.getElementById('electrogeno-tab').onclick = function(){
  /*LO SIGUIENTE ES PARA QUE SE OCULE Y SE MUESTRE LA PESTAÑA QUE SELECCIONEMOS*/
      /*pertenece al primer formulario*/
      const form1 = document.getElementById("form1");
      const form11 = document.getElementById("form11");
    
          /*pertenece al segundo formulario*/
      const form2 = document.getElementById("form2");
      const form22 = document.getElementById("form22");
    
          /*pertenece al tercer formulario*/
      const form3 = document.getElementById("form3");
      const form33 = document.getElementById("form33");
    
          /*pertenece al cuarto formulario*/
      const form4 = document.getElementById("form4");
      const form44 = document.getElementById("form44");
    
          /*pertenece al quinto formulario*/
      const form5 = document.getElementById("form5");
      const form55 = document.getElementById("form55");
    
          /*pertenece al sexto formulario*/
      const form6 = document.getElementById("form6");
      const form66 = document.getElementById("form66");
    
          /*pertenece al septimo formulario*/
      const form7 = document.getElementById("form7");
      const form77 = document.getElementById("form77");
    
      /*pertenece al octavo formulario*/
      const form8 = document.getElementById("form8");
      const form88 = document.getElementById("form88");   
      const content = document.getElementById("contenedorbody"); 
      
      if(form8.style.display == "none" || form88.style.display == ""){
      /*PARA QUE SE MUESTRE EL OCTAVO FORMULARIO*/
        form8.style.display = "block";
        form88.style.display = "block";

       

        form2.style.display = "none";
        form22.style.display = "none"; 
    
        form1.style.display = "none";
        form11.style.display = "none"; 
    
        form4.style.display = "none";
        form44.style.display = "none"; 
    
        form5.style.display = "none";
        form55.style.display = "none"; 
        
        form6.style.display = "none";
        form66.style.display = "none"; 
    
        form7.style.display = "none";
        form77.style.display = "none"; 
    
        form3.style.display = "none";
        form33.style.display = "none"; 
      }


      

      if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPhone/i) || userAgent.match(/iPad/i)){
            content.style.height = "95%";
        }
    
      
}

function saveForm() {
  /*-------------------------------------------------------------------------*/

  /*LA SIGUIENTE FUNCIONA PARA GUARDAR LOS VALORES DEL FORMULARIO
  Y NO SE BORRE CUANDO SE CAMBIE A OTRO*/ 

  const entrada_salida               = document.querySelector('input[name="entrada_salida"]:checked');
  const bio_acce_prin                = document.querySelector('input[name="bio_acce_prin"]:checked');
  const bio_oficina                  = document.querySelector('input[name="bio_oficina"]:checked');
  const bio_vigilancia               = document.querySelector('input[name="bio_vigilancia"]:checked');
  const bio_esclusa                  = document.querySelector('input[name="bio_esclusa"]:checked');
  const bio_triage                   = document.querySelector('input[name="bio_triage"]:checked');
  const bio_cpd                      = document.querySelector('input[name="bio_cpd"]:checked');
  const bio_ce                       = document.querySelector('input[name="bio_ce"]:checked');
  const bio_observaciones            = document.getElementById('bio_observaciones');
  const lamp_emer_recepcion          = document.querySelector('input[name="lamp_emer_recepcion"]:checked');
  const lamp_emer_pasillos           = document.querySelector('input[name="lamp_emer_pasillos"]:checked');
  const lamp_emer_cpd1               = document.querySelector('input[name="lamp_emer_cpd1"]:checked');
  const lamp_emer_cpd2               = document.querySelector('input[name="lamp_emer_cpd2"]:checked');
  const lamp_emer_ce1                = document.querySelector('input[name="lamp_emer_ce1"]:checked');
  const lamp_emer_ce2                = document.querySelector('input[name="lamp_emer_ce2"]:checked');
  const lamp_emer_obser              = document.getElementById('lamp_emer_obser');
  const cctv_pasillo                 = document.querySelector('input[name="cctv_pasillo"]:checked');
  const cctv_cpd1                    = document.querySelector('input[name="cctv_cpd1"]:checked');
  const cctv_cpd2                    = document.querySelector('input[name="cctv_cpd2"]:checked');
  const cctv_recepcion               = document.querySelector('input[name="cctv_recepcion"]:checked');
  const cctv_ce                      = document.querySelector('input[name="cctv_ce"]:checked');
  const cctv_entrada360              = document.querySelector('input[name="cctv_entrada360"]:checked');
  const cctv_sal_emer                = document.querySelector('input[name="cctv_sal_emer"]:checked');
  const cctv_cuart_maqui             = document.querySelector('input[name="cctv_cuart_maqui"]:checked');
  const cctv_entra_princ             = document.querySelector('input[name="cctv_entra_princ"]:checked');
  const cctv_esclusa                 = document.querySelector('input[name="cctv_esclusa"]:checked');
  const cctv_observaciones           = document.getElementById('cctv_observaciones');
  const aap_1_cpd_alert              = document.querySelector('input[name="aap_1_cpd_alert"]:checked');
  const aap_2_cpd_alert              = document.querySelector('input[name="aap_2_cpd_alert"]:checked');
  const aap_1_ce_alert               = document.querySelector('input[name="aap_1_ce_alert"]:checked');
  const aap_2_ce_alert               = document.querySelector('input[name="aap_2_ce_alert"]:checked');
  const aap_1_cpd_aire               = document.querySelector('input[name="aap_1_cpd_aire"]:checked');
  const aap_2_cpd_aire               = document.querySelector('input[name="aap_2_cpd_aire"]:checked');
  const aap_1_ce_aire                = document.querySelector('input[name="aap_1_ce_aire"]:checked');
  const aap_2_ce_aire                = document.querySelector('input[name="aap_2_ce_aire"]:checked');
  const aap_observaciones            = document.getElementById('aap_observaciones');
  const hidra_mano1_cpd              = document.querySelector('input[name="hidra_mano1_cpd"]:checked');
  const hidra_mano2_cpd              = document.querySelector('input[name="hidra_mano2_cpd"]:checked');
  const hidra_mano_observaciones     = document.getElementById('hidra_mano_observaciones');
  const incendia_cpd                 = document.querySelector('input[name="incendia_cpd"]:checked');
  const incendia_ce                  = document.querySelector('input[name="incendia_ce"]:checked');
  const incendia_observaciones       = document.getElementById('incendia_observaciones');
  const ups_1                        = document.querySelector('input[name="ups_1"]:checked');
  const ups_2                        = document.querySelector('input[name="ups_2"]:checked');
  const kwred_consumo                = document.getElementById('kwred_consumo').value;
  const kwsalida_dctyc               = document.getElementById('kwsalida_dctyc').value;
  const kwsalida_lns1                = document.getElementById('kwsalida_lns1').value;
  const kwsalida_lns2                = document.getElementById('kwsalida_lns2').value;
  const kvatotal                     = document.getElementById('kvatotal').value;
  const ups_observaciones            = document.getElementById('ups_observaciones');
  const electrogeno_fugagenerador_a  = document.querySelector('input[name="electrogeno_fugagenerador_a"]:checked');
  const electrogeno_fugagenerador_b  = document.querySelector('input[name="electrogeno_fugagenerador_b"]:checked');
  const electrogeno_ruidogenerador_a = document.querySelector('input[name="electrogeno_ruidogenerador_a"]:checked');
  const electrogeno_ruidogenerador_b = document.querySelector('input[name="electrogeno_ruidogenerador_b"]:checked');
  const electrogeno_observaciones    = document.getElementById('electrogeno_observaciones');

  if (entrada_salida)      {setCookie('entrada_salida', entrada_salida.value, 7);} else{setCookie('entrada_salida', '', 7);}
  if (bio_acce_prin)       {setCookie('bio_acce_prin',  bio_acce_prin.value,  7);} else{setCookie('bio_acce_prin', '', 7);}
  if (bio_oficina)         {setCookie('bio_oficina',    bio_oficina.value,    7);} else{setCookie('bio_oficina', '', 7);}
  if (bio_vigilancia)      {setCookie('bio_vigilancia', bio_vigilancia.value, 7);} else{setCookie('bio_vigilancia', '', 7);}
  if (bio_esclusa)         {setCookie('bio_esclusa',    bio_esclusa.value,    7);} else{setCookie('bio_esclusa', '', 7);}
  if (bio_triage)          {setCookie('bio_triage',     bio_triage.value,     7);} else{setCookie('bio_triage', '', 7);}
  if (bio_cpd)             {setCookie('bio_cpd',        bio_cpd.value,        7);} else{setCookie('bio_cpd', '', 7);}
  if (bio_ce)              {setCookie('bio_ce',         bio_ce.value,         7);} else{setCookie('bio_ce', '', 7);}

  setCookie('bio_observaciones', bio_observaciones.value, 7);

  if (lamp_emer_recepcion) {setCookie('lamp_emer_recepcion', lamp_emer_recepcion.value, 7);} else{setCookie('lamp_emer_recepcion', '', 7);}
  if (lamp_emer_pasillos)  {setCookie('lamp_emer_pasillos',  lamp_emer_pasillos.value,  7);} else{setCookie('lamp_emer_pasillos', '', 7);}
  if (lamp_emer_cpd1)      {setCookie('lamp_emer_cpd1',      lamp_emer_cpd1.value,      7);} else{setCookie('lamp_emer_cpd1', '', 7);}
  if (lamp_emer_cpd2)      {setCookie('lamp_emer_cpd2',      lamp_emer_cpd2.value,      7);} else{setCookie('lamp_emer_cpd2', '', 7);}
  if (lamp_emer_ce1)       {setCookie('lamp_emer_ce1',       lamp_emer_ce1.value,       7);} else{setCookie('lamp_emer_ce1', '', 7);}
  if (lamp_emer_ce2)       {setCookie('lamp_emer_ce2',       lamp_emer_ce2.value,       7);} else{setCookie('lamp_emer_ce2', '', 7);}

  setCookie('lamp_emer_obser', lamp_emer_obser.value, 7);

  if (cctv_pasillo)        {setCookie('cctv_pasillo',     cctv_pasillo.value,     7);} else{setCookie('cctv_pasillo', '', 7);}
  if (cctv_cpd1)           {setCookie('cctv_cpd1',        cctv_cpd1.value,        7);} else{setCookie('cctv_cpd1', '', 7);}
  if (cctv_cpd2)           {setCookie('cctv_cpd2',        cctv_cpd2.value,        7);} else{setCookie('cctv_cpd2', '', 7);}
  if (cctv_recepcion)      {setCookie('cctv_recepcion',   cctv_recepcion.value,   7);} else{setCookie('cctv_recepcion', '', 7);}
  if (cctv_ce)             {setCookie('cctv_ce',          cctv_ce.value,          7);} else{setCookie('cctv_ce', '', 7);}
  if (cctv_entrada360)     {setCookie('cctv_entrada360',  cctv_entrada360.value,  7);} else{setCookie('cctv_entrada360', '', 7);}
  if (cctv_sal_emer)       {setCookie('cctv_sal_emer',    cctv_sal_emer.value,    7);} else{setCookie('cctv_sal_emer', '', 7);}
  if (cctv_cuart_maqui)    {setCookie('cctv_cuart_maqui', cctv_cuart_maqui.value, 7);} else{setCookie('cctv_cuart_maqui', '', 7);}
  if (cctv_entra_princ)    {setCookie('cctv_entra_princ', cctv_entra_princ.value, 7);} else{setCookie('cctv_entra_princ', '', 7);}
  if (cctv_esclusa)        {setCookie('cctv_esclusa',     cctv_esclusa.value,     7);} else{setCookie('cctv_esclusa', '', 7);}

  setCookie('cctv_observaciones', cctv_observaciones.value, 7);

  if (aap_1_cpd_alert)     {setCookie('aap_1_cpd_alert', aap_1_cpd_alert.value, 7);} else{setCookie('aap_1_cpd_alert', '', 7);}
  if (aap_2_cpd_alert)     {setCookie('aap_2_cpd_alert', aap_2_cpd_alert.value, 7);} else{setCookie('aap_2_cpd_alert', '', 7);}
  if (aap_1_ce_alert)      {setCookie('aap_1_ce_alert',  aap_1_ce_alert.value,  7);} else{setCookie('aap_1_ce_alert', '', 7);}
  if (aap_2_ce_alert)      {setCookie('aap_2_ce_alert',  aap_2_ce_alert.value,  7);} else{setCookie('aap_2_ce_alert', '', 7);}
  if (aap_1_cpd_aire)      {setCookie('aap_1_cpd_aire',  aap_1_cpd_aire.value,  7);} else{setCookie('aap_1_cpd_aire', '', 7);}
  if (aap_2_cpd_aire)      {setCookie('aap_2_cpd_aire',  aap_2_cpd_aire.value,  7);} else{setCookie('aap_2_cpd_aire', '', 7);}
  if (aap_1_ce_aire)       {setCookie('aap_1_ce_aire',   aap_1_ce_aire.value,   7);} else{setCookie('aap_1_ce_aire', '', 7);}
  if (aap_2_ce_aire)       {setCookie('aap_2_ce_aire',   aap_2_ce_aire.value,   7);} else{setCookie('aap_2_ce_aire', '', 7);}

  setCookie('aap_observaciones', aap_observaciones.value, 7);

  if (hidra_mano1_cpd)    {setCookie('hidra_mano1_cpd', hidra_mano1_cpd.value, 7);} else{setCookie('hidra_mano1_cpd', '', 7);}
  if (hidra_mano2_cpd)    {setCookie('hidra_mano2_cpd', hidra_mano2_cpd.value, 7);} else{setCookie('hidra_mano2_cpd', '', 7);}

  setCookie('hidra_mano_observaciones', hidra_mano_observaciones.value, 7);

  if (incendia_cpd)       {setCookie('incendia_cpd', incendia_cpd.value, 7);} else{setCookie('incendia_cpd', '', 7);}
  if (incendia_ce)        {setCookie('incendia_ce',  incendia_ce.value,  7);} else{setCookie('incendia_ce', '',  7);}

  setCookie('incendia_observaciones', incendia_observaciones.value, 7);

  if (ups_1)              {setCookie('ups_1', ups_1.value, 7);} else{setCookie('ups_1', '', 7);}
  if (ups_2)              {setCookie('ups_2', ups_2.value, 7);} else{setCookie('ups_2', '', 7);}

  setCookie('kwred_consumo',     kwred_consumo,           7);
  setCookie('kwsalida_dctyc',    kwsalida_dctyc,          7);
  setCookie('kwsalida_lns1',     kwsalida_lns1,           7);
  setCookie('kwsalida_lns2',     kwsalida_lns2,           7);
  setCookie('kvatotal',          kvatotal,                7);
  setCookie('ups_observaciones', ups_observaciones.value, 7);

  if (electrogeno_fugagenerador_a)  {setCookie('electrogeno_fugagenerador_a',  electrogeno_fugagenerador_a.value,  7);} else{setCookie('electrogeno_fugagenerador_a', '', 7);}
  if (electrogeno_fugagenerador_b)  {setCookie('electrogeno_fugagenerador_b',  electrogeno_fugagenerador_b.value,  7);} else{setCookie('electrogeno_fugagenerador_b', '', 7);}
  if (electrogeno_ruidogenerador_a) {setCookie('electrogeno_ruidogenerador_a', electrogeno_ruidogenerador_a.value, 7);} else{setCookie('electrogeno_ruidogenerador_a', '', 7);}
  if (electrogeno_ruidogenerador_b) {setCookie('electrogeno_ruidogenerador_b', electrogeno_ruidogenerador_b.value, 7);} else{setCookie('electrogeno_ruidogenerador_b', '', 7);}
 
  setCookie('electrogeno_observaciones', electrogeno_observaciones.value, 7);
  
}

function deleteCookie(name) {
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
}

function clearForm() {
  deleteCookie('identificador');
  deleteCookie('entrada_salida');
  deleteCookie('bio_acce_prin');
  deleteCookie('bio_oficina');
  deleteCookie('bio_vigilancia');
  deleteCookie('bio_esclusa');
  deleteCookie('bio_triage');
  deleteCookie('bio_cpd');
  deleteCookie('bio_ce');
  deleteCookie('bio_observaciones');
  deleteCookie('lamp_emer_recepcion');
  deleteCookie('lamp_emer_pasillos');
  deleteCookie('lamp_emer_cpd1');
  deleteCookie('lamp_emer_cpd2');
  deleteCookie('lamp_emer_ce1');
  deleteCookie('lamp_emer_ce2');
  deleteCookie('lamp_emer_obser');
  deleteCookie('cctv_pasillo');
  deleteCookie('cctv_cpd1');
  deleteCookie('cctv_cpd2');
  deleteCookie('cctv_recepcion');
  deleteCookie('cctv_ce');
  deleteCookie('cctv_entrada360');
  deleteCookie('cctv_sal_emer');
  deleteCookie('cctv_cuart_maqui');
  deleteCookie('cctv_entra_princ');
  deleteCookie('cctv_esclusa');
  deleteCookie('cctv_observaciones');
  deleteCookie('aap_1_cpd_alert');
  deleteCookie('aap_2_cpd_alert');
  deleteCookie('aap_1_ce_alert');
  deleteCookie('aap_2_ce_alert');
  deleteCookie('aap_1_cpd_aire');
  deleteCookie('aap_2_cpd_aire');
  deleteCookie('aap_1_ce_aire');
  deleteCookie('aap_2_ce_aire');
  deleteCookie('aap_observaciones');
  deleteCookie('hidra_mano1_cpd');
  deleteCookie('hidra_mano2_cpd');
  deleteCookie('hidra_mano_observaciones');
  deleteCookie('incendia_cpd');
  deleteCookie('incendia_ce');
  deleteCookie('incendia_observaciones');
  deleteCookie('ups_1');
  deleteCookie('ups_2');
  deleteCookie('kwred_consumo');
  deleteCookie('kwsalida_dctyc');
  deleteCookie('kwsalida_lns1');
  deleteCookie('kwsalida_lns2');
  deleteCookie('kvatotal');
  deleteCookie('ups_observaciones');
  deleteCookie('electrogeno_fugagenerador_a');
  deleteCookie('electrogeno_fugagenerador_b');
  deleteCookie('electrogeno_ruidogenerador_a');
  deleteCookie('electrogeno_ruidogenerador_b');
  deleteCookie('electrogeno_observaciones');  
}

function sumaWatts()
{
  const input2 = parseFloat(document.getElementById('kwsalida_dctyc').value) || 0;
  const input3 = parseFloat(document.getElementById('kwsalida_lns1').value) || 0;
  const input4 = parseFloat(document.getElementById('kwsalida_lns2').value) || 0;

  // Calcular la suma
  const sum = input2 + input3 + input4;
  const resultado = sum.toFixed(2);

  // Colocar el resultado en el campo de resultado
  document.getElementById('kvatotal').value = resultado;
}

function preparar(){
  diahoy();
  loadForm();
}
window.onload = preparar;

//para la fincion loadForm
//obtener info desde la cookie
//const nombre_nuevo = getCookie('nombre_nuevo');

//asignar info de la cookie al formilario
//if (nuevo_radiobutton) {document.querySelector(`input[name="nuevo_radiobutton"][value="${nombre_nuevo}"]`).checked = true;}
//if (nuevo_input_texarea) document.getElementById('nuevo_input_texarea').value = nombre_nuevo;

//para saveForm
//obtener valores del formulario
//const nuevo_input = document.getElementById('nuevo_input').value;
//const nuevo_radiobutton = document.querySelector('input[name="nuevo_radiobutton"]:checked');
//const nuevo_textarea = document.getElementById('nuevo_textarea');

//guardar informacion del formulario a la cookie
//if (nuevo_radiobutton) {setCookie('nuevo_radiobutton', nuevo_radiobutton.value, 7);} else{setCookie('nuevo_radiobutton', '', 7);}
//setCookie('nuevo_input', nuevo_input, 7);
//setCookie('nuevo_textarea', nuevo_textarea.value, 7);

//para deleteForm
//deleteCookie('Nombre_nuevo');

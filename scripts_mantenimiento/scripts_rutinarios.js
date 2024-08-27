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
window.onload = function() {
var fecha = new Date();
var day = ("0" + fecha.getDate()).slice(-2);
var month = ("0" + (fecha.getMonth() + 1)).slice(-2);
var today = fecha.getFullYear() + "-" + (month) + "-" + (day);
document.getElementById("fecha").value = today;
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
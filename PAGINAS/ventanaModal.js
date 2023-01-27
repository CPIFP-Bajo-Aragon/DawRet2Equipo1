// Ventana modal
let modal = document.getElementById("ventanaModal");

// Botón que abre el modal
let boton = document.getElementById("abrirModal");

// Hace referencia al span que tiene la X que cierra la ventana
let span = document.getElementsByClassName("cerrar")[0];

// Cuando el usuario hace click en el botón, se abre la ventana Modal
boton.addEventListener("click",function() {
  modal.style.display = "block";
});

// Si el usuario hace click en la x, la ventana se cierra
span.addEventListener("click",function() {
  modal.style.display = "none";
});

// Si el usuario hace click fuera de la ventana, se cierra.
window.addEventListener("click",function(event) { //Window es una propiedad que hace referencia a la ventana actual
  if (event.target == modal) {
    modal.style.display = "none";
  }
});


//Formularios

//Solo letras




//Importe negativo
function importeNoNegativo() {
  // Get the value of the input field with id="numb"
  let x = document.getElementById("importe").value;
  // Si x es negativo la cantidad es no valida
  let text;
  if (isNaN(x) || x < 0) {
    text = "Cantidad introducida no valida";
  } else {
    text = "Cantidad introducida valida";
  }
  document.getElementById("ErrorImporte").innerHTML = text;
}


//Pruebas

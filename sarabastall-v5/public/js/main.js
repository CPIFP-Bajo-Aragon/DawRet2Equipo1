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

//Ventana modal para añadir NUEVAS CIUDADES
let modalC = document.getElementById("MODAlciudad");

// Botón que abre el modal
let btn = document.getElementById("botonCiudad");

// Hace referencia al span que tiene la X que cierra la ventana
let Span = document.getElementsByClassName("cerrar")[0];

// Cuando el usuario hace click en el botón, se abre la ventana Modal
btn.addEventListener("click",function() {
  modalC.style.display = "block";
});

// Si el usuario hace click en la x, la ventana se cierra
Span.addEventListener("click",function() {
  modalC.style.display = "none";
});

// Si el usuario hace click fuera de la ventana, se cierra.
window.addEventListener("click",function(event) { //Window es una propiedad que hace referencia a la ventana actual
  if (event.target == modalC) {
    modalC.style.display = "none";
  }
});





//Funcion para eliminar todos DELETE
function place_id(Id){
  document.getElementById("Id_Eliminar").setAttribute("value", Id);
}

//Formularios

//Importe negativo
function importeNoNegativo() {
  // Coge el value del importe
  let x = document.getElementById("importe").value;
  // Si x es negativo la cantidad es no valida
  let text;
  if (isNaN(x) || x < 0) {
    text = "Cantidad introducida no valida";
    importe.style.borderColor = "red";
    return false;
  } else {
    importe.style.borderColor = "green";
    text = "Cantidad introducida valida";
  }
  document.getElementById("ErrorImporte").innerHTML = text;
}


//Campos vacios para formulario cursos

function Validar() {
  params = Validar.arguments;
  f = params[0];
  for (let i = 1, caracteres = params.length; i < caracteres; i++)  //Bucle de los campos
   {
    if (f[params[i]].value == "") //Si el campo esta vacio, sale el alert con el nombre del campo a rellenar
     {
      //alert("Debe rellenar obligatoriamente el campo: " + params[i]);
      // params[i].style.borderColor = "red";
      return false;
     }    
   }
}

//Campo vacio de nombre de CURSOS
function textoVacioNombreCurso(){
  let x = document.getElementById("nombreCurso").value;

  let text;
  if(x == ""){
    nombreCurso.style.borderColor = "red";
    text = "Rellena el campo";
  }
  else{
    nombreCurso.style.borderColor = "green";
    text = "Esta bien";
  }
  document.getElementById("ErrorNombre").innerHTML = text;
}

//Campo vacio de nombre del profesor
function textoVacioNombreProfesor(){
  let x = document.getElementById("profesor").value;

  let text;
  if(x == ""){
    profesor.style.borderColor = "red";
    text = "Rellena el campo";
  }
  else{
    profesor.style.borderColor = "green";
    text = "Esta bien";
  }
  document.getElementById("ErrorProfesor").innerHTML = text;
}

//Campo de fecha vacia
function textoVacioFecha(){
  let x = document.getElementById("fechaCurso").value;

  let text;
  if(x == ""){
    fechaCurso.style.borderColor = "red";
    text = "Rellena el campo";
  }
  else{
    fechaCurso.style.borderColor = "green";
    text = "Esta bien";
  }
  document.getElementById("ErrorFecha").innerHTML = text;
}


//Todas las funciones juntas 
function todos(){
  textoVacioNombreCurso();
  textoVacioNombreProfesor();
  textoVacioFecha();
  importeNoNegativo();
}


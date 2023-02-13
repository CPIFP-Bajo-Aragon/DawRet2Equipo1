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


//Campos vacios 

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

//Campo vacio de nombre de curso
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

//Aviso de eliminar
function place_id(Id){
  document.getElementById("Id_Eliminar").setAttribute("value", Id);
}

//Ordenar alfabeticamente registros


//Refresca para que muestren todos los resultados
let refresh = document.getElementById('refresh');
refresh.addEventListener('click', _ => {
            location.reload();
});



//Buscador
function buscar(){
  let num_cols, display, input, mayusculas, tablaBody, tr, td, i, txtValue;
  num_cols = 8; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("buscador"); //hace referencia al id del input del buscador
  mayusculas = input.value.toUpperCase(); //convierte a mayusculas
  tablaBody = document.getElementById("tbody"); //Hace referencia al id del tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre todos los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j]; //devuelve la lista de elementos td
      if(td){
        txtValue = td.textContent || td.innerText; //Puede ser textContent(Representa el contenido de texto) o innerText (tiene en cuenta el estilo y cambia el estilo de la página)
        if(txtValue.toUpperCase().indexOf(mayusculas) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}		

//Filtrar por tipos


//Filtrar tipo Prestamos
function filtrarTipoPendiente(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 5; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("pendiente").value = "PENDIENTE"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}	

function filtrarTipoFinalizado(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 5; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("finalizado").value = "FINALIZADO"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}	

function filtrarTipoBeca1(){

  console.log("Aqui llego");


  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 1; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("JRM").value = "JRM"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}	

function filtrarTipoBeca2(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 1; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("CARRERA").value = "CARRERA"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}	

function filtrarTipoBeca3(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 1; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("REFUGIO").value = "REFUGIO"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}

function filtrarRolAdmin(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 8; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("admin").value = "ADMIN"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}

function filtrarRolProfesor(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 8; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("profesor").value = "PROFESOR"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}

function filtrarRolMaster(){
  let num_cols, display, input, tablaBody, tr, td, i, txtValue;
  num_cols = 8; //Numero de fila en la que busca, la primera columna es la 0
  input = document.getElementById("master").value = "MASTER"; //hace referencia al id del boton
  tablaBody = document.getElementById("tbody"); //Hace referencia al tbody
  tr = tablaBody.getElementsByTagName("tr");

  for(i=0; i< tr.length; i++){ //recorre los tr		
    display = "none";
    for(j=0; j < num_cols; j++){ //recorre las columnas hasta num_cols
      td = tr[i].getElementsByTagName("td")[j];
      if(td){
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(input) > -1){ //Si el texto en mayusculas concuerda, lo muestra
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}	

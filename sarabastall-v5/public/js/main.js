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

function ordenaras(){
  
  //cuando llamamos a la funcion le decimos a la tabla que tenemos que se ponga en display none
  const ocul=document.getElementById("TablaOrden").style = 'display: none;';

  //ordenamos la tabla con la funcion sort los parametros a y b nos indicaran que fecha es mayor o menor
  const d= datosTabla.sort((a, b) => new Date(a.Fecha_Nacimiento).getTime() > new Date(b.Fecha_Nacimiento).getTime());

  //creamos la tabla con javascript
  const contenedor = document.getElementById("contenedor");
    
  const tabla = document.createElement("table");
  tabla.setAttribute('id', 'TablaOrden');

  let tr = document.createElement("tr");

 
    //array para poner en th y no tener que escribir tanto codigo
  const array = [
    {nombre: "Nº"},
    {nombre: "Nombre"},
    {nombre: "Apellidos"},
    {nombre: "Direccion"},
    {nombre: "Fecha de Nacimiento"},
    {nombre: "Telefono"},
    {nombre: "Email"},
    {nombre: "Usuario"},
    {nombre: "Tipo_Rol"},
  ];
  //recorremos array y le ponemos cada una a una columna
  for (let i = 0; i < array.length; i++) {
    let th = document.createElement("th");
    let thText = document.createTextNode(array[i].nombre);
    
    th.appendChild(thText);
    tr.appendChild(th);

    
  }

  //recorremos el array con todos los datos y llenamos la tabla
   d.forEach((e) => {

    tabla.appendChild(tr);

    tr = document.createElement("tr");
    
    td = document.createElement("td");

    //le damos al boton que hemos creado la funciones correspondientes
    button.onclick=function () {
      verinfocliente(e.Id_Persona);
      window.modal.showModal();
    };
    //button.appendChild(Text);
    td.appendChild(button);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Nombre);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Apellidos);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Direccion);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Fecha_Nacimiento);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Telefono);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Email);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Login);
    td.appendChild(tdText);
    tr.appendChild(td);

    td = document.createElement("td");
    tdText = document.createTextNode(e.Nombre_Rol);
    td.appendChild(tdText);
    tr.appendChild(td);

    tabla.appendChild(tr);

    
  });

  contenedor.appendChild(tabla);

}

let listado = []; // Variable donde se guardan los datos (Es global para toas las hojas JS)
let arrayMaestro = []; // Array de Soporte para no alterar los datos Originales
let nItems = 4; // Numero de Elementos mostrados en cada Pagina

// Funcion que toma el array de objetos obtenido por PHP
function caja_fuerte(arrayElementos){

  listado = arrayElementos;
}

// Funcion que segmenta el array dependiendo de el numero de elementos que queramos mostrar en cada pagina.
function lista_page(page){
  let chunk = [];

  for (i = 0; i < nItems; i++){
    if (arrayMaestro[parseInt(page*nItems)+i] != null){
      chunk.push(arrayMaestro[parseInt(page*nItems)+i]);
    }
  }

  return chunk;
}

function listar_elementos(inicial){ 

    if (inicial){
      arrayMaestro = listado;
    }

    document.getElementById("contenido_tabla").innerHTML = "";

    let elemen = document.getElementById("page_controller");
    page = elemen.value;

    arrayActual = lista_page(page);

    item = elemen.name;

    // DE AQUI EN ADELANTE TODO ESTA CORRECTO
          
    let newTr = document.createElement("tr");
    let newTd = document.createElement("td");

    if(arrayActual.length == 0){
      document.getElementById("nomaches").innerText = "NO SE HAN ENCONTRADO COINCIDENCIAS";
    } else {
      document.getElementById("nomaches").innerText = "";
      for(n = 0; n < arrayActual.length; n++){

        newTr = document.createElement("tr");

        arraySon = Object.values(arrayActual[n]);

        for(z = 0; z < arraySon.length+1; z++){

            
            if(z != arraySon.length){

              newTd = document.createElement("td");

              if (z == 1){
                switch(item){
                  case "prestamo":
  
                    switch(arraySon[1]){
                      case "Pendiente":
                        newTd.classList.add("gris");
                        break;
                      case "Aprobado":
                        newTd.classList.add("verde");
                        break;
                      case "Rechazado":
                        newTd.classList.add("rojo");
                        break;  
                      default:
                        newTd.classList.add("negro");
                        break;
                    }
                    break;
  
                  default:
                  break;
                }
              }

              if (z == 4){
                switch(item){
                  case "movimiento":
  
                    switch(arraySon[1]){
                      case "Ingreso":
                        newTd.classList.add("verde");
                        break; 
                      default:
                        newTd.classList.add("rojo");
                        break;
                    }
                    break;
  
                  default:
                  break;
                }
              }
              
              textoTd = document.createTextNode(arraySon[z]);
              newTd.appendChild(textoTd);

            } else{
                switch(item){
                  case "movimiento":
                    break;
                  case "prestamo":
                    newTd = document.createElement("td");
                    newBoton = document.createElement("button");
                    newBoton.classList.add("w-80", "btn", "btn-warning", "btn-lg");
                    newBoton.setAttribute("onclick", 'place_id(' + arraySon[0]+ ')');
                    newBoton.setAttribute("data-bs-toggle", "modal");
                    newBoton.setAttribute("data-bs-target", "#modalEliminar" + item);


                    newI = document.createElement("i");
                    newI.classList.add("fa", "fa-share-square");

                    newBoton.appendChild(newI);
                    newTd.appendChild(newBoton);

                    // Boton Aprobar

                    newBoton = document.createElement("button");
                    newBoton.classList.add("w-80", "btn", "btn-warning", "btn-lg");
                    newBoton.setAttribute("onclick", 'place_idAceptar(' + arraySon[0]+ ')');
                    newBoton.setAttribute("data-bs-toggle", "modal");
                    newBoton.setAttribute("data-bs-target", "#modalAprobarEstado");


                    newI = document.createElement("i");
                    newI.classList.add("bi", "bi-hand-thumbs-up-fill");

                    newBoton.appendChild(newI);
                    newTd.appendChild(newBoton);

                    // Boton Rechazar

                    newBoton = document.createElement("button");
                    newBoton.classList.add("w-80", "btn", "btn-warning", "btn-lg");
                    newBoton.setAttribute("onclick", 'place_idRechazar(' + arraySon[0]+ ')');
                    newBoton.setAttribute("data-bs-toggle", "modal");
                    newBoton.setAttribute("data-bs-target", "#modalRechazarEstado");


                    newI = document.createElement("i");
                    newI.classList.add("bi", "bi-hand-thumbs-down-fill");

                    newBoton.appendChild(newI);
                    newTd.appendChild(newBoton);

                    
                    break;
                  case "":
                    break;
                  default:
                    newTd = document.createElement("td");
                    newBoton = document.createElement("button");
                    newBoton.classList.add("w-80", "btn", "btn-warning", "btn-lg");
                    newA = document.createElement("a");
                    newA.href = 'http://localhost/sarabastall-v5/admin/see_' + item + '/' + arraySon[0];  // Se puede mejorar la Url 
                    newI = document.createElement("i");
                    newI.classList.add("bi", "bi-pencil-square");
                    newA.appendChild(newI);
                    newBoton.appendChild(newA);
                    newTd.appendChild(newBoton);

                    newBoton = document.createElement("button");
                    newBoton.classList.add("w-80", "btn", "btn-warning", "btn-lg");
                    newBoton.setAttribute("onclick", 'place_id(' + arraySon[0]+ ')');
                    newBoton.setAttribute("data-bs-toggle", "modal");
                    newBoton.setAttribute("data-bs-target", "#modalEliminar" + item);


                    newI = document.createElement("i");
                    newI.classList.add("bi", "bi-trash");

                    newBoton.appendChild(newI);
                    newTd.appendChild(newBoton);
                    break;
                }
                
            }

            newTr.appendChild(newTd);
            
        }

        document.getElementById("contenido_tabla").appendChild(newTr);
      
      }
    }
  
    

    if (inicial){
      page_maker();
    }

  
}

function page_maker() {

  max = arrayMaestro.length%nItems;
  if (max == 0){
    max = Math.trunc(arrayMaestro.length/nItems);
  } else {
    max = Math.trunc(arrayMaestro.length/nItems)+1;
  }

  
  
  document.getElementById("page_panel").innerHTML ="";

  let newLi = document.createElement("li");
  let newA = document.createElement("a");

  if ((max > 1)&&(arrayMaestro.length > nItems)){
    newLi.classList.add("page-item");
    newLi.id = "page_a";
    newA.classList.add("page-link");
    newA.setAttribute("onclick", 'anterior()');
    newA.innerText = "Anterior";
    newLi.appendChild(newA);
    document.getElementById("page_panel").appendChild(newLi);

    // Creamos Paginas
    for(i = 1; i <= max; i++){ // PROBLEMAS FUTUROS CON GO_PAGE ESPERADOS
      newLi = document.createElement("li");
      newA = document.createElement("a");
      newLi.classList.add("page-item");
      newA.classList.add("page-link");
      newA.setAttribute("name", i);
      newA.setAttribute("onclick", 'go_page(this)');
      newA.innerText = i;
      newLi.appendChild(newA);
      document.getElementById("page_panel").appendChild(newLi);

    }

    newLi = document.createElement("li");
    newA = document.createElement("a");
    newLi.classList.add("page-item");
    newLi.id = "page_s";
    newA.classList.add("page-link");
    newA.setAttribute("onclick", 'siguiente()');
    newA.innerText = "Siguiente";
    newLi.appendChild(newA);
    document.getElementById("page_panel").appendChild(newLi);

  }

  document.getElementById("page_controller").value = "0";
  control_paginacion();
}

function control_paginacion(){

  max = arrayMaestro.length%nItems;
  if (max == 0){
    max = Math.trunc(arrayMaestro.length/nItems);
  } else {
    max = Math.trunc(arrayMaestro.length/nItems)+1;
  }

  page = document.getElementById("page_controller").value;
  
  // Desabilitar Siguiente
  if ((max > 1)&&(arrayMaestro.length > nItems)){
    if(page == max-1){
      document.getElementById("page_s").classList.add("disabled");
    } else {
      document.getElementById("page_s").classList.remove("disabled");
    }
  
    // Desabilitar Anterior
    if(page == 0){
      document.getElementById("page_a").classList.add("disabled");
    } else {
      document.getElementById("page_a").classList.remove("disabled");
    }
  }
  
}
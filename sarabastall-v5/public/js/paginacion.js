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
  
    for(n = 0; n < arrayActual.length; n++){

        newTr = document.createElement("tr");

        arraySon = Object.values(arrayActual[n]);

        for(z = 0; z < arraySon.length+1; z++){

            newTd = document.createElement("td");
            if(z != arraySon.length){
                newTd = document.createElement("td");
                textoTd = document.createTextNode(arraySon[z]);
                newTd.appendChild(textoTd);
               
            } else{
                newBoton = document.createElement("button");
                newBoton.classList.add("w-80", "btn", "btn-warning", "btn-lg");
                newA = document.createElement("a");
                newA.href = 'http://localhost/sarabastall/admin/see_' + item + '/' + arraySon[0];  // Se puede mejorar la Url 
                newI = document.createElement("i");
                newI.classList.add("bi", "bi-search");
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
            }

            newTr.appendChild(newTd);
            
        }

        document.getElementById("contenido_tabla").appendChild(newTr);
      
    }
  
}

function control_paginacion(page){

  max = parseInt(listado.length/nItems);  // Probablemente haya que cambiar Listado por el array que salga tras filtros y busqueda IMPORTANTE
  // Correcto, ademas hay que reformular como se generan los elementos html de paginacion, probablemente lo mejor sea crear la estructura por javascript

    // Desabilitar Siguiente
    if(page == max){
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
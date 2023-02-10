  
function listar_elementos(array){ 

    document.getElementById("contenido_tabla").innerHTML = "";

    let elemen = document.getElementById("page_controller");
    page = elemen.value;
    item = elemen.name;
  
    arrayActual = array[page];
          
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
                newA.href = 'http://localhost/sarabastall-v5/admin/see_' + item + '/' + arraySon[0];  // Se puede mejorar la Url 
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

function control_paginacion(max, page){

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
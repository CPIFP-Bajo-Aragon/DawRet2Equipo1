  
function listar_elementos(array){

    document.getElementById("contenido_tabla").innerHTML = "";

    let elemen = document.getElementById("page_controller");
    page = elemen.value;
    item = elemen.name;
  
    arrayActual = array[page];
          
    let newTr = document.createElement("tr");
    let newTd = document.createElement("td");
  
    for(n = 0; n < arrayActual.length; n++){
        
        //newTr = document.createElement("tr");
        newTr = document.createElement("tr");

        arraySon = Object.values(arrayActual[n]);

        for(z = 0; z < arraySon.length; z++){
            newTd = document.createElement("td");
            textoTd = document.createTextNode(arraySon[z]);
            newTd.appendChild(textoTd);
            newTr.appendChild(newTd);
        }

        document.getElementById("contenido_tabla").appendChild(newTr);
      
    }
    
  
}
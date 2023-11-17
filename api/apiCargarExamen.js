function hacerExamen(ev,boton) {
    ev.preventDefault();
    var idExamen=boton.parentNode.parentNode.childNodes[1].id;//ID del examen a hacer
    
    
    fetch('./interfaz/pregunta.html')
    .then(x=>x.text())
    .then(texto => {
        var almacen=document.createElement("div");
        almacen.innerHTML=texto;
        var modeloPregunta=almacen.querySelector(".pregunta-container");
        fetch('api/apiCargarExamen.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
              body: JSON.stringify({"idExamen":idExamen})
            })
            .then(x => x.json())
            .then(y=>{
              var header = document.getElementsByTagName("header");
              document.body.removeChild(header[0]);
              header=document.createElement("header");
              header.id="headerPregunta";
              document.body.appendChild(header);
              
              for(var i=0;i<y.length;i++){
                  var btnHeader =generarHeader(y[i],i+1);
                  header.appendChild(btnHeader);
                }
                
                var main = document.getElementsByTagName("main");
                document.body.removeChild(main[0]);
                main=document.createElement("main");
                main.id="mainPregunta";
                document.body.appendChild(main);
                
                var footer = document.getElementsByTagName("footer");
                document.body.removeChild(footer[0]);
                footer=document.createElement("footer");
                footer.id="footerPregunta";
                document.body.appendChild(footer);
                
                var contenedor=document.createElement("div");
                contenedor.innerHTML=y;
                var pregunta = contenedor;
                
                for(var i=0;i<y.length;i++){
                        var plantilla=modeloPregunta.cloneNode(true);
                        console.log();
                        generarPregunta(modeloPregunta.cloneNode(true),y[i]);
                   
                    }
                    
                    // var scriptEnviar = document.createElement("script");
                    // scriptEnviar.src="api/enviarExamen.js";
                    // main.appendChild(scriptEnviar);
                    
                    // empezarExamen(document.getElementsByClassName("pregunta-container"));
                    
                });
            });
            
        };
        
        function generarHeader(objeto,tamaño){
            var boton=document.createElement("button");
            boton.innerHTML=tamaño;
            boton.id="boton"+objeto.id;
            return boton;
        }
        
        function generarPregunta(plantilla,y){
            
            var respuesta = JSON.parse(y.respuestas);

    plantilla.getElementsByClassName("enunciado-container")[0].innerHTML=y.enunciado;

    plantilla.getElementsByClassName("respuesta")[0].innerHTML=respuesta[0].Enunciado;
    console.log(plantilla.getElementsByClassName("respuesta")[0]);

    plantilla.getElementsByClassName("respuesta")[1].innerHTML=respuesta[1].Enunciado;
    (plantilla.getElementsByClassName("respuesta")[0].childNodes[1]);

    plantilla.getElementsByClassName("respuesta")[2].innerHTML=respuesta[2].Enunciado;

        document.body.appendChild(plantilla);
}
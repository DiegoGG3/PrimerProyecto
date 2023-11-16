function hacerExamen(ev) {
  ev.preventDefault();
  var idExamen=this.id;//ID del examen a hacer
  
  fetch('./interfaz/pregunta.html')
      .then(x=>x.text())
      .then(texto => {
          var almacen=document.createElement("div");
          almacen.innerHTML=texto;
          var modeloPregunta=almacen.querySelector(".pregunta-container");
        console.log(modeloPregunta);
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

              for(var i=0;i<y.length;i++){
                  var plantilla=modeloPregunta.cloneNode(true);
                  generarPregunta(plantilla,y[i]);
                  plantilla.childNodes[7].childNodes[3].setAttribute("onclick", "pasarPregunta(this.parentNode.parentNode.id)");
                  if(y.length-1==i){
                      plantilla.childNodes[7].childNodes[3].setAttribute("onclick", "enviarExamen(this)");
                      plantilla.childNodes[7].childNodes[3].innerHTML="Enviar";
                  }
                  main.appendChild(plantilla);
              }
              console.log(document.getElementsByClassName("pregunta-container"));
              // var scriptEnviar = document.createElement("script");
              // scriptEnviar.src="api/enviarExamen.js";
              // main.appendChild(scriptEnviar);
              // empezarExamen(document.getElementsByClassName("pregunta-container"));
          });
      })
      
}
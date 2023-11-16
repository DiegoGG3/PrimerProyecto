function hacerExamen(ev) {
  ev.preventDefault();
  var idExamen=this.id;//ID del examen a hacer
  
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



                    var xhr = new XMLHttpRequest();

                    xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var respuesta = JSON.parse(this.responseText);

                        var preguntas = respuesta.preguntas;
                        console.log(respuesta.preguntas);
                    }
                    };
                    xhr.open("GET", "./api/apiCargarExamen.php", true);
                    xhr.send();

            
                for(let i=0;i<y.length;i++){
                    var pregAux=pregunta.cloneNode(true);

                    pregAux.getElementsByClassName("enunciado-container")[0].innerHTML=y[i].enunciado;
                    pregAux.getElementsByClassName("respuesta")[0].innerHTML=y[i].respuesta1;
                    pregAux.getElementsByClassName("respuesta")[1].innerHTML=y[i].respuesta2;
                    pregAux.getElementsByClassName("respuesta")[2].innerHTML=y[i].respuesta3;

                    main.appendChild(pregAux);
                }        
          });
      })
    
}

// function crearPregunta(boton){
//     var enunciado=document.getElementsByTagName('textarea')[0].value;
//     var arrayRespuesta1= new Array();
//     var arrayRespuesta2= new Array();
//     var arrayRespuesta3= new Array();

//     arrayRespuesta1.push('"IdRespuesta":1');
//     arrayRespuesta1.push('"ValorRespuesta":A');
//     arrayRespuesta1.push('"Enunciado":'+ document.getElementsByTagName('input')[0].value);

//     arrayRespuesta2.push('"IdRespuesta":2');
//     arrayRespuesta2.push('"ValorRespuesta":B');
//     arrayRespuesta2.push('"Enunciado":'+ document.getElementsByTagName('input')[1].value);

//     arrayRespuesta3.push('"IdRespuesta":3');
//     arrayRespuesta3.push('"ValorRespuesta":C');
//     arrayRespuesta3.push('"Enunciado":'+ document.getElementsByTagName('input')[2].value);

//     var categoria=document.getElementsByTagName('select')[0].value;
//     var dificultad=document.getElementsByTagName('select')[1].value;
//     var buena=document.getElementsByTagName('select')[2].value;

//     switch (buena) {
//       case 1:
//         arrayRespuesta1.push('"Correcta":true');
//         arrayRespuesta2.push('"Correcta":false');
//         arrayRespuesta3.push('"Correcta":false');

//         break;
//       case 2:
//         arrayRespuesta1.push('"Correcta":false');
//         arrayRespuesta2.push('"Correcta":true');
//         arrayRespuesta3.push('"Correcta":false');
//           break;
//       case 3:
//         arrayRespuesta1.push('"Correcta":false');
//         arrayRespuesta2.push('"Correcta":false');
//         arrayRespuesta3.push('"Correcta":true');
//           break;
//       default:
//         console.log("Opción no válida");

//   }


    
//   }

  function crearPregunta(boton) {
    // Obtener valores del formulario
    var enunciado = document.getElementById("enunciado").value;
    var categoria = document.getElementById("categoria").value;
    var dificultad = document.getElementById("dificultad").value;
    var buena = document.getElementById("buena").value;

    // Recopilar respuestas en formato JSON
    var respuestas = [];
    var letra;
    for (var i = 1; i <= 3; i++) {
      switch (i) {
        case 1:
          letra="A";
          break;
        case 2:
          letra="B";

          break;
        case 3:
          letra="C";

          break;
      }
        var respuestaInput = document.getElementById(i);
        respuestas.push({
            IdRespuesta: i,
            ValorRespuesta: letra,
            Enunciado: respuestaInput.value, // Cambia esto según lo que desees
            Correcta: i == buena
        });
    }

    // Crear objeto con los datos
    var preguntaData = {
        Enunciado: enunciado,
        Respuestas: JSON.stringify(respuestas),
        Categoria: categoria,
        Dificultad: dificultad,
        Tipo_recurso: null,
        url: null
    };

    fetch('api/apiCrearPregunta.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({"preguntaData":preguntaData})

    })
  .then(response => response.text())
  .then(data => {
      location.reload();
  });
  
}

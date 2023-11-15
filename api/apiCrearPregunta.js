function crearPregunta(boton){
    var enunciado=document.getElementsByTagName('textarea')[0].value;
    var arrayRespuesta= new Array();
    for (var i = 0; i < 3; i++) {
        arrayRespuesta.push(document.getElementsByTagName('input')[i].value);
    }
    var categoria=document.getElementsByTagName('select')[0].value;
    var dificultad=document.getElementsByTagName('select')[1].value;
    var buena=document.getElementsByTagName('select')[2].value;

    fetch('api/apiCrearPregunta.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({"enunciado":enunciado,"arrayRespuesta":arrayRespuesta,"categoria":categoria,"dificultad":dificultad, "buena":buena})
    })
    .then(response => response.text())
    .then(data => {
    //   location.reload();
    });
  }

function crearExamen(boton){

    var dificultad=boton.parentNode.childNodes[3].value;
    var categoria=boton.parentNode.childNodes[7].value;

    fetch('api/apiCrearExamen.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({"dificultad":dificultad, "categoria":categoria})
    })
    .then(response => response.text())
    .then(data => {
      location.reload();
      

    });
  }

function aceptarUser(boton){

    var idUser=boton.parentNode.parentNode.childNodes[1].id;
    var rol=boton.parentNode.parentNode.childNodes[7].childNodes[1].value;

    console.log(rol);
    fetch('api/apiAceptar.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({"idUser":idUser})//Aqui se pasa la id.
    })
    .then(response => response.text())
    .then(data => {
      console.log("Perfe manin");
    });
  }
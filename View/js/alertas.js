const formulariosAjax = document.querySelectorAll(".FormularioAjax");

function enviarFormAjax(e) {
  e.preventDefault();
  let data = new FormData(this);
  let method = this.getAttribute("method");
  let action = this.getAttribute("action");
  let tipo = this.getAttribute("data-form");

  let encabezados = new Headers();
  let config = {
    method: method,
    headers: encabezados,
    mode: "cors",
    cache: "no-cache",
    body: data,
  };

  let textoAlerta;

  if (tipo === "save") {
    textoAlerta = "Los datos se guardaran en el sistema";
  } else if (tipo === "delete") {
    textoAlerta = "Los datos seran eliminados del sistema";
  } else if (tipo === "update") {
    textoAlerta = "Los datos del sistema seran actualizados";
  } else if (tipo === "search") {
    textoAlerta = "Se eliminara el termino de busqueda";
  } else {
    textoAlerta = "quieres realizar la operacion solicitada";
  }
  Swal.fire({
    title: "¿ Estas seguro ?",
    text: textoAlerta,
    type: "question",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      fetch(action, config)
        .then((respuesta) => respuesta.json())
        .then((respuesta) => {
          return alertAjax(respuesta);
        });
    }
  });
}

formulariosAjax.forEach((formularios) => {
  formularios.addEventListener("submit", enviarFormAjax);
});

function alertAjax(alerta) {
  if (alerta.Alerta === "simple") {
    Swal.fire({
      title: alerta.titulo,
      text: alerta.texto,
      type: alerta.tipo,
      confirmButtonText: "Aceptar",
    });
  } else if (alerta.Alerta === "recargar") {
    Swal.fire({
      title: alerta.titulo,
      text: alerta.texto,
      type: alerta.tipo,
      confirmButtonText: "Aceptar",
    }).then((result) => {
      if (result.value) {
        location.reload();
      }
    });
  } else if (alerta.Alerta === "limpiar") {
    Swal.fire({
      title: alerta.titulo,
      text: alerta.texto,
      type: alerta.tipo,
      confirmButtonText: "Aceptar",
    }).then((result) => {
      if (result.value) {
        document.querySelector(".FormularioAjax").reset();
      }
    });
  } else if (alerta.Alerta === "redireccionar") {
    window.location.href = alerta.URL;
  }
}

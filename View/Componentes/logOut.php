<script>
let btnSalir = document.querySelector(".btn-exit-system");
btnSalir.addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Quieres salir del sistema?',
        text: "La sesion actual se cerrara y saldras del sistema",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, salir!',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.value) {
            let url = '<?php echo SERVERURL; ?>Ajax/loginAjax.php';
            let token = '<?php echo  $ins_logincontroller->encryption($_SESSION['token_MVC']); ?>';
            let username =
                '<?php echo  $ins_logincontroller->encryption($_SESSION['username_MVC']); ?>';
            let datos = new FormData();
            datos.append("token", token);
            datos.append("username", username);
            fetch(url, {
                    method: 'POST',
                    body: datos
                })
                .then((respuesta) => respuesta.json())
                .then((respuesta) => {
                    return alertAjax(respuesta);
                });


        }
    });
});
</script>
<?php 
require('inc/esenciales.php');
adminLogin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Admin - Configuraciones</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php include('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">CONFIGURACIONES</h3>

                <!-- Card de Configuraciones Generales -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Configuraciones Generales</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Título del Sitio</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Acerca de Nosotros</h6>
                        <p class="card-text" id="site_about"></p>  
                    </div>
                </div>

                <!-- Modal de Configuraciones Generales -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Configuraciones Generales</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Título del Sitio</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Acerca de Nosotros</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required ></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn custom-bg text-dark shadow-none">ENVIAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Fin del Card de Configuraciones Generales -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.checked)" class="form-check-input" type="checkbox" id="shutdown_toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            No customer will be able to access the website if enabled.
                        </p>  
                    </div>
                </div>

            </div> <!-- /col -->
        </div> <!-- /row -->
    </div> <!-- /container -->

    <?php require('inc/scripts.php'); ?>
    <script>
        let general_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

function get_general() 
{
        let site_title = document.getElementById('site_title');
        let site_about = document.getElementById('site_about');

        let shutdown_toggle = document.getElementById('shutdown_toggle');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
        console.log("Respuesta del servidor:", this.responseText); // para verificar
        general_data = JSON.parse(this.responseText);

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

            if (general_data.shutdown == 0) {
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
                } else {
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }
        
        }

    xhr.send('get_general=1');
}

general_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    upd_general(site_title_inp.value,site_about_inp.value);
})

function upd_general(site_title_val, site_about_val) 
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
         var modal = bootstrap.Modal.getInstance(document.getElementById('general-s'));
            modal.hide();
        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_general();

        } else {
            alert('error', 'No changes made!');
        }
    }

    xhr.send('upd_general=1&site_title=' + site_title_val + '&site_about=' + site_about_val);
}

function upd_shutdown(val) 
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.responseText == 1 && general_data.shutdown==0) 
        {
            alert('success', 'Website shutdown enabled!');
        }
        else
        {
            alert('success', 'Website shutdown disabled!');
        }
        get_general();
         
        }

    xhr.send('upd_shutdown=1&shutdown=' + (val ? 1 : 0));
        
}

window.onload = function(){
    get_general();
}
</script>


</body>
</html>
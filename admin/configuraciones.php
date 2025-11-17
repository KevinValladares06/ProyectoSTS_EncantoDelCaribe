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
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Cierre del Sitio Web</h5>
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

                <!-- Detalles Contáctanos -->
                 <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Ajustes Contáctanos</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Dirección</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Maps</h6>
                                    <p class="card-text" id="gmap"></p> 
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Teléfonos</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"></span>
                                    </p> 
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p> 
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Redes Sociales</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p> 
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="ig"></span>
                                    </p> 
                                    <p class="card-text">
                                        <i class="bi bi-tiktok me-1"></i>
                                        <span id="tt"></span>
                                    </p> 
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- Modal de Configuración Contáctanos -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Configuración Contáctanos</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Dirección</label>
                                                    <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Maps Link</label>
                                                    <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Teléfonos (with country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email</label>
                                                    <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Redes Sociales</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" name="ig" id="ig_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-tiktok"></i></span>
                                                        <input type="text" name="tt" id="tt_inp" class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iFrame Src</label>
                                                    <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn custom-bg text-dark shadow-none">ENVIAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div> <!-- /col -->
        </div> <!-- /row -->
    </div> <!-- /container -->

    <?php require('inc/scripts.php'); ?>
    <script>
        let general_data, contacts_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');
        let contacts_s_form = document.getElementById('contacts_s_form');

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

general_s_form.addEventListener('submit', function(e)
{
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

function get_contacts() 
{
    let contacts_p_id = ['address','gmap', 'pn1','pn2','email','fb','ig','tt'];
    let iframe = document.getElementById('iframe');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        let contacts_data = JSON.parse(this.responseText);   
        
        document.getElementById('address').innerText = contacts_data.address || '';
        document.getElementById('gmap').innerText = contacts_data.gmap || '';
        document.getElementById('pn1').innerText = contacts_data.pn1 || '';
        document.getElementById('pn2').innerText = contacts_data.pn2 || '';
        document.getElementById('email').innerText = contacts_data.email || '';
        document.getElementById('fb').innerText = contacts_data.fb || '';
        document.getElementById('ig').innerText = contacts_data.ig || '';
        document.getElementById('tt').innerText = contacts_data.tt || '';
        
        if(contacts_data.iframe) {
            iframe.src = contacts_data.iframe;
        }

        contacts_inp(contacts_data);
    }

    xhr.send('get_contacts=1');
}

function contacts_inp(data)
{
    document.getElementById('address_inp').value = data.address || '';
    document.getElementById('gmap_inp').value = data.gmap || '';
    document.getElementById('pn1_inp').value = data.pn1 || '';
    document.getElementById('pn2_inp').value = data.pn2 || '';
    document.getElementById('email_inp').value = data.email || '';
    document.getElementById('fb_inp').value = data.fb || '';
    document.getElementById('ig_inp').value = data.ig || '';
    document.getElementById('tt_inp').value = data.tt || '';
    document.getElementById('iframe_inp').value = data.iframe || '';
}

contacts_s_form.addEventListener('submit', function(e)
{
    e.preventDefault();
    upd_contacts();
})

function upd_contacts() 
{
    let address = document.getElementById('address_inp').value;
    let gmap = document.getElementById('gmap_inp').value;
    let pn1 = document.getElementById('pn1_inp').value;
    let pn2 = document.getElementById('pn2_inp').value;
    let email = document.getElementById('email_inp').value;
    let fb = document.getElementById('fb_inp').value;
    let ig = document.getElementById('ig_inp').value;
    let tt = document.getElementById('tt_inp').value;
    let iframe = document.getElementById('iframe_inp').value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var modal = bootstrap.Modal.getInstance(document.getElementById('contacts-s'));
        modal.hide();
        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_contacts();
        } else {
            alert('error', 'No changes made!');
        }
    }

    xhr.send('upd_contacts=1&address=' + address + 
             '&gmap=' + gmap + 
             '&pn1=' + pn1 + 
             '&pn2=' + pn2 + 
             '&email=' + email + 
             '&fb=' + fb + 
             '&ig=' + ig + 
             '&tt=' + tt + 
             '&iframe=' + iframe);
}


window.onload = function(){
    get_general();
    get_contacts();
}

</script>
</body>
</html>
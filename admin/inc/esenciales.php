<?php


// --- Propósito frontend ---
define('SITE_URL', 'http://127.0.0.1/ProyectoSTS_EncantoDelCaribe/');
define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');

// --- Propósito backend (procesos de carga) ---
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ProyectoSTS_EncantoDelCaribe/images/');
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');


function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "
        <script>
            window.location.href = 'index.php';
        </script>";
        exit;
    }
    session_regenerate_id(true);
}
function redirect($url)
{
    echo "
        <script>
            window.location.href = '$url';
        </script>";
    exit;
}

function alert($type, $msg)
{
    $bs_class = ($type == 'success') ? 'alert-success' :  'alert-danger';
    echo <<<alert
                 <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                    <strong class="me-3">$msg</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
}

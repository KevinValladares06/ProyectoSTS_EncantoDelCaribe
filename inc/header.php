    <?php 
        require('admin/inc/db_config.php');
        require('admin/inc/esenciales.php');
    ?>
    
    
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Encanto del Caribe</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link me-2" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="habitaciones.php">Habitaciones</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="contactanos.php">Contáctanos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="nosotros.php">Sobre Nosotros</a>
                </li>
                
            </ul>
                <div class="d-flex">
                    <?php 
                    if(isset($_SESSION['login'])&& $_SESSION['login'] ==true)
                    {
                        $path = USERS_IMG_PATH;
                        echo<<<data
                    <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                              <img src="$path$_SESSION[uPic]" style="width: 25 px; height: 25px;" class="me-1">
                              $_SESSION[uName]
                            </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                           <li><a class="dropdown-item" href="profile.php" >Profile</a></li>
                           <li><a class="dropdown-item" href="booking.php" >Bookings</a></li>
                           <li><a class="dropdown-item" href="logout.php" >Logout</a></li>
                        </ul>
                    </div>
                        data;
                    }
                    else
                    {
                        echo<<<data
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                           Iniciar Sesión
                        </button>
                        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                           Registrarse
                        </button>
                        data;
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class="bi bi-person-fill fs-3 me-2"></i>User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico / Telefono</label>
                            <input type="text" name="email_mob" required class="form-control shadow-none" >
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="pass" required class="form-control shadow-none" >
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Login</button>
                            <button type="button" class="btn text-secondary text-decoration-none btn-outline-dark shadow-none; p-0" data-bs-toggle="modal" data-bs-target="#forgotModal">
                               ¿Olvidó su contraseña?
                            </button>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>    
                        Registro de Usuario
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Nota: Al registrarse, se aceptan nuestros Términos y Condiciones, así como la Política de Privacidad.
                            Tus datos deben coincidir con tu identificación.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Numero telefónico</label>
                                    <input name= "phonenum" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Imagen</label>
                                    <input name= "profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Codigo postal</label>
                                    <input name="pincode" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Fecha de nacimiento</label>
                                    <input name="dob" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <input name="pass" type="password" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirmar Contraseña</label>
                                    <input name="cpass" type="password" class="form-control shadow-none" required>
                                </div>
                            </div>
                        </div>

                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">Registrarse</button>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="forgot-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class="bi bi-person-fill fs-3 me-2"></i>Forgot Password
                        </h5>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Nota: a link will be sent to your email to reset your password!
                        </span>
                        <div class="mb-4">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" required class="form-control shadow-none" >
                        </div>
                        <div class="mb-2 text-end">
                            <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                               Cancel
                            </button>
                            <button type="submit" class="btn btn-dark shadow-none">Send Link</button>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>
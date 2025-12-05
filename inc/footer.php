    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">Hotel El Caribe</h3>
                <p>¡Tu estadia para nosotros es importante!</p>
            </div>
            <div class="col-lg-2 p-4">
                
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Inicio</a> <br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Habitaciones</a> <br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Servicios</a> <br>
                <a href="contactanos.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contáctanos</a> <br>
                <a href="nosotros.php" class="d-inline-block mb-2 text-dark text-decoration-none">Sobre Nosotros</a> <br>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Siguenos</h5>
                <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2" target="_blank">
                    <i class="bi bi-facebook me-1"></i>Facebook
                </a>
                <br>
                <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block text-dark text-decoration-none mb-2" target="_blank">
                    <i class="bi bi-instagram me-1"></i>Instagram
                </a>
                <br>
                <a href="<?php echo $contact_r['tt'] ?>" class="d-inline-block text-dark text-decoration-none" target="_blank">
                    <i class="bi bi-tiktok me-1"></i>Tik Tok
                </a>
                <br>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">Diseñado por Equipo #6 - 2025</h6>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="htpps://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", 
        {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }
        });
    </script>
    <script>
    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: 3,
      loop:true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints:{
        320:{
            slidesPerView:1,
        },
        640:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1024:{
            slidesPerView:3,
        },
      }
    });
</script>

<script>

function alert(type, msg, position='body') {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');

        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    if (position == 'body'){
        document.body.append(element);
        element.classList.add('custom-alert'); 
    }
    else{
        document.getElementById(position).appendChild(element);
    }
        
        setTimeout(remAlert,3000);
    }

    function remAlert(){
        document.getElementById('alert')[0].remove();
    }


    function setActive()
    {
       let navbar = document.getElementById('nav-bar');
       let a_tags = navbar.getElementsByTagName('a');

        for(i=0, i<a_tags.length; i++)
        {
        let file = a_tags[i].href.split('/').pop();
        let file_name = file.split('.')[0];

        if(document.location.href.indexOf(file_name)>=0){
            a_tags[i].classList.add('active');
        }
       }
    }

    let register_form = document.getElementById('register_form');

register_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('pincode', register_form.elements['pincode'].value);
    data.append('dob', register_form.elements['dob'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('profile', register_form.elements['profile'].files[0]);
    data.append('register', '');

    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);

    xhr.onload = function(){
        if(this.responseText == 'pass_mismatch'){
            alert("error", "Las contraseñas no coinciden");
        }
        else if(this.responseText == 'email_already'){
            alert("error", "El correo electronico esta registrado!");
        }
         else if(this.responseText == 'phone_already'){
            alert("error", "El numero telefonico esta registrado!");
         }
         else if(this.responseText == 'inv_img'){
            alert("error", "Imagen invalida!");
         }
         else if(this.responseText == 'upd_failed'){
            alert("error", "La carga de la imagen fallo. Intente de nuevo!");
         }
         else if(this.responseText == 'mail_failed'){
            alert("error", "Fallo el envio del correo. Intente de nuevo!");
         }
         else if(this.responseText == 'ins_failed'){
            alert("error", "La inscripcion fallo. Intente de nuevo!");
         }
         else{
            alert("success", "Registro exitoso. Verifique su correo electronico para la confirmacion.");
            register_form.reset();
         }

    }

     let login_form = document.getElementById('login_form');

    login_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('email_mob', login_form.elements['email_mob'].value);
    data.append('pass', login_form.elements['pass'].value);
    data.append('login', '');

    var myModal = document.getElementById('loginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);

    xhr.onprogress = function() {
        
    }

    xhr.onload = function(){
        if(this.responseText == 'inv_email_mob'){
            alert("error", "Invalid Email or Mobile Number!");
        }
        else if(this.responseText == 'not_verificied'){
            alert("error", "El correo electronico no esta verificado!");
        }
         else if(this.responseText == 'inactive'){
            alert("error", "Account Suspended! Please Contact Admin.");
         }
         else if(this.responseText == 'invalid_pass'){
            alert("error", "Contraseña Incorrecta!");
         }
         
         else{
            window.location = window.location.pathname;
        }

    }

    let forgot_form = document.getElementById('forgot_form');

    forgot_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('email', login_form.elements['email'].value);
    data.append('forgot_pass', '');

    var myModal = document.getElementById('forgotModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);

    xhr.onload = function(){
        if(this.responseText == 'inv_email'){
            alert("error", "Invalid Email");
        }
        else if(this.responseText == 'not_verificied'){
            alert("error", "El correo electronico no esta verificado! Please contact Admin");
        }
         else if(this.responseText == 'inactive'){
            alert("error", "Account Suspended! Please Contact Admin.");
         }
         else if(this.responseText == 'mail_failed'){
            alert("error", "Cannot send email. Server Down!");
         }
          else if(this.responseText == 'upd_failed'){
            alert("error", "Account recovery failed. Server Down!");
         }
         
         else{
            alert("success", "Reset link sent to email!");
            forgot_form.reset();
        }

    }



    setActive();
</script>
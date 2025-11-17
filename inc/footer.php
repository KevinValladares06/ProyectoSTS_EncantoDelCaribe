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
    setActive();
</script>
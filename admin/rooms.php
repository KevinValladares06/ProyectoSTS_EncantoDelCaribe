<?php
require('inc/esenciales.php');
require('inc/db_config.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Admin - Habitaciones</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php include('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">HABITACIONES</h3>

                <!-- Features Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        
                        <!-- Features Table -->
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantily</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                    <!-- Los datos se cargarán con JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- /col -->
        </div> <!-- /row -->
    </div> <!-- /container -->

    <!-- Add room Modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Area</label>
                            <input type="number" min="1" name="area" class="form-control shadow-none" required>
                        </div>
                          <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" min="1" name="price" class="form-control shadow-none" required>
                        </div>
                          <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Quantily</label>
                            <input type="number" min="1" name="quantily" class="form-control shadow-none" required>
                        </div>
                          <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Adult (Max .)</label>
                            <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                        </div>
                         <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Children (Max .)</label>
                            <input type="number" min="1" name="children" class="form-control shadow-none" required>
                        </div>
                        <div class=" col-12 mb-3">
                           <label class="form-label fw-bold">Features</label>
                           <div class="row">
                            <?php
                            $res = selectAll ('features');
                            while($opt = mysqli_fetch_assoc($res)){
                                echo"
                                <div class='col-md-3 mb-1'>
                                <label>
                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                                </label>
                                </div>
                                ";
                            }
                            ?>
                           </div>
                        </div>
                        <div class=" col-12 mb-3">
                           <label class="form-label fw-bold">Facilities</label>
                           <div class="row">
                            <?php
                            $res = selectAll ('features');
                            while($opt = mysqli_fetch_assoc($res)){
                                echo"
                                <div class='col-md-3 mb-1'>
                                <label>
                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                                </label>
                                </div>
                                ";
                            }
                            ?>
                           </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

     <!-- Edit room Modal -->
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Habitación</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Area</label>
                            <input type="number" min="1" name="area" class="form-control shadow-none" required>
                        </div>
                          <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Precio</label>
                            <input type="number" min="1" name="price" class="form-control shadow-none" required>
                        </div>
                          <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Cantidad</label>
                            <input type="number" min="1" name="quantily" class="form-control shadow-none" required>
                        </div>
                          <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Adultos (Max .)</label>
                            <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                        </div>
                         <div class=" col-md-6 mb-3">
                            <label class="form-label fw-bold">Niños (Max .)</label>
                            <input type="number" min="1" name="children" class="form-control shadow-none" required>
                        </div>
                        <div class=" col-12 mb-3">
                           <label class="form-label fw-bold">Caracteristicas</label>
                           <div class="row">
                            <?php
                            $res = selectAll ('features');
                            while($opt = mysqli_fetch_assoc($res)){
                                echo"
                                <div class='col-md-3 mb-1'>
                                <label>
                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                                </label>
                                </div>
                                ";
                            }
                            ?>
                           </div>
                        </div>
                        <div class=" col-12 mb-3">
                           <label class="form-label fw-bold">Servicios</label>
                           <div class="row">
                            <?php
                            $res = selectAll ('features');
                            while($opt = mysqli_fetch_assoc($res)){
                                echo"
                                <div class='col-md-3 mb-1'>
                                <label>
                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                                </label>
                                </div>
                                ";
                            }
                            ?>
                           </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                        </div>
                        <input type="hidden" name="room-id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage rooms images -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" >Nombre Habitación</h1>
            <button type="button" class="btn-close shasow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="image-alert">

            </div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label for="form-label fw-bold">Añadir Imagen</label>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control shadow-none mb-3" required>
                            <button type="submit" class="btn custom-bg text-white shadow-none">Añadir</button> 
                            <input type="hidden" name="room_id">
                        </form>
                    </div>
                    <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light sticky-top">
                                        <th scope="col" width="60%">Imagen</th>
                                        <th scope="col">Miniatura</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="room-image-data">
                                </tbody>
                            </table>
                        </div>
                </div> 
            </div>
        </div>
    </div>


      <?php require('inc/scripts.php'); ?>

      <script>
        let add_room_form = document.getElementById('add_room_form');

        add_room_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_room();
      });

      function add_room()
      {
        let data = new FormData();
        data.append('add_room', '');
        data.append('name', add_room_form.elements['name'].value);
        data.append('area', add_room_form.elements['area'].value);
        data.append('price', add_room_form.elements['price'].value);
        data.append('quantily', add_room_form.elements['quantily'].value);
        data.append('adult', add_room_form.elements['adult'].value);
        data.append('childern', add_room_form.elements['children'].value);
        data.append('desc', add_room_form.elements['desc'].value);

        let features =[];
        add_rooms_form.elements['features'].forEach(el => {
            if(el.checked){
                features.push(el.value);
            }
        });

         
        let facilities =[];
        add_rooms_form.elements['facilities'].forEach(el => {
            if(el.checked){
                facilities.push(el.value);
            }
        });

        data.append('features',JSON.stringify(features));
        data.append('facilities',JSON.stringify(facilities));

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
     
        xhr.onload = function(){

        var myModal = document.getElementById('add-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 1){
            alert('success','New Room Added!');
            add_room_form.reset();
            get_all_rooms();
        }
        else{
            alert('error','Server Down!');
        }
    };
      xhr.send(data);


    }

    function get_all_rooms()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     
        xhr.onload = function(){
           document.getElementById('room-data').innerHTML = this. responseText;
        }
      xhr.send('get_all_rooms');
    }

    let edit_room_form = document.getElementById('edit_room_form');

    function edit_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     
        xhr.onload = function(){
            let data = JSON.parse(this.responseText);

            edit_rooms_form.elements ['name'].value = data.roomdata.name;
            edit_rooms_form.elements ['area'].value = data.roomdata.area;
            edit_rooms_form.elements ['price'].value = data.roomdata.price;
            edit_rooms_form.elements ['quantily'].value = data.roomdata.quantily;
            edit_rooms_form.elements ['adult'].value = data.roomdata.adult;
            edit_rooms_form.elements ['children'].value = data.roomdata.children;
            edit_rooms_form.elements ['desc'].value = data.roomdata.description;
            edit_rooms_form.elements ['room_id'].value = data.roomdata.id;

            edit_room_form.elements['features'].forEach(el => {
            if(data.features.includes(Number(el.value))){
                el.checked = true;
            }
        });
            
            edit_room_form.elements['facilities'].forEach(el => {
            if(data.facilities.includes(Number(el.value))){
                el.checked = true;
            }
        });
        }

      xhr.send('get_room='+id);
    }

     edit_room_form.addEventListener('submit', function(e){
        e.preventDefault();
        submit_edit_room();
      });

       function submit_edit_room()
      {
        let data = new FormData();
        data.append('edit_room', '');
        data.append('room_id', edit_room_form.elements['room_id'].value);
        data.append('name', edit_room_form.elements['name'].value);
        data.append('area', edit_room_form.elements['area'].value);
        data.append('price', edit_room_form.elements['price'].value);
        data.append('quantily', edit_room_form.elements['quantily'].value);
        data.append('adult', edit_room_form.elements['adult'].value);
        data.append('childern', edit_room_form.elements['children'].value);
        data.append('desc', edit_room_form.elements['desc'].value);

        let features =[];
        edit_room_form.elements['features'].forEach(el => {
            if(el.checked){
                features.push(el.value);
            }
        });

         
        let facilities =[];
        edit_room_form.elements['facilities'].forEach(el => {
            if(el.checked){
                facilities.push(el.value);
            }
        });

        data.append('features',JSON.stringify(features));
        data.append('facilities',JSON.stringify(facilities));

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
     
        xhr.onload = function(){

        var myModal = document.getElementById('edit-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 1){
            alert('success','Room data edited!');
            edit_room_form.reset();
            get_all_rooms();
        }
        else{
            alert('error','Server Down!');
        }
    };
      xhr.send(data);


    }
    
      
    function toggle_status(id, val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     
        xhr.onload = function(){
          if(this. responseText==1){
            alert('sucess','Status toggled!');
            get_all_rooms();
          }
          else{
            alert('sucess','Server Down:');
          }
        }
      xhr.send('toggle_status='+id+'&value='+val);
    }

    let add_image_form = document.getElementById('add_image_form');

    add_image_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_image();
      }); 

    function add_image(){
        let data = new FormData();
        
        data.append('image', add_image_form.elements['image'].files[0]);
        data.append('room_id', add_image_form.elements['room_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function()
        {

            if(this.responseText == 'inv_img'){
                alert('error','Solo JPG, WEBP o PNG son aceptados', 'image-alert');
            }
            else if(this.responseText == 'inv_size'){
                alert('error','Image should be less than 2MB!', 'image-alert');
            }
            else if(this.responseText == 'upd_failed'){
                alert('error','Carga de imagen fallida. Server Down!', 'image-alert');
            }
            else{
                alert('success','Nueva Imagen añadida!', 'image-alert');
                room_images(add_image_form.elements['room_id'].value, document.querySelector('#room-images .modal-title').innerText);  
                add_image_form.reset();
            }
        }
        xhr.send(data);
    }

    function room_images(id,rname){
        document.querySelector('#room-images .modal-title').innerText = rname;
        add_image_form.elements['room_id'].value = id;   
        add_image_form.elements['image'].value = '';   

         let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     
        xhr.onload = function(){
          document.getElementById('room-image-data').innerHTML = this. responseText;
        }
      xhr.send('get_room_images='+id);
    }

    function rem_image(img_id, room_id)
    {
        let data = new FormData();
        
        data.append('image_id',img_id);
        data.append('room_id', room_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function()
        {

            if(this.responseText == 1){
                
                alert('success','Imagen Removida!', 'image-alert');
                room_images(room_id, document.querySelector('#room-images .modal-title').innerText);  

            }
            else{
                alert('error','La imagen no fue romovida', 'image-alert');
                
            }
        }
        xhr.send(data);
    }

    function thumb_image(img_id, room_id)
    {
        let data = new FormData();
        
        data.append('image_id',img_id);
        data.append('room_id', room_id);
        data.append('thumb_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function()
        {

            if(this.responseText == 1){
                
                alert('success','Imagen thumbnail ha cambiado!', 'image-alert');
                room_images(room_id, document.querySelector('#room-images .modal-title').innerText);  

            }
            else{
                alert('error','Thumbnail no fue actualizado', 'image-alert');
                
            }
        }
        xhr.send(data);
    }

    function remove_room(room_id)
    {
        if(confirm("¿Estás seguro de eliminar esta habitación?")){
            let data = new FormData();
            data.append('room_id',room_id);
            data.append('remove_room','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function()
            {

                if(this.responseText == 1){
                    
                    alert('success','La habitación fue eliminada!');
                    get_all_rooms();
                }
                else{
                    alert('error','Fallo al eliminar habitación');
                    
                }
            }
            xhr.send(data);
        }
        
    }
    

    window.onload = function(){
        get_all_rooms();
    }
      </script>
</body>
</html>
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
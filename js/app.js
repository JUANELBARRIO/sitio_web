function login() {
    var usuario = document.getElementById('txtusuario').Value;
    var passwd = document.getElementById('txtpasswd').Value;
    alert('usuario:'+ usuario +',contraseña:'+ passwd);
}

$ (document).ready(function(){
    $('#login-button').onClick(function(event){
        var usuario = $('#txtusuario').Value;
        var passwd = $('txtpasswd').Value;
        event.preventDefault();
        login(usuario,passwd);
    });
});
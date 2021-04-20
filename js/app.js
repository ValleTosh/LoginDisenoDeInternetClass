   // Form Registro de Usuario
   $(document).on("submit", ".form_registro", function(event){
        event.preventDefault();
        var $form = $(this);

        var data_form = {
         email: $("input[type = 'email']", $form).val(),
        password: $("input[type = 'password']", $form).val(),
        empresa: $("input[type = 'text']", $form).val()
    }
    if(data_form.email.length < 16){
            $("#msg_error").text("Ingrese un email válido.").show();
            return false;
    }else if(data_form.password.length < 8){
        $("#msg_error").text("Tu contraseña debe ser mínimo de 8 caracteres.").show();
            return false;
    }
   $("#msg_error").hide(); 
    var url_php = 'http://localhost/LoginWeb/ajax/procesarRegistro.php';
    
    $.ajax({
        type: 'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
        console.log(res);
        if(res.error !== undefined){
            $("#msg_error").text(res.error).show();
            return false;
        }
        if(res.redirect !== undefined){
            window.location = res.redirect;
        }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })
    return false;
})
      
      // Form de Login de Usuario
    $(document).on("submit", ".form_login", function(event){
        event.preventDefault();
        var $form = $(this);

        var data_form = {
         email: $("input[type = 'email']", $form).val(),
        password: $("input[type = 'password']", $form).val(),
        empresa: $("input[type = 'text']", $form).val()
    }
    if(data_form.email.length < 16){
            $("#msg_error").text("Ingrese un email válido.").show();
            return false;
    }else if(data_form.password.length < 8){
        $("#msg_error").text("Tu contraseña debe ser mínimo de 8 caracteres.").show();
            return false;
    }
   $("#msg_error").hide(); 
    var url_php = 'http://localhost/LoginWeb/ajax/procesarLogin.php';
    
    $.ajax({
        type: 'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
        console.log(res);
        if(res.error !== undefined){
            $("#msg_error").html(res.error).show();
            return false;
        }
        if(res.redirect !== undefined){
            window.location = res.redirect;
        }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })
    return false;
})
    

 // Form Modificar Usuario
   $(document).on("submit", ".form_modificar", function(event){
        event.preventDefault();
        var $form = $(this);

        var data_form = {
         email: $("input[type = 'email']", $form).val(),
        password: $("input[type = 'password']", $form).val(),
        empresa: $("input[type = 'text']", $form).val()
    }
    if(data_form.email.length < 16){
            $("#msg_error").text("Ingrese un email válido.").show();
            return false;
    }else if(data_form.password.length < 8){
        $("#msg_error").text("Tu contraseña debe ser mínimo de 8 caracteres.").show();
            return false;
    }else if(data_form.empresa.length < 3){
        $("#msg_error").text("Nombre de empresa vacío o no válido.").show();
            return false;
    }
   $("#msg_error").hide(); 
    var url_php = 'http://localhost/LoginWeb/ajax/modificarLogin.php';
    
    $.ajax({
        type: 'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
        console.log(res);
        if(res.error !== undefined){
            $("#msg_error").html(res.error).show();
            return false;
        }
       if(res.redirect !== undefined){
            window.location = res.redirect;
        }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })
    return false;
})

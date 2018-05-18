$('#enviar').click(function () {
  var url = "../server/check_login.php";
    $.ajax({
      type:"POST",
      url:url,
      data: $("#formulario").serialize(),
      success:function(data) {
        if(data == 1){
          $(location).attr('href','principal.html');
        }else{
          alert(" !Verifique su correo & su contraseña¡");
        }
      }
    });
});


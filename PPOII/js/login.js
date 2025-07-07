$(document).ready(function() {
   let form = $("#loginform");

   $("#loginformbutton").click(function(e) {
   	e.preventDefault();

		$.ajax({
		   type: "POST",
		   url: "login.php",
		   data: form.serialize(),
		   success: function(response) {
			    if (response == '1'){
			   	    window.location.href = "index.html";
		        }
                else if (response == '0') {					
				 	    $('#error').html("Senha inválidos");
		        }
				else if (response == '-1') {
				    $('#error').html("Usuário inválido");
		        }
		   }	   
		});
    });
});
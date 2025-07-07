$(document).ready(function() {
   let form = $("#cadastroform");

   $("#cadastrosubmit").click(function(e) {
   	e.preventDefault();

		$.ajax({
		   type: "POST",
		   url: "cadastro.php",
		   data: form.serialize(),
		   success: function(response) {
			    if (response == '1'){
			   	    window.location.href = "login.html";
		        }
                else if (response == '0') {					
				 	    $('#error').html("Usuário já existe");
		        }
				else if (response == '-1') {
				    $('#error').html("Erro de cadastro");
		        }
		   }	   
		});
    });
});
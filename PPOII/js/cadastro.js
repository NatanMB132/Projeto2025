$(document).ready(function() {
   
   $("#cadastrosubmit").click(function(e) {
   	e.preventDefault();

		$.ajax({
		   type: "POST",
		   url: "./control/cadastro.php",
		   data: $(this).serialize(),
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
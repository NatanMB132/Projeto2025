$(document).ready(function() {
    $("#cadastroform").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: "cadastro.php",
            data: form.serialize(),
            success: function(response) {
                var parts = response.split('||');
                var msg = parts[0];
                var type = parts[1];
                $('#error').html(msg);
                if(type === 'success') {
                    setTimeout(function(){ window.location.href = "login.php"; }, 2000);
                }
            }
        });
    });
});
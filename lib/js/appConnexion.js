$(function() {
    $('.btn').click(function() {
        $.post(
            "../lib/php/ajax/adminConnect.php", 
            {
                username: $('#username').val(),
                password: $("#password").val()
            },
            function (data) {
                if (+data)
                    $(location).attr('href',"index.php");
                else 
                    $('#error').text("Identifiants incorrects")
                
            },
            'text'
        )
    });
});

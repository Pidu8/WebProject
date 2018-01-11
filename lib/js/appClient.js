$(function() {
    $('.filtr-container').filterizr();

    $('.multifilter div').click(function() {
        $(this).toggleClass('active');
    });

    $(".filtr-item").click(function () {
        var id = $(this).attr("id")
        $.post(
            "lib/php/ajax/getDetails.php", 
            {
                id: id
            },
            function (data) {
                $("#detailsModal .modal-content").html(data);
                $("#detailsModal .modal-body").attr('id', id);
            },
            'html'
        )
    });

});

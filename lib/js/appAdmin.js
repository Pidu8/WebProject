$(function() {
    var selectedItem;

    function updateCar(attribute, id, value) {
        $.post(
            "../lib/php/ajax/updateCar.php", 
            {
                attribute: attribute,
                id: id,
                value: value
            },
            false,
            false
        )
    }

    function removeItem(itemType) {
        $.post(
            "../lib/php/ajax/remove"+itemType+".php", 
            {
                id: selectedItem.attr('id')
            },
            function (data) {
                selectedItem.remove()
            },
            false
        )
    }
    
    $("#disconnect").click(function() {
        $.post(
            "../lib/php/ajax/adminDisconnect.php", 
            false,
            function () {
                $(location).attr('href',"../");
            },
            false
        )
    });

    $("table").on("click", "div[contenteditable]", function () {
        var oldValue = $.trim($(this).text());
        var id = $(this).closest('tr').attr("id");
        var attribute = $(this).attr("name");
        $(this).blur(function () {
            var newValue = $.trim($(this).text());
            if (oldValue != newValue)
                updateCar(attribute, id, newValue);
            
        });
    });

    $("table").on(
        "change", 
        "select", function() {
            updateCar(
                $(this).attr("name"), 
                $(this).closest('tr').attr("id"), 
                $(this).find(':selected').val()
            )
        }
    );

    $("table").on(
        "change", 
        "input[type='checkbox']", function() {
            updateCar(
                'isVisible', 
                $(this).closest('tr').attr("id"), 
                + $(this).prop( "checked" )
            )
        }
    );

    $("table").on("click", ".btn-description", function () {
        var id = $(this).closest('tr').attr("id");
        $.post(
            "../lib/php/ajax/getDescriptionById.php", 
            {
                id: id
            },
            function (data) {
                $("#descriptionModal .modal-body textarea").text(data);
                $("#descriptionModal .modal-body").attr('id', id);
            },
            'text'
        )
    });

    $('#descriptionModal').on('hidden.bs.modal', function () {
        updateCar(
            "description", 
            $("#descriptionModal .modal-body").attr('id'),
            $("#descriptionModal textarea").val()
        )
    });

    $("table").on("click", ".btn-pictures", function () {
        var id = $(this).closest('tr').attr("id");
        $.post(
            "../lib/php/ajax/getPicturesByIdCar.php", 
            {
                id: id
            },
            function (data) {
                $("#picturesModal .modal-body .container-fluid .row").html(data);
                $("#picturesModal .modal-body").attr('id', id);
            },
            'html'
        )
    });

    $("#picturesModal").on("change", "#file", function() {
        var formData = new FormData();
        formData.append("idCar", $("#picturesModal .modal-body").attr('id'));
        formData.append("file", this.files[0]);
        $(this).val('');
        $.ajax({
            url: "../lib/php/ajax/uploadPicture.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)   
            {
                $(".modal-body .container-fluid .row > div").last().before(data);
            }
        });
    });

    $("#picturesModal").on("click", ".btn-remove-picture", function() {
        selectedItem = $(this).closest("div");
    });

    $("#confirmationModal").on("click", ".btn-primary", function() {
        if ($("#picturesModal").hasClass("show")) 
            removeItem("Picture");
        else 
            removeItem("Car");
    });

    $('#confirmationModal').on('hidden.bs.modal', function () {
        selectedItem = null;
    });

    $("table").on("click", ".btn-remove-car", function () {
        selectedItem = $(this).closest("tr");
    });
    
    $(".btn-add-car").click(function () {
        $.post(
            "../lib/php/ajax/addCar.php", 
            false,
            function (data) {
                $(".btn-add-car").closest("tr").before(data).find("input[type='checkbox']");
                $("[data-toggle='toggle']").last().bootstrapToggle();
            },
            'html'
        )
        
    });

    /* Bootstrap Stackable Modal Fix*/

    $('.modal').on('show.bs.modal', function(event) {
        var idx = $('.modal:visible').length;
        $(this).css('z-index', 1040 + (10 * idx));
    });
    
    $('.modal').on('shown.bs.modal', function(event) {
        var idx = ($('.modal:visible').length) -1;
        $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
        $('.modal-backdrop').not('.stacked').addClass('stacked');
    });

    $('.modal').on('hidden.bs.modal', function () {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
    });
});
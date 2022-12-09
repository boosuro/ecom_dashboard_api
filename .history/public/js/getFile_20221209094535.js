/*
 @author:Boosuro Stephen Angkaefaa
 */

function customCrud(parameters) {
    var url = parameters.url;
    var action = parameters.action;
    var holder = parameters.holder;
    var this_ = parameters.this_;

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "GET",
        url: url,
        data: { action: action, holder: holder },
        beforeSend: function () {
            showPreloader();
        },
        success: function (data) {
            $("#ModalShowHandler").html(data);
            $("#custom_modal").modal("toggle");
        },
        complete: function () {
            hidePreloader();
        },
    });

    return;
}

function fetchSubCategory(category_select_element) {
    var category_id = category_select_element.value;
    $.ajax({
        type: "GET",
        url: "fetch-subcategories",
        data: { category_id: category_id },
        beforeSend: function () {},
        success: function (result) {
            if (result) {
                $("#sub_category_id").html(result);
            }
        },
    });
}

function comfirmDelete(formId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to delete item!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes delete it!",
        cancelButtonText: "No cancel!",
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger",
        buttonsStyling: false,
    }).then(
        function (e) {
            if (e.value === true) {
                document.getElementById(formId).submit();
            }
        },
        function (dismiss) {}
    );
}

function showPreloader() {
    $("#loading").css({ display: "block" });
}

function hidePreloader() {
    $("#loading").css({ display: "none" });
}

/*
    function to show notification

*/

function showNotification(from, align, msg, status) {
    type = ["", "info", "success", "warning", "danger", "rose", "primary"];

    color = Math.floor(Math.random() * 6 + 1);

    $.notify(
        {
            icon: "notifications",
            message: "<b>" + msg + "</b>",
        },
        {
            type: status,
            timer: 3000,
            placement: {
                from: from,
                align: align,
            },
        }
    );
}

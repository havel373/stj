let page;
function main_content(cont){
    $('#content_list').hide();
    $('#content_input').hide();
    $('#content_detail').hide();
    $('#' + cont).show();
}

$(window).on('hashchange', function(){
    if (window.location.hash) {
        page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            load_list(page);
        }
    }
});
$(document).ready(function(){
    $(document).on('click', '.paginasi',function(event){
        event.preventDefault();
        $('.paginasi').removeClass('active');
        $(this).parent('.paginasi').addClass('active');
        // var myurl = $(this).attr('href');
        page = $(this).attr('halaman').split('page=')[1];
        load_list(page);
    });
});
function load_list(page){
    loading();
    $.get('?page=' + page, $('#content_filter').serialize(), function(result){
        $('#list_result').html(result);
        main_content('content_list');
        loaded();
    }, "html");
}
function load_input(url){
    loading();
    $.get(url, {}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
        loaded();
    }, "html");
}
function load_detail(url){
    loading();
    $.get(url, {}, function(result) {
        $('#content_detail').html(result);
        main_content('content_detail');
        loaded();
    }, "html");
}
function handle_confirm(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Confirmation',
        content: 'Are you sure want to confirm this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"PATCH",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                            }else{
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            No: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}
function handle_delete(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Delete Confirmation',
        content: 'Are you sure want to delete this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"DELETE",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                            }else{
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            No: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}

function handle_send(url, checkbox) {
    var value = checkbox.checked ? "1" : "0"; // Get the checkbox value (1 or 0)
    $.ajax({
        type: "PATCH",
        url: url,
        data: { value: value }, // Send the checkbox value as data
        dataType: "json",
        success: function (response) {
            if (response.alert != "success") {
                error_toastr(response.message);
                load_list(1);
            }
        },
    });
}
function handle_open_modal(url,modal,content){
    $.ajax({
        type: "POST",
        url: url,
        success: function (html) {
            $(content).html(html);
            $(modal).modal('show');
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}
function handle_save(tombol, form, url, method, title){
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Please wait");
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function() {
            
        },
        success: function (response) {
            if (response.alert=="success") {
                success_toastr(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        main_content('content_list');
                        load_list(1);
                }, 2000);
            } else {
                error_toastr(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html(title);
                }, 2000);
            }
        },
    });
}
function handle_save_modal(tombol,form,url,modal, title){
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    // $(tombol).addClass(spinner);
    $(tombol).prop("disabled", true);
    $(tombol).html("Please wait");
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_toastr(response.message);
                $(form)[0].reset();
                $(modal).modal('toggle');
                setTimeout(function () {
                    $(tombol).html(title);
                    main_content('content_list');
                    load_list(1);
                }, 2000);
            } else {
                error_toastr(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html(title);
                }, 2000);
            }
        },
    });
}
function handle_upload(tombol,form,url,method, title){
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $(tombol).html("Please Wait");
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
            
            },
            success: function (response) {
                if (response.alert=="success") {
                    success_toastr(response.message);
                    $(form)[0].reset();
                    setTimeout(function () {
                        if(response.redirect){
                            location.href = response.redirect;
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        main_content('content_list');
                        load_list(1);
                    }, 2000);
                } else {
                    error_toastr(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
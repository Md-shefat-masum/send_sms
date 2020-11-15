$(document).ready(function () {

    const configs = {
        onUploadProgress: function (progressEvent) {
            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            console.log(percentCompleted);
            $('.form_progress_bar').css('width',percentCompleted+'%');
        }
    }

    $('.add_btn').on('click', function () {
        var href = $(this).data('href');
        var edit_href = $(this).data('add_href');
        $('#add_update_form').attr('action', href);
        axios.get(edit_href)
            .then(function (response) {
                $('#add_update_form .form_content').html(response.data);
                init();
            })
            .catch(function (error) {
                console.log(error);
            });
    });


    $('.update_btn').on('click', function (e) {
        $('#add_update_form').submit();
    });

    function init() {

        $('.delete_btn').on('click', function (e) {
            e.preventDefault();
            var href = $(this).data('href');
            $('#delete_confirm_btn').attr('href', href);
        });

        $('.edit_btn').on('click', function (e) {
            e.preventDefault();
            var href = $(this).data('href');
            var edit_href = $(this).data('edit_href');
            $('#add_update_form').attr('action', href);
            axios.get(edit_href)
                .then(function (response) {
                    $('#add_update_form .form_content').html(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        $('#add_update_form').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();

            var data = new FormData(this);
            var href = $(this).attr('action');
            axios.post(href, data, configs)
                .then(function (response) {
                    // console.log(response.data , response.data.table); jQuery.inArray('error', response.data) &&
                    if (response.data.error == null) {
                        $('.table_content').html(response.data.table);
                        $('.modal').modal('hide');
                        $('#add_update_form').trigger('reset');
                        $('#add_update_form input').val('');
                        $('.note-editable p').html('');
                        $('.form_progress_bar').css('width','0%');
                        toast('success');
                        init();
                    } else {
                        toastErr(response.data.error);
                        $('.form_progress_bar').css('width','0%');
                        jQuery.map(response.data, function (val, i) {
                            // console.log(val,i);
                            $('input[name$=' + i + ']').addClass('red_border');
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    $('.form_progress_bar').css('width','0%');
                });
        })

        return false;
    }

    init();

    $('.profile_update_btn').on('click', function (e) {
        e.preventDefault();
        $('.profile_update_form').submit();
    });

    $('.profile_update_form').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        e.stopPropagation();
        var data = new FormData(this);
        var href = $(this).attr('action');
        axios.post(href, data)
            .then(function (response) {
                // console.log(response.data , response.data.table);
                if (jQuery.inArray('error', response.data) && response.data.error == null) {
                    toast(response.data.success);
                    init();
                } else {
                    toastErr(response.data.error);
                    jQuery.map(response.data, function (val, i) {
                        // console.log(val,i);
                        $('input[name$=' + i + ']').addClass('red_border');
                    });
                }
            })
            .catch(function (error) {
                console.log(error);
            });

    });

    function toast(title) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: title
        })
    }

    function toastErr(title) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: title
        })
    }
    $('.pagination').addClass('pagination-separate');
});

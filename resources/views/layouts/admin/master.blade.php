<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/toastify/toastify.css') }}">

    @stack('css')

    <link rel="stylesheet" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('layouts.admin._sidebar')
        <div id="main" class='layout-navbar'>
            @include('layouts.admin._navbar')

            <div id="main-content">

                @yield('admin-content')

                @include('layouts.admin._footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('admin/vendors/fontawesome/all.min.js') }}"></script>

    <script>
        // Tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Preview image
        function preview(selector, temporarayFile, width = 400, height = 300) {
            $(selector).empty();
            $(selector).append(
                `<img class="img-fluid img-thumbnail" src="${window.URL.createObjectURL(temporarayFile)}" width="${width}" height="${height}" />`
            )
        }

        function loopErrors(errors) {
            if (errors == undefined) {
                return;
            }

            for (error in errors) {
                $(`[name=${error}]`).addClass('is-invalid');
                if ($(`[name=${error}]`).hasClass('summernote')) {
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                        .insertAfter($(`[name=${error}]`).next());
                } else if ($(`[name=${error}]`).hasClass('choices')) {
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                        .insertAfter($(`[name=${error}]`).next());
                } else if ($(`[name=${error}]`).attr('type') == 'radio') {
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                        .insertAfter($(`[name=${error}]`).next());
                } else {
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                        .insertAfter($(`[name=${error}]`));
                }

            }
        }

        function alert_success(message, color = '#4fbe87') {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: color,
            }).showToast();
        }


        function loading() {
            $("button .loading-img").fadeIn();
            $("form .btn-save").prop("disabled", true);
            $("form .btn-save").text("Sending..");
        }

        function hideLoader(text = "Simpan") {
            $("button .loading-img").fadeOut();
            $("form .btn-save").prop('disabled', false);
            $("form .btn-save").text(text);
        }
    </script>

    @stack('js')

    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>

</html>

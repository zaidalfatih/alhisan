@extends('layouts.admin.master',['title' => $title])

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendors/choices.js/choices.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/summernote/summernote-lite.min.css') }}">
@endpush

@section('admin-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Artikel Baru</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ $home }}">Artikel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section>
            <div class="row match-height">
                <div class="col-md-12 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h6>Judul Artikel</h6>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input autocomplete="off" type="text" class="form-control" name="judul"
                                                    placeholder="Judul artikel">
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Kategori</h6>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-control form-select" name="category_id">
                                                    <option selected disabled>Pilih kategori</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Gambar Cover</h6>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="file" name="gambar" class="image-resize-filepond"
                                                    onchange="preview('.show-preview', this.files[0])">
                                                <br>
                                                <div class="mt-2 show-preview"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Isi Artikel</h6>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea name="body" class="form-control summernote" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                            <div class="col-sm-12 mt-2 d-flex justify-content-center">
                                                <button type="reset" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Kosongkan form"
                                                    class="btn btn-light-secondary rounded-pill me-1 mb-1">Reset</button>
                                                <button onclick="simpan(`{{ route('post.store') }}`)" type="submit"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan"
                                                    class="btn btn-save btn-primary rounded-pill me-1 mb-1">
                                                    Simpan
                                                    <span class="spinner-grow loading-img text-light spinner-grow-sm"
                                                        style="display:none;" role="status" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('admin/vendors/summernote/summernote-lite.min.js') }}"></script>
    <script>
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({
                        type: 'image',
                        prefix: '/laravel-filemanager'
                    }, function(lfmItems, path) {
                        lfmItems.forEach(function(lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });

                }
            });
            return button.render();
        };

        $('.summernote').summernote({
            toolbar: [
                ['fontname', ['fontname']],
                ['popovers', ['lfm']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New']],
                ['hr', ['hr']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['link', ['link']],
            ],
            buttons: {
                lfm: LFMButton
            },
            height: 600,

        })
    </script>
    <script>
        function simpan(url) {
            event.preventDefault();
            let form = $('.card-body form');
            form.find('.form-control').removeClass('is-invalid');
            form.find('.invalid-feedback').remove();

            $.ajax({
                    url: url,
                    type: 'POST',
                    beforeSend: loading(),
                    data: new FormData($(form)[0]),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: hideLoader(),
                })
                .done(response => {
                    let message = response.message;
                    form[0].reset();
                    $('.show-preview').addClass('d-none');
                    $('.summernote').summernote('reset')
                    alert_success(message);
                })
                .fail(errors => {
                    if (errors.status == 422) {
                        loopErrors(errors.responseJSON.errors);
                    }
                });
        }
    </script>
@endpush

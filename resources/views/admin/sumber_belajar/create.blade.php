@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<style>
    .trix-button-group--file-tools {
        display: none;
    }
    trix-editor.trix-content {
        min-height: 220px;
    }
</style>
@endpush
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">
            <div class="row">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Tambah Sumber Belajar</h3>
                            <a href="{{ route('sumber_belajar.index') }}" class="btn btn-light btn-sm d-flex align-items-center">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="container">
                                <div class="py-5">
                                
                                    <form class="form-data">

                                        <input type="hidden" name="id">
                                        <input type="hidden" name="uuid">

                                        <div class="mb-10">
                                            <label class="form-label">Judul <span class="text-danger">*</span></label>
                                            <input type="text" id="judul" class="form-control" name="judul" placeholder="Masukkan Judul">
                                            <small class="text-danger judul_error"></small>
                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label class="form-label">Topik <span class="text-danger">*</span></label>
                                                <select class="form-select form-control" id="topik_id" name="topik_id"
                                                    data-control="select2" data-placeholder="Pilih Topik">
                                                    <option></option>
                                                    @foreach ($topik as $val)
                                                        <option value="{{ $val->id }}">{{ $val->topik }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger topik_id_error"></small>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                                                <select class="form-select form-control" id="mata_pelajaran_id" name="mata_pelajaran_id"
                                                    data-control="select2" data-placeholder="Pilih Mapel">
                                                    <option></option>
                                                    @foreach ($mapel as $val)
                                                        <option value="{{ $val->id }}">{{ $val->mata_pelajaran }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger mata_pelajaran_id_error"></small>
                                            </div>
                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label class="form-label">Tingkatan <span class="text-danger">*</span></label>
                                                <select class="form-control" name="tingkatan">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="X">X</option>
                                                    <option value="XI">XI</option>
                                                    <option value="XII">XII</option>
                                                </select>
                                                <small class="text-danger tingkatan_error"></small>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                                <select class="form-control" name="kategori" id="kategori">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="video">VIDEO</option>
                                                    <option value="ebook">EBOOK</option>
                                                </select>
                                                <small class="text-danger tingkatan_error"></small>
                                            </div>
                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6" id="videoField">
                                                <label class="form-label">Video</label>
                                                <input type="text" class="form-control" name="youtube_url">
                                                <small class="text-danger youtube_url_error"></small>
                                            </div>
                                            <div class="col-lg-6" id="fileField">
                                                <label class="form-label">File</label>
                                                <input type="file" class="form-control" name="file_url">
                                                <small class="text-danger file_url_error"></small>
                                            </div>
                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label class="form-label">Thumbnail</label>
                                                <input type="file" class="form-control" name="thumb_img" accept="image/*">
                                                <small class="text-danger thumb_img_error"></small>
                                                <div class="mt-3 d-none" id="thumbPreviewWrapper">
                                                    <img src="" alt="Preview Thumbnail" class="img-fluid rounded" id="thumbPreview">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-10 d-none" id="uploadProgress">
                                            <label class="form-label">Upload Progress</label>
                                            <div class="progress">
                                                <div class="progress-bar" id="uploadProgressBar" role="progressbar" style="width: 0%">0%</div>
                                            </div>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                            <input type="hidden" id="deskripsi" name="deskripsi">
                                            <trix-editor input="deskripsi" class="trix-content"></trix-editor>
                                            <small class="text-danger deskripsi_error"></small>
                                        </div>


                                        <div class="separator separator-dashed mt-8 mb-5"></div>
                                        <div class="d-flex gap-5">
                                            <button type="submit" class="btn btn-primary btn-sm btn-submit d-flex align-items-center"><i
                                                    class="bi bi-file-earmark-diff"></i> Simpan</button>
                                            <button type="reset" id="side_form_close"
                                                class="btn mr-2 btn-light btn-cancel btn-sm d-flex align-items-center"
                                                style="background-color: #ea443e65; color: #EA443E"><i class="bi bi-trash-fill"
                                                    style="color: #EA443E"></i>Batal</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </div>
        <!--end::Container-->
</div>
</div>

@endsection
@section('script')
@push('scripts')
<script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
<script>
    document.addEventListener("trix-file-accept", function (event) {
        event.preventDefault();
    });

    $(document).on('submit', ".form-data", function(e) {
        e.preventDefault();
        const $progressWrapper = $("#uploadProgress");
        const $progressBar = $("#uploadProgressBar");
        const $submitBtn = $(".btn-submit");
        const submitHtml = $submitBtn.html();
        const hasUpload = $("input[name='file_url']")[0].files.length || $("input[name='thumb_img']")[0].files.length;
        $progressBar.css("width", "0%").text("0%");
        $progressWrapper.toggleClass("d-none", !hasUpload);
        $submitBtn.prop("disabled", true).html(hasUpload ? "Uploading..." : "Menyimpan...");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('sumber_belajar.store') }}",
            data: new FormData($(".form-data")[0]),
            contentType: false,
            processData: false,
            xhr: function () {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (!evt.lengthComputable) return;
                    const percent = Math.round((evt.loaded / evt.total) * 100);
                    $progressWrapper.removeClass("d-none");
                    $progressBar.css("width", percent + "%").text(percent + "%");
                }, false);
                return xhr;
            },
            success: function (response) {
                $(".text-danger").html("");
                $progressWrapper.addClass("d-none");
                if (response.success == true) {
                    swal
                    .fire({
                        text: `Sumber Belajar berhasil di Tambah`,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    .then(function () {
                    setTimeout(() => {
                        window.location.href = "{{ route('sumber_belajar.index') }}";
                    }, 1500);
                    });
                } else {
                    $("form")[0].reset();
                    $("#from_select").val(null).trigger("change");
                    Swal.fire(`${response.message}`, `${response.data}`, "warning");
                }
            },
            error: function (xhr) {
                if (xhr.statusText == "Method Not Allowed") {
                    Swal.fire(
                        "Gagal Memproses data!",
                        "Silahkan Hubungi Admin",
                        "warning"
                    );
                }

                $(".text-danger").html("");
                $progressWrapper.addClass("d-none");
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        $(`.${key}_error`).html(" " + value);
                        window.location.hash = key;
                    });
                } else {
                    const message = xhr.responseJSON && xhr.responseJSON.message
                        ? xhr.responseJSON.message
                        : "Gagal memproses data.";
                    Swal.fire("Gagal", message, "warning");
                }
            },
            complete: function () {
                $submitBtn.prop("disabled", false).html(submitHtml);
            },
        });
    });
     
    $(function() {
        function toggleCategoryFields(value) {
            if (value === "ebook") {
                $("#videoField").addClass("d-none");
                $("#fileField").removeClass("d-none");
            } else if (value === "video") {
                $("#fileField").addClass("d-none");
                $("#videoField").removeClass("d-none");
            } else {
                $("#videoField").removeClass("d-none");
                $("#fileField").removeClass("d-none");
            }
        }

        $("#kategori").on("change", function () {
            toggleCategoryFields($(this).val());
        });
        toggleCategoryFields($("#kategori").val());

        $("input[name='thumb_img']").on("change", function (e) {
            const file = e.target.files && e.target.files[0];
            if (!file) {
                $("#thumbPreviewWrapper").addClass("d-none");
                $("#thumbPreview").attr("src", "");
                return;
            }
            const reader = new FileReader();
            reader.onload = function (evt) {
                $("#thumbPreview").attr("src", evt.target.result);
                $("#thumbPreviewWrapper").removeClass("d-none");
            };
            reader.readAsDataURL(file);
        });
    })
</script>
@endsection

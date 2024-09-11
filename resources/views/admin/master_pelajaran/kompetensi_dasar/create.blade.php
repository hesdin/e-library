@extends('layouts.app')
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kompetensi Dasar</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5">
                                <form class="form-data">

                                    @if(auth()->user()->role == 'admin')
                                        <div class="mb-10">
                                            <label class="form-label">Mata Pelajaran</label>
                                            <select class="form-select form-control" id="mata_pelajaran_id" name="mata_pelajaran_id"
                                                data-control="select2" data-placeholder="Pilih Mata Pelajaran">
                                                <option></option>
                                                @foreach ($mapel as $val)
                                                    <option value="{{ $val->id }}">{{ $val->mata_pelajaran }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger mata_pelajaran_id_error"></small>
                                        </div>  
                                    @else
                                    <input type="hidden" name="mata_pelajaran_id" value="{{ $mapel_auth->id }}">
                                    @endif
                                    

                                    <div class="mb-10">
                                        <label class="form-label">Kompetensi Inti</label>
                                        <textarea name="kompetensi_inti" id="kompetensi_inti" placeholder="Masukkan kompetensi Inti">
                                     
                                        </textarea>
                                        <small class="text-danger kompetensi_inti_error"></small>        
                                    </div>

                                    <div class="mb-10">
                                        <label class="form-label">Kompetensi Dasar</label>
                                        <textarea name="kompetensi_dasar" id="kompetensi_dasar" placeholder="Masukkan kompetensi Dasar">
                                     
                                        </textarea>
                                        <small class="text-danger kompetensi_dasar_error"></small>        
                                    </div>

                                    <div class="separator separator-dashed mt-8 mb-5"></div>
                                    <div class="d-flex justify-content-center gap-5">
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
<script>
        ClassicEditor
        .create(document.querySelector('#kompetensi_inti'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.querySelector('textarea[name="kompetensi_inti"]').value = editor.getData();
            });

        })
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#kompetensi_dasar'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.querySelector('textarea[name="kompetensi_dasar"]').value = editor.getData();
            });

        })
        .catch(error => {
            console.error(error);
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            $(".btn-submit").prop("disabled", true);
            $(".btn-submit").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
            type: 'POST',
            url: '{{ route("kompetensi_dasar.store") }}',
            data: new FormData($(".form-data")[0]),
            contentType: false,
            processData: false,
            success: function (response) {
                $(".text-danger").html("");
                if (response.success == true) {
                swal
                    .fire({
                    text: `Kompetensi Dasar berhasil di Tambahkan`,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                    })
                    .then(function () {
                    setTimeout(() => {
                        window.location.href = '{{ route("kompetensi_dasar.index") }}';
                    }, 1500);
                    });
                } else {
                $("form")[0].reset();
                $("#from_select").val(null).trigger("change");
                Swal.fire(`${response.message}`, `${response.data}`, "warning");
                }
            },
            error: function (xhr) {
                console.log(xhr);
                if (xhr.statusText == "Method Not Allowed") {
                Swal.fire(
                    "Gagal Memproses data!",
                    "Silahkan Hubungi Admin",
                    "warning"
                );
                }

                $(".text-danger").html("");
                $.each(xhr.responseJSON["errors"], function (key, value) {
                $(`.${key}_error`).html(" " + value);
                window.location.hash = key;
                });
            },
            complete: function () {
                $(".btn-submit").prop("disabled", false);
                $(".btn-submit").html('<i class="bi bi-file-earmark-diff"></i> Simpan');
            },
            });
        })
</script>
@endsection
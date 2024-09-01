@extends('layouts.app')
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">
            <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Sumber Belajar</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="container">
                                <div class="py-5">
                                
                                    <form class="form-data">

                                        <input type="hidden" name="id">
                                        <input type="hidden" name="uuid">

                                        <div class="mb-10">
                                            <label class="form-label">Judul</label>
                                            <input type="text" id="judul" class="form-control" name="judul" placeholder="Masukkan Judul">
                                            <small class="text-danger judul_error"></small>
                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label class="form-label">Topik</label>
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
                                                <label class="form-label">Mata Pelajaran</label>
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
                                                <label class="form-label">Tingkatan</label>
                                                <select class="form-control" name="tingkatan">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="X">X</option>
                                                    <option value="XI">XI</option>
                                                    <option value="XII">XII</option>
                                                </select>
                                                <small class="text-danger tingkatan_error"></small>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-control" name="kategori">
                                                    <option selected disabled>Pilih</option>
                                                    <option value="video">VIDEO</option>
                                                    <option value="ebook">EBOOK</option>
                                                </select>
                                                <small class="text-danger tingkatan_error"></small>
                                            </div>
                                        </div>

                                        <div class="mb-10 row">
                                            <div class="col-lg-6">
                                                <label class="form-label">Video</label>
                                                <input type="text" class="form-control" name="youtube_url">
                                                <small class="text-danger youtube_url_error"></small>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">File</label>
                                                <input type="file" class="form-control" name="file_url">
                                                <small class="text-danger file_url_error"></small>
                                            </div>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">

                                            </textarea>
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
<script>

    $(document).on('submit', ".form-data", function(e) {
        e.preventDefault();
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
            success: function (response) {
                $(".text-danger").html("");
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
                $.each(xhr.responseJSON["errors"], function (key, value) {
                    $(`.${key}_error`).html(" " + value);
                    window.location.hash = key;
                });
            },
        });
    });
     
    $(function() {
            
    })
</script>
@endsection
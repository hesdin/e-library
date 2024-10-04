@extends('layouts.app')
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Jurnal Harian</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5">
                                <form class="form-data">

                                <div class="mb-10">
                                    <label class="form-label">Kompetensi</label>
                                    <select class="form-select form-control" id="mata_pelajaran_id" name="mata_pelajaran_id"
                                        data-control="select2" data-placeholder="Pilih Mata Pelajaran">
                                        <option></option>
                                        @foreach ($mapel as $val)
                                            <option value="{{ $val->id }}">{{ $val->mata_pelajaran }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger mata_pelajaran_id_error"></small>
                                </div>  

                                <div class="mb-10">
                                    <label class="form-label">Kompetensi</label>
                                    <select class="form-select form-control" id="kompetensi_id" name="kompetensi_id"
                                        data-control="select2" data-placeholder="Pilih Kompetensi">
                                        <option></option>
                                        @foreach ($kd as $val)
                                            <option value="{{ $val->id }}">{{ strip_tags($val->kompetensi_inti) }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger kompetensi_id_error"></small>
                                </div>  

                                

                                <div class="mb-10">
                                    <label class="form-label">Kelas</label>
                                    <select class="form-select form-control" id="kelas_id" name="kelas_id"
                                        data-control="select2" data-placeholder="Pilih Kelas">
                                        <option></option>
                                        @foreach ($kelas as $kelass)
                                            <option value="{{ $kelass->id }}">{{ $kelass->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger kelas_id_error"></small>
                                </div>  

                                    <div class="mb-10">
                                        <label class="form-label">Materi</label>
                                        <textarea name="materi" id="materi" placeholder="Masukkan Materi Inti">
                                     
                                        </textarea>
                                        <small class="text-danger materi_error"></small>        
                                    </div>

                                    <div class="mb-10">
                                        <label class="form-label">Hasil</label>
                                        <textarea name="hasil" id="hasil" placeholder="Masukkan Hasil">
                                     
                                        </textarea>
                                        <small class="text-danger hasil_error"></small>        
                                    </div>
<!-- 
                                    <div class="row mb-10">
                                        <div class="col-lg-6">
                                            <label class="form-label">Jumlah Siswa Hadir</label>
                                            <input type="text" id="hadir" class="form-control" name="hadir" placeholder="Masukkan jumlah siswa">
                                            <small class="text-danger hadir_error"></small>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Jumlah Siswa tidak Hadir</label>
                                            <input type="text" id="tidak_hadir" class="form-control" name="tidak_hadir" placeholder="Masukkan jumlah siswa">
                                            <small class="text-danger tidak_hadir_error"></small>
                                        </div>
                                    </div> -->

                                    <div class="row mb-10">
                                        <div class="col-lg-6">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" id="tanggal" class="form-control" name="tanggal">
                                            <small class="text-danger tanggal_error"></small>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Keterangan</label>
                                            <input type="text" id="keterangan" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
                                            <small class="text-danger keterangan_error"></small>
                                        </div>
                                    </div>

                                    <table class="table table-striped gy-7 gs-7" id="tb_absen">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

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
        .create(document.querySelector('#materi'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.querySelector('textarea[name="materi"]').value = editor.getData();
            });

        })
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#hasil'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                document.querySelector('textarea[name="hasil"]').value = editor.getData();
            });

        })
        .catch(error => {
            console.error(error);
        });

        $(document).on('change','#kelas_id', function (e) {
            e.preventDefault();

            $.ajax({
                method : 'GET',
                url : `/siswa/siswaByKelas/${$(this).val()}`,
                success : function (res) {
                    let data = res.data;
                    let html = '';

                    $.each(data,function (x,y) {
                        html += `
                        <tr>
                            <td>${x+1}</td>
                            <td> ${y.nama} </td>
                            <td> 
                                <input type="hidden" value="${y.id}" name="siswa_id[]">
                                <select name="status[]" class="form-control">
                                        <option selected disabled>Pilih</option>
                                        <option value="hadir">hadir</option>
                                        <option value="izin">izin</option>
                                        <option value="sakit">sakit</option>
                                        <option value="alpa">alpa</option>
                                    </select>
                            </td>
                        </tr>
                        `;
                    })

                    $('#tb_absen tbody').html(html);
                },
                error : function (xhr) {
                    alert('gagal');
                }
            })
        })

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
            url: '{{ route("jurnal.store") }}',
            data: new FormData($(".form-data")[0]),
            contentType: false,
            processData: false,
            success: function (response) {
                $(".text-danger").html("");
                if (response.success == true) {
                swal
                    .fire({
                    text: `Jurnal berhasil di Tambahkan`,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                    })
                    .then(function () {
                    setTimeout(() => {
                        window.location.href = '{{ route("jurnal.index") }}';
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
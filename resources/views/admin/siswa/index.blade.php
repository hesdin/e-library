@extends('layouts.app')
@section('content')
  <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
      <!--begin::Container-->

      <div id="kt_content_container" class="container">
        <button class="btn btn-primary btn-sm mb-5" data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
          id="btn-side-form">
          Tambah Data
        </button>

        <button class="btn btn-success btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#importModal">
          Import Data Siswa
        </button>

        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('import-siswa') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <input type="file" name="file" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success">Import</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="row">

          <div class="card">
            <div class="card-body p-0">
              <div class="container">
                <div class="py-5">
                  <table id="kt_table_data" class="table table-row-dashed table-row-gray-300 gy-7">
                    <thead>
                      <tr class="fw-bolder fs-6 text-gray-800">
                        <th>No</th>
                        <th>NISN</th>
                        <!-- <th>NIPD</th> -->
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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
@section('side-form')
  <div id="side_form" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#side_form_button" data-kt-drawer-close="#side_form_close" data-kt-drawer-width="500px">
    <!--begin::Card-->
    <div class="card w-100">
      <!--begin::Card header-->
      <div class="card-header pe-5">
        <!--begin::Title-->
        <div class="card-title">
          <!--begin::User-->
          <div class="d-flex justify-content-center flex-column me-3">
            <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1 title_side_form"></a>
          </div>
          <!--end::User-->
        </div>
        <!--end::Title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
          <!--begin::Close-->
          <div class="btn btn-sm btn-icon btn-active-light-primary" id="side_form_close">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
            <span class="svg-icon svg-icon-2">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                  fill="#000000">
                  <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                  <rect fill="#000000" opacity="0.5"
                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0"
                    y="7" width="16" height="2" rx="1" />
                </g>
              </svg>
            </span>
            <!--end::Svg Icon-->
          </div>
          <!--end::Close-->
        </div>
        <!--end::Card toolbar-->
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body hover-scroll-overlay-y">
        <form class="form-data">

          <input type="hidden" name="id">
          <input type="hidden" name="uuid">

          <div class="row mb-10">
            <div class="col-lg-12">
              <label class="form-label">NISN</label>
              <input type="text" id="nisn" class="form-control" name="nisn" placeholder="Masukkan NISN">
              <small class="text-danger nisn_error"></small>
            </div>
          </div>

          <div class="mb-10">
            <label class="form-label">Nama</label>
            <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama">
            <small class="text-danger nama_error"></small>
          </div>

          <div class="row mb-10">
            <div class="col-lg-6">
              <label class="form-label">Jenis Kelamin</label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="L">Laki Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <small class="text-danger jenis_kelamin_error"></small>
            </div>

            <div class="col-lg-6">
              <label class="form-label">Kelas</label>
              <select class="form-select form-control" id="kelas_id" name="kelas_id" data-control="select2"
                data-placeholder="Pilih Kelas">
                <option></option>
                @foreach ($kelas as $val)
                  <option value="{{ $val->id }}">{{ $val->kelas }}</option>
                @endforeach
              </select>
              <small class="text-danger kelas_id_error"></small>
            </div>
          </div>

          <div class="mb-10 row">
            <div class="col-lg-6">
              <label class="form-label">Tempat Lahir</label>
              <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                placeholder="Masukkan Tempat Lahir">
              <small class="text-danger tempat_lahir_error"></small>
            </div>
            <div class="col-lg-6">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                placeholder="Masukkan Tanggal Lahir">
              <small class="text-danger tanggal_lahir_error"></small>
            </div>
          </div>

          <div class="mb-10">
            <label class="form-label">Alamat</label>
            <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat">
            <small class="text-danger alamat_error"></small>
          </div>

          <div class="mb-10">
            <label class="form-label">Nomor Whatsaap</label>
            <input type="number" id="nomor_whatsaap" class="form-control" name="nomor_whatsaap"
              placeholder="Masukkan Nomor whatsaap">
            <small class="text-danger nomor_whatsaap_error"></small>
          </div>

          <div class="mb-10">
            <label class="form-label">Nama Wali</label>
            <input type="text" id="nama_wali" class="form-control" name="nama_wali"
              placeholder="Masukkan nama wali">
            <small class="text-danger nama_wali_error"></small>
          </div>

          <div class="mb-10 row">
            <div class="col-lg-6">
              <label class="form-label">Pekerjaan Wali</label>
              <input type="text" id="pekerjaan_wali" class="form-control" name="pekerjaan_wali"
                placeholder="Masukkan Pekerjaan Wali">
              <small class="text-danger pekerjaan_wali_error"></small>
            </div>
            <div class="col-lg-6">
              <label class="form-label">Penghasilan Wali</label>
              <input type="number" id="penghasilan_wali" class="form-control" name="penghasilan_wali"
                placeholder="Masukkan Penghasilan Wali">
              <small class="text-danger penghasilan_wali_error"></small>
            </div>
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
      <!--end::Card body-->
    </div>
    <!--end::Card-->
  </div>
@endsection
@section('script')
  <script>
    $(document).on('click', '#btn-side-form', function() {
      OverlayForm('Tambah', 'Kelas', null);
    })

    function OverlayForm(type, label, url) {
      $(".title_side_form").html(`${type} ${label}`);
      $(".text-danger").html("");
      if (type == "Tambah") {
        $(".form-data")[0].reset();
        $(".form-data").attr("data-type", "add");
      } else {
        $(".form-data").attr("data-type", "update");

        $.ajax({
          url: url,
          method: "GET",
          success: function(res) {
            if (res.success == true) {
              $.each(res.data, function(x, y) {
                $("input[name='" + x + "']").val(y);
                $("select[name='" + x + "']").val(y);
                $("select[name='" + x + "']").trigger("change");
              });
            }
          },
          error: function(xhr) {
            alert("gagal");
          },
        });
      }
    }

    $(document).on('click', '.btn-update', function(e) {
      e.preventDefault();
      let url = '/siswa/show/' + $(this).attr('data-uuid');
      OverlayForm('Update', 'Kelas', url);
    })

    $(document).on('submit', ".form-data", function(e) {
      e.preventDefault();
      let type = $(this).attr('data-type');
      let url = '';
      let module = '';

      if (type == 'add') {
        url = "{{ route('siswa.store') }}";
        module = "Tambah";
      } else {
        let uuid = $("input[name='uuid']").val();
        url = `/siswa/update/${uuid}`;
        module = "Update";
      }

      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });

      $.ajax({
        type: 'POST',
        url: url,
        data: new FormData($(".form-data")[0]),
        contentType: false,
        processData: false,
        success: function(response) {
          $(".text-danger").html("");
          if (response.success == true) {
            swal
              .fire({
                text: `Siswa berhasil di ${module}`,
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
              })
              .then(function() {
                $("#side_form_close").trigger("click");
                $('#kt_table_data').DataTable().ajax.reload();
                $("form")[0].reset();
              });
          } else {
            $("form")[0].reset();
            Swal.fire("Gagal Memproses data!", `${response.message}`, "warning");
          }
        },
        error: function(xhr) {
          $(".text-danger").html("");
          $.each(xhr.responseJSON["errors"], function(key, value) {
            $(`.${key}_error`).html(value);
          });
        },
      });
    });

    $(document).on('click', '.btn-delete', function(e) {
      e.preventDefault();
      let url = '/siswa/delete/' + $(this).attr('data-uuid');
      let label = $(this).attr('data-label');


      let token = $("meta[name='csrf-token']").attr("content");
      Swal.fire({
        title: `Apakah anda yakin akan menghapus data ${label} ?`,
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus itu!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: url,
            type: "DELETE",
            data: {
              id: $(this).attr("data-id"),
              _token: token,
            },
            success: function(res) {
              swal.fire({
                title: "Menghapus!",
                text: "Data Anda telah dihapus.",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
              });
              $('#kt_table_data').DataTable().ajax.reload();
            },
            error: function(xhr) {
              if (xhr.statusText == "Unprocessable Content") {
                Swal.fire(
                  `${xhr.responseJSON.data}`,
                  `${xhr.responseJSON.message}`,
                  "warning"
                );
              }
            },
          });
        }
      });
    })

    function initDatatable() {
      $('#kt_table_data').DataTable().clear().destroy();
      $('#kt_table_data').dataTable().fnClearTable();
      $('#kt_table_data').dataTable().fnDraw();
      $('#kt_table_data').dataTable().fnDestroy();
      $('#kt_table_data').DataTable({
        responsive: true,
        pageLength: 10,
        order: [
          [0, "desc"]
        ],
        processing: true,
        searching: true,
        ajax: "{{ route('siswa.datatable') }}",
        columns: [{
          data: null,
          className: 'text-center',
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        }, {
          data: 'nisn',
          className: 'text-right',
        }, {
          data: 'nama',
          className: 'text-right',
        }, {
          data: 'kelas',
          className: 'text-right',
        }, {
          data: 'uuid',
          className: 'text-center',
        }],
        columnDefs: [{
          targets: -1,
          title: 'Aksi',
          width: '10rem',
          orderable: false,
          render: function(data, type, full, meta) {
            return `
                            <a href="javascript:;" data-uuid="${data}" class="btn btn-sm btn-clean btn-update btn-icon" data-kt-drawer-show="true" data-kt-drawer-target="#side_form">
                                <i class="la la-edit text-success" style="font-size: 22px;"></i>
                            </a>
                            <button class="btn btn-sm btn-clean btn-delete btn-icon" data-uuid="${data}" data-label="${full.nisn}" data-type="destroy">
                                <i class="la la-trash text-danger" style="font-size: 22px;"></i>
                            </button>
                            `;
          },
        }],
        rowCallback: function(row, data, index) {
          var api = this.api();
          var startIndex = api.context[0]._iDisplayStart;
          var rowIndex = startIndex + index + 1;
          $("td", row).eq(0).html(rowIndex);
        },
      });
    }

    $(function() {
      initDatatable();
    })
  </script>
@endsection

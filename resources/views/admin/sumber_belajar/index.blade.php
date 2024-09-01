@extends('layouts.app')
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">
            <a href="{{ route('sumber_belajar.create') }}" class="btn btn-primary btn-sm mb-5">
                    Tambah Data
                </a>

        <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5">
                                <table id="kt_table_data" class="table table-row-dashed table-row-gray-300 gy-7">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Topik</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kategori</th>
                                            <th>Video Source</th>
                                            <th>File Source</th>
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
@section('script')
<script>



    function initDatatable() {
          $('#kt_table_data').DataTable().clear().destroy();
         $('#kt_table_data').dataTable().fnClearTable();
         $('#kt_table_data').dataTable().fnDraw();
         $('#kt_table_data').dataTable().fnDestroy();
        $('#kt_table_data').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, "desc"]],
        processing: true,
        searching: true,
        ajax: "{{ route('sumber_belajar.datatable') }}",
        columns: [
            {
                data: null,
                className : 'text-center',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            }, {
                data: 'judul',
                className : 'text-right',
            }, {
                data: 'topik',
                className : 'text-right',
            }, {
                data: 'mata_pelajaran',
                className : 'text-right',
            }, {
                data: 'kategori',
                className : 'text-right',
            }, {
                data: 'youtube_url',
                className : 'text-right',
                render: function(data, type, row, meta) {
                    if (data !== null) {
                        return `<a href="${data}" target="blank" class="btn btn-light-primary btn-sm">Lihat</a>`;
                    }else{
                        return `<a href="javascript:;" target="blank" class="btn btn-light-danger btn-sm">tidak ada file</a>`;
                    }
                }
                
            }, {
                data: 'file_url',
                className : 'text-right',
                render: function(data, type, row, meta) {
                    if (data !== null) {
                        return `<a href="${data}" target="blank" class="btn btn-light-primary btn-sm">Lihat</a>`;
                    }else{
                        return `<a href="javascript:;" target="blank" class="btn btn-light-danger btn-sm">tidak ada file</a>`;
                    }
                }
            }, {
                data: 'id',
                className : 'text-center',
            }
        ],
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
                            <button class="btn btn-sm btn-clean btn-delete btn-icon" data-uuid="${data}" data-label="${full.topik}" data-type="destroy">
                                <i class="la la-trash text-danger" style="font-size: 22px;"></i>
                            </button>
                            `;
                    },
        }],
        rowCallback: function (row, data, index) {
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
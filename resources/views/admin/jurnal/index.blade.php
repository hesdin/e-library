@extends('layouts.app')
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">
            <a class="btn btn-primary btn-sm mb-5" href="{{ route('jurnal.create') }}">
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
                                            <th>Hari/Tanggal</th>
                                            <th>Kompetensi Dasar/Materi</th>
                                            <th>Materi</th>
                                            <th>Hasil</th>
                                            <th>Hadir</th>
                                            <th>Tidak Hadir</th>
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

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = '/kompetensi-dasar/delete/' + $(this).attr('data-uuid');
            let label = $(this).attr('data-label');


            let token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({
            title: `Apakah anda yakin akan menghapus data ?`,
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
                success: function (res) {
                    swal.fire({
                    title: "Menghapus!",
                    text: "Data Anda telah dihapus.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                    });
                    $('#kt_table_data').DataTable().ajax.reload();
                },
                error: function (xhr) {
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

        function formatDate(dateString) {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            // Create a new Date object
            const date = new Date(dateString);

            // Extract day of the week, day of the month, month, and year
            const dayOfWeek = days[date.getDay()];
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();

            // Format the date as desired
            return `${dayOfWeek}, ${day} ${month} ${year}`;
        }

        Datatable = () =>{

            var currentNumber = null;
            var cntNumber = 0;
            var current = null;
            var cnt = 0;

            $('#kt_table_data').dataTable().fnClearTable();
            $('#kt_table_data').dataTable().fnDraw();
            $('#kt_table_data').dataTable().fnDestroy();

            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[1, "desc"]],
                processing: true,
                // serverSide: true,
                ajax: '{{ route("jurnal.datatable") }}',
                columns: [
                    {
                        data: null,
                        className : 'text-center',
                        render: function(data, type, row, meta) {
                            let tmt = row.id;
                            if (tmt != currentNumber) {
                                currentNumber = tmt;
                                cntNumber++;
                            }

                            if (tmt != current) {
                                current = tmt;
                                cnt = 1;
                            } else {
                                cnt++;
                            }
                            return cntNumber;
                        }
                    }, {
                        data: 'tanggal',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            return formatDate(data);
                        }
                    }, {
                        data: 'kompetensi_dasar',
                        className : 'text-right',
                    }, {
                        data: 'materi',
                        className : 'text-right',
                    }, {
                        data: 'hasil',
                        className : 'text-right',
                    }, {
                        data: 'hadir',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            return `${data} siswa`;
                        }
                    }, {
                        data: 'tidak_hadir',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            return `${data} siswa`;
                        }
                    },{
                        data: 'uuid',
                        className : 'text-center',
                    }
                ],
                columnDefs: [
                    {
                        targets: 1,
                        visible: false,
                    },
                    {
                        targets: -1,
                        title: 'Aksi',
                        width: '9rem',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return `
                                    <a href="/jurnal/edit/${data}" class="btn btn-sm btn-clean btn-update btn-icon" data-kt-drawer-show="true" data-kt-drawer-target="#side_form">
                                        <i class="la la-edit text-success" style="font-size: 22px;"></i>
                                    </a>
                                    <button class="btn btn-sm btn-clean btn-delete btn-icon" data-uuid="${data}" data-type="destroy">
                                        <i class="la la-trash text-danger" style="font-size: 22px;"></i>
                                    </button>
                                    `;
                            },
                    }
                ],
                rowGroup: {
                    dataSrc: 'tanggal',
                    startRender: function(rows, group) {
                        console.log(group);
                        let formattedString = group.replace(/_/g, ' ');
                        // Ubah semua huruf menjadi huruf besar
                        formattedString = formattedString.toUpperCase();
                        return $('<tr/>')
                        .append(
                            // Span with badge in a td that spans 5 columns
                            $('<td/>').attr('colspan',6).append(
                                $('<span/>').addClass('badge badge-success').text(formatDate(group))
                            ),
                            // Button in a separate td with 1 column
                            $('<td/>').append(
                                $('<button/>')
                                    .addClass('btn btn-primary btn-sm') // Button style
                                    .text('Cetak Jurnal') // Text for the button
                                    .on('click', function() {
                                        window.open(`/jurnal/export?tanggal=${group}`);
                                    })
                            )
                        )
                        .attr('data-name', group);
                    },
                },
                "rowsGroup": [-1, 0, 3],
                "ordering": false,
            });

            // control.initDatatable('/master-spj/standar-harga/datatable', columns, columnDefs);
        }
     
    $(function() {
        Datatable();
    })
</script>
@endsection
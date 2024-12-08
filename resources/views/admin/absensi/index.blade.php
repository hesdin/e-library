@extends('layouts.app')
@section('content')
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        
        <div id="kt_content_container" class="container">

        <div class="row">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DAFTAR ABSENSI SISWA</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5">

                            <form id="form-filter">
                                <div class="row" style="margin-bottom: 1rem">
                                    <div class="col-lg-2">
                                    <label for="filter-valid" class="form-label" style="font-size:12px;">Pertemuan Bulan ke</label>
                                        <select class="form-control form-control-sm form-control-solid" data-control="select2" data-placeholder="Pilih Bulan" name="bulan">
                                            <option></option>
                                            @foreach (range(0, 12) as $bulan)
                                                @if ($bulan != 0)
                                                    <option value="{{ $bulan }}" {{ $bulan == date('n') ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::parse('2024-' . $bulan . '-01')->translatedFormat('F') }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            
                                        </select>        
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="filter-status" class="form-label" style="font-size:12px;">Kelas</label>
                                        <select class="form-control form-control-sm form-control-solid" data-control="select2" data-placeholder="Pilih Kelas" name="kelas">
                                            <option></option>
                                           @foreach ($kelas as $kelass)
                                                <option value="{{ $kelass->id }}">{{ $kelass->kelas }}</option>
                                            @endforeach
                                        </select>        
                                    </div>
                                    <div class="col-lg">
                                        <button type="submit" class="btn btn-primary btn-sm" id="filter-btn" style="position: relative;top: 24px;">Terapkan</button>
                                    </div>
                                </div>
                            </form>
                                
                                <div class="table-responsive">
                                    <table id="kt_table_data" class="table table-row-dashed table-row-gray-300 gy-7">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">NIS</th>
                                            <th rowspan="2">Nama Siswa</th>
                                            <th colspan="31">Pertemuan Ke</th>
                                            <th rowspan="2">H</th>
                                            <th rowspan="2">I</th>
                                            <th rowspan="2">S</th>
                                            <th rowspan="2">A</th>
                                        </tr>
                                        <tr>
                                            @foreach (range(0, 31) as $hari)
                                                @if ($hari != 0)
                                                   <th>{{$hari}}</th>
                                                @endif
                                            @endforeach
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

        Datatable = (url) =>{

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
                ajax: url,
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
                        data: 'nisn',
                        className : 'text-right',
                    }, {
                        data: 'nama',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '1',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '2',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '3',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '4',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '5',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '6',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '7',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '8',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '9',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '10',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '11',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '12',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '13',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '14',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '15',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '16',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '17',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '18',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '19',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '20',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '21',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '22',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '23',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '24',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '25',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '26',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '27',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '28',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '29',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '30',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: '31',
                        className : 'text-right',
                        render: function(data, type, row, meta) {
                            if (data == 'hadir') {
                                return 'H';
                            }else if(data == 'sakit'){
                                return 'S';
                            }else if(data == 'izin'){
                                return 'I'
                            }else if(data == 'alpa'){
                                return 'A';
                            }else{
                                return '';
                            }
                        }
                    }, {
                        data: 'h',
                        className : 'text-right',
                    }, {
                        data: 'i',
                        className : 'text-right',
                    }, {
                        data: 's',
                        className : 'text-right',
                    }, {
                        data: 'a',
                        className : 'text-right',
                    }
                ],
                columnDefs: [
            
                ],
                "ordering": false,
            });

            // control.initDatatable('/master-spj/standar-harga/datatable', columns, columnDefs);
        }

        $(document).on('submit','#form-filter', function (e) {
            e.preventDefault();
            let url = `/absensi/datatable?${$(this).serialize()}`
            Datatable(url);
        })
     
    $(function() {
        Datatable('{{ route("absensi.datatable") }}');
    })
</script>
@endsection
@extends('layouts.app')

@section('title', 'Manajemen Siswa')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Manajemen Siswa</h1>
                <div class="table-responsive">
                    <table id="studentsTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>NISN</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pendaftaran as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ '20230' . $data->user_id }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->nisn }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->agama }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data siswa terverifikasi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- Include jQuery and DataTables scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                // Initialize DataTables with default sorting
                $('#studentsTable').DataTable({
                    "paging": true, // Enable pagination
                    "searching": true, // Enable search
                    "ordering": true, // Enable sorting on each column
                    "info": true, // Display info
                    "language": {
                        "emptyTable": "Tidak ada data siswa terverifikasi"
                    },
                    "order": [
                        [2, 'asc']
                    ] // Default sort by "Nama Lengkap" column (index 2) in ascending order
                });
            });
        </script>
    @endpush
@endsection

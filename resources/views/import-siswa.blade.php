@extends('layouts.app')

{{-- @section('content')
  <div class="container">
    <h2>Import Data Siswa</h2>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('import-siswa') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <input type="file" name="file" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Import Data Siswa</button>
    </form>
  </div>
@endsection --}}

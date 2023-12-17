@extends('books')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <input class="form-control" type="text" name="w" value="{{ $w}}" placeholder="Pencarian..." />
            </div>
            <div class="form-group mr-1">
                <button class="btn btn-success">Cari</button>
            </div>
            <div class="form-group mr-1">
                <a class="btn btn-primary" href="{{ route('books.create') }}">Tambah</a>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-sm table-bordered table-dark table-hover mb-0">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>No</th>
                    <th>Penulis</th>
                    <th>Nama buku</th>
                    <th>Published</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($rows as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->author }}</td>
                <td>{{ $row->nama_book }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <a class="btn btn-sm btn-warning text-white" href="{{ route('books.edit', $row) }}">Ubah</a>
                    <form method="POST" action="{{ route('books.destroy', $row) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="card-footer">
        <div class="form-group mr-1">
            <a class="btn btn-secondary float-right" href="/">Kembali</a>
        </div>
    </div>
</div>
@endsection
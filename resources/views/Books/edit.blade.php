@extends('books')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('books.update', $row) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Penulis <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="author" value="{{ old('author', $row->author) }}" />
            </div>
            <div class="form-group">
                <label>Nama Buku <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_book" value="{{ old('nama_book', $row->nama_book) }}" />
            </div>
            <div class="form-group">
                <label>Published <span class="text-danger">*</span></label>
                <input class="form-control" type="time" name="created_at" value="{{ old('created_at', $row->created_at) }}" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ route('books.index') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
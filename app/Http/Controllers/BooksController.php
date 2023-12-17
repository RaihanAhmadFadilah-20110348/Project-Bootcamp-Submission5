<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Buku';
        $data['w'] = $request->w;
        $data['rows'] = Books::where('author', 'like', '%' . $request->w . '%')->get();
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah Buku';
        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'nama_book' => 'required',
        ]);

        $books = new Books();
        $books->author = $request->author;
        $books->nama_book = $request->nama_book;
        $books->save();
        return redirect('books')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        $data['title'] = 'Ubah Buku';
        $data['row'] = $book;
        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'author' => 'required',
            'nama_book' => 'required',
            'created_at' => 'required',
        ]);

        $book->author = $request->author;
        $book->nama_book = $request->nama_book;
        $book->created_at = $request->created_at;
        $book->save();
        return redirect('books')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $Books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect('books')->with('success', 'Hapus Data Berhasil');
    }
}
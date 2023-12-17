<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;

class Books extends AuthUser
{
    use HasFactory;

    protected $table = 'tb_books';
    protected $primaryKey = 'id_book';

    protected $fillable = [
        'author',
        'nama_book',
        'created_at',
    ];
}
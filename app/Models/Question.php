<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'title',
        'question',
        'image',
        'pilihan',
        'produk_id',
    ];

    public static function getMasterProduk()
    {
        return \DB::table('master_produk')->get();
    }
}

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

    public static function getQuestionsWithProduk($id)
    {
        return \DB::table('questions')
            ->join('master_produk', 'questions.produk_id', '=', 'master_produk.id')  
            ->select('questions.*', 'master_produk.nama_produk')
            ->where('questions.id', $id)
            ->first();
    }

    public static function getMasterProduk()
    {
        return \DB::table('master_produk')->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['menu_id', 'jumlah', 'sub_harga', 'total_semua', 'tanggal'];


    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

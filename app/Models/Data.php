<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'datas';

    protected $fillable = [
        'user_npm',
        'nama',
        'deskripsi',
        'sumber',
        'penerbit',
        'kategori',
        'image',
        'kata_kunci',
        'tautan',
        'status'
    ];
    
    public function user()
	{
	      return $this->belongsTo('App\Models\User','user_npm', 'npm');
	}
}

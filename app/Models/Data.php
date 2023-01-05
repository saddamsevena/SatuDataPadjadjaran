<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'data';

    protected $fillable = [
        'nama',
        'deskripsi',
        'penerbit',
        'kategori',
        'kata_kunci',
        'tautan',
    ];
    
    public function user()
	{
	      return $this->belongsTo('App\Models\User','user_id', 'id');
	}
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';

    protected $fillable = ['barang_nama', 'barang_harga', 'barang_stok', 'created_at', 'updated_at', 'barang_creator_id'];

    public function barang_creator_name()
    {
        return $this->hasOne(Users::class, 'id', 'barang_creator_id');
    }
}

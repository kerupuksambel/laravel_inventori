<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    
    public function barang_creator_name()
    {
        return $this->hasOne(Barang::class, 'barang_creator_id', 'id');
    }
}

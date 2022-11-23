<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    //? dibaca default author_id maka harus dikenalkan foreign key user_id

    protected $fillable = ['identifier', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

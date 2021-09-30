<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //Table
   protected $table = 'roles';

   //Primary Key
   public $primaryKey = 'id';

   //Timestamps
   public $timestamp = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

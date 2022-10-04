<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetectionLog extends Model
{
    use HasFactory;

    //Table
    protected $table = 'detection_log';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamp = true;

    protected $fillable = [
        'detail'
    ];
}

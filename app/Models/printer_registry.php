<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class printer_registry extends Model
{
    use HasFactory;
    protected $table = "registry";
    protected $fillable = ['code', 'id_printer', 'id_user'];
    public $timestamps = false;

}

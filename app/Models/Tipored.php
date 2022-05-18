<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipored extends Model
{
    use HasFactory;

    protected $table = "tiposredes";
    protected $primaryKey = "id";
    protected $guarded = ["id"];
}

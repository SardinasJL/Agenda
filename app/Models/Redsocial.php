<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redsocial extends Model
{
    use HasFactory;

    protected $table = "redessociales";
    protected $primaryKey = "id";
    protected $guarded = ["id"];

    public function relTipored()
    {
        return $this->belongsTo(Tipored::class, "tipored_id", "id");
    }

    public function relContacto()
    {
        return $this->belongsTo(Contacto::class, "contacto_id", "id");
    }
}

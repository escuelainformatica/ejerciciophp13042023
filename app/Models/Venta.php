<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public $primaryKey="idventa";
    public $table="ventas";
    public $fillable=["idproducto","cantidad","cliente"];
}

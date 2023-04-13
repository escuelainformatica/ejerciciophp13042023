<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    public $primaryKey="idcompra";
    public $table="compras";
    public $fillable=["idproducto","cantidad"];
}
